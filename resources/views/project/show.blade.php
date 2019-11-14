<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		.is-completed {
			text-decoration: line-through;
		}
	</style>
		<title>Hello</title>	
</head>
<body>

	 <div class="row">
	 	<div class="container">
	 		<h3>Read Projects</h3>
	 		<p>{{$project->title}}</p>
	 		<P>{{$project->description}}</P>
	    </div>
	 </div>

@if ($project->tasks->count())

	 <div class="container box">
	 	<h4>Tasks</h4>
	 	<p>please tick to complete the tasks</p>
	 	@foreach($project->tasks as $task)
	         <div>
	         	<form method="POST" action="/tasks/{{ $task->id }}">
	         		@method('PATCH')
	         		@csrf

	         		<label for="completed" class="form-check {{ $task->completed ? 'is-completed' : ''}}" >
	         		<input type="checkbox" name="completed" onchange="this.form.submit()"{{ $task->completed ? 'checked' : ''}}>
	         	{{$task->description}} 
	         	 </label>
	            </form>
	         </div>

	   @endforeach
	     @endif
	 </div>
	 <div class="container">
	 	<form method="POST" action="/projects/{{ $project->id }}/tasks" class="form-group">
	 		@csrf
	 		<h4>New task</h4>
	 	 <label for="completed">Desciptions:</label><input type="text" class="form-control" name="description">
	 	 <br>
	 	 <button class="btn btn-success form-group">Add task</button>
	    </form>
  <!-- modal form -->
	    <form method="POST" action="/projects/{{ $project->id }}/tasks" class="form-group">
	 		@csrf 
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  Create  New Task
			</button>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<label for="completed">Desciptions:</label>
			        <input type="text" class="form-control" name="description">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" id="save" onclick="save()" class="btn btn-primary">Save Task</button>
			      </div>
			    </div>
			  </div>
			</div>
	    </form>
	 </div>
	  <script>
        $(document).ready(function(){
			$('#save').click(function(){
			$('#exampleModal').modal('hide');
			 }); 
		 });
	  </script> 
 </body>
</html>