<!DOCTYPE html>
<html>
<head>
	<title>Project</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<h3>Projects</h3>

<div class="container">
	@foreach($projects as $project)
<ul>
	<li><a href="/project/{{$project->id}}">{{$project->title}}</a></li>
	{{$project->description}}
</ul>
@endforeach
  <a class="btn btn-danger" href="{{ url('project/create') }}"><< back</a>
</div>

</body>
</html>