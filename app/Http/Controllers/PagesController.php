<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex() {
		return view('welcome');
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