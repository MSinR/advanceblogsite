<?php

namespace App\Http\Controllers;
use App\Post;

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

	public function postContact() {

	}
}