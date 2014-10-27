<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		if (Auth::check()) return Redirect::to('/profile')->with('flash_message', 'You are already logged in!');
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();

		if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']], Input::has('remember') ? true : false)) {
			return Redirect::intended('/lists')->with('flash_message', 'You have been logged in!');
		}

		return Redirect::back()->withInput()->with('flash_message', 'Invalid credentials, please try again');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy() {
		Auth::logout();
		return Redirect::to('/login')->with('flash_message', 'You have been logged out!');
	}


}
