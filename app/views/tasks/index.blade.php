@extends('layouts/master')

@section('content')

<div class="page-heading">
	<h2 class="pull-left">{{ $list->name }}</h2>
	<button class="btn btn-add pull-right" data-toggle="modal" data-target="#task-modal" >
		<span class="glyphicon glyphicon-plus"></span> New Task
	</button>
</div>
<hr>

<ul id="task-ul">
@if(count($tasks) > 0)
	@include('tasks/tasks')
@else
	<li id="no-list">You do not have any tasks for this list yet, how about you create one now</li>
@endif
</ul>

<div class="modal fade" id="task-modal" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
    		<h4 class="modal-title">Create New Task</h4>
  		  </div>
  		  <div class="modal-body">
    			<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						{{ Form::open(['data-remote']) }}
							<div class="form-group">
								{{ Form::label('name', 'Task Name:') }}
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('priority', 'Priority:') }}
								{{ Form::select('priority', array('Urgent' => 'Urgent', 'High' => 'High', 'Normal' => 'Normal', 'Low' => 'Low'), '', array('class' => 'form-control' )) }}
							</div>
					</div>
				</div>
  		  </div>
  		  <div class="modal-footer">
    		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    		{{ Form::submit('Save Task', array('class' => 'btn btn-modal', 'id' => 'submit')) }}
    		{{ Form::close() }}
 	      </div>
		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop