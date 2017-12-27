<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('home')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'Mikhael';
		$last = 'Rodas';

		$fullname = $first . " " . $last;
		$email = 'khael@test.com';

		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
		]);

		$data = ['email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message];

		Mail::send('emails.contact', $data, function($message) use ($data) {
			$message->from($data['email']);
			$message->to('mikhaelsnrodas@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your email was sent');

		//return redirect()->url('/');
		//return view("/");
		return redirect()->route('home');
	}
}