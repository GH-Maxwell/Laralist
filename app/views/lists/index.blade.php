@extends('layouts/master')

@section('content')
	<div class="page-heading">
		<h2 class="pull-left">Your Lists</h2>
		 <button class="btn btn-add pull-right" data-toggle="modal" data-target="#list-modal" >
   		 	<span class="glyphicon glyphicon-plus"></span> New List
  		 </button>
	</div>
	<hr>
	@if(count($lists) > 0)
		@foreach($lists as $list)
			<div class="list">
				<p>{{ HTML::link('lists/'. $list->id . '/tasks', $list->name) }}<span class="label label-default">@if(count($list->tasks) == 1) {{ count($list->tasks) . ' Task' }} @else {{ count($list->tasks) . ' Tasks' }} @endif</span></p>
				<a href="/" class="list-action"><span class="glyphicon glyphicon-pencil"></span></a>
				<div class="list-action-pipe"> | </div>
				<a href="/" class="list-action"><span class="glyphicon glyphicon-trash"></span></a>
			</div>
		@endforeach 
	@else
		<p>You do not have any lists yet, how about you create one now</p>
	@endif
	<div class="modal fade" id="list-modal" role="dialog">
  		<div class="modal-dialog">
    		<div class="modal-content">
    		  <div class="modal-header">
        		<h4 class="modal-title">Create New List</h4>
      		  </div>
      		  <div class="modal-body">
        			<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							{{ Form::open(['route' => 'lists.store']) }}
								<div class="form-group">
									{{ Form::label('name', 'List Name:') }}
									{{ Form::text('name', '', array('class' => 'form-control')) }}
								</div>
						</div>
				</div>
      		  </div>
      		  <div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		{{ Form::submit('Save List', array('class' => 'btn btn-modal')) }}
        		{{ Form::close() }}
     	      </div>
    		</div><!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop