<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<form method="POST" action="/project/{{ $project->id}}">
	        @csrf
			@method('PATCH')
			<h3>Create a new project</h3>
		<div>
			<label>Title:</label> <input type="text" name="title" value="{{$project->title}}">
		</div>
		<br>
		<div>
			<label>Description</label>
			<textarea name="description" cols="30" rows="10">{{$project->description}}</textarea>
		</div>
		<br>
		<div>
			<button type="submit">Save</button>
		</div>
</form>
<br>

</div>

<div class="container">
	<form action="/project/{{$project->id}}" method="POST">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger">Delete</button>
</form>

</div>
</body>
</html>