<?php

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user) {
		//protect POST actions from CSRF attacks
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		if (Auth::check()) return Redirect::to('/profile')->with('flash_message', 'You are already logged in!');
		return View::make('users/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();
		
		if ($this->user->fill($input)->isValid()) {
			
			//unset password confirm and hash users password 
			unset($this->user->passwordConfirm);
			$this->user->password = Hash::make($input['password']);

			//save user to db and redirect to login
			$this->user->save();
			return Redirect::to('/login');
		}

		return Redirect::back()->withInput()->withErrors($this->user->errors);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}


}
