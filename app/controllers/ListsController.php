<?php

class ListsController extends \BaseController {

	protected $list;
	protected $user;

	function __construct(Catalog $list) {
        $this->beforeFilter('auth');
        $this->list = $list; 
        $this->user = Auth::user();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() { 
		$catalogs = $this->user->catalogs;
		return View::make('lists/index')->with('lists', $catalogs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();
		$this->list->fill($input);
		$this->list->user_id = $this->user->id;
		$this->list->save();
		return Redirect::to('/lists');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
