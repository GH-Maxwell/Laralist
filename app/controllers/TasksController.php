<?php

class TasksController extends \BaseController {

	protected $user;
	protected $task;
	protected $list;

	function __construct(Task $task) {
        $this->user = Auth::user();
        $this->task = $task;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($list_id) {

		$this->list = Catalog::find($list_id);

		if($this->list) {

			$tasks = $this->list->tasks()->orderBy('created_at', 'desc')->paginate(5);

			if ($this->user->id == $this->list->user_id) {
				return View::make('tasks.index')->with(array('tasks' => $tasks, 'list' => $this->list));
			} 

		}

		return Redirect::to('/lists');

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
	public function store($list_id) {
		//return Input::get('name');
		$input = Input::all();
		$this->task->fill($input);
		$this->task->catalog_id = $list_id;
		$this->task->save();
		//return Response::json(['input' => $input, 'taskid' => $this->task->id]);
		$this->list = Catalog::find($list_id);
		$tasks = $this->list->tasks()->orderBy('created_at', 'desc')->paginate(5);
		return Response::json(View::make('tasks/tasks', array('tasks' => $tasks))->render());
		//return Redirect::to("/lists/$list_id/tasks");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($listid, $taskid)
	{
		return "Task with an id of $taskid within list with an id of $listid.";
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
	public function update($listid, $taskid) {
		$task = Task::find($taskid);
		$input = Input::all();
		if (isset($input['name'])) {
			$task->status = 1;
			$task->save();
			return 'checked';
		} else {
			$task->status = 0;
			$task->save();
			return 'unchecked';
		}
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
