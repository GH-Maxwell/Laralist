<div id="task-container">
@foreach($tasks as $task)
	<li class="task">
		{{ Form::checkbox('name', null, $task->status, ['id' => $task->id]) }}
		<p class="{{ $task->status == 1 ? 'task-name checked' : 'task-name' }}">{{ $task->name }}</p>
		<span class="label label-default {{ $task->priority }}">{{ $task->priority }}</span>
	</li>
@endforeach
</div>
<div class="text-center">
	{{ $tasks->links() }}
</div>