<!DOCTYPE html>
<html>
<head>
	<title>Create data</title>
</head>
<body>
<form method="POST" action="/project">
	{{ csrf_field() }}
			<h3>Create a new project</h3>
		<div>
			<label>Title:</label> <input type="text" name="title" placeholder="project title">
		</div>
		<br>
		<div>
			<label>Description</label>
			<textarea name="description" type="text" placeholder="Enter description"></textarea>
		</div>
		<br>
		<div>
			<button type="submit">create project</button>
		</div>
</form>
</body>
</html>