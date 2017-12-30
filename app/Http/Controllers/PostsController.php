<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostsController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, array(
            'title' => 'required|max:100',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required|min:20',
            'featured_image' => 'sometimes|image'
        ));

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        $post->user_id = auth()->user()->id;

        //save our image
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);

            //save actual image to location
            Image::make($image)->resize(800,400)->save($location);

            //save string name of the image to database
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        //flash session message
        session::flash('success', 'successfully saved');

        //redirect
        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $tagsall = [];
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        //check for correct user
        if(auth()->user()->id !== $post->user_id) {
            return redirect('dashboard')->withError('Unauthorized Page');
        }

        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        foreach ($tags as $tag) {
            $tagsall[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagsall);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
 
            $this->validate($request, array(
                'title' => 'required|max:100',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body' => 'required|min:20',
                'featured_image' => 'image'
            ));

        //save in the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        //save our image
        if($request->featured_image) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);

            //add the new image to file path
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;
            //dd($oldFilename);

            //delete old image
            Storage::delete($oldFilename);

            //update string name in the database
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags);

        //flash session message
        session::flash('success', 'successfully saved');

        //redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id) {
            return redirect('dashboard')->withError('Unauthorized Page');
        }

        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();

        session::flash('success', 'this post was successfully deleted.');

        return redirect()->route('dashboard');
    }
}
