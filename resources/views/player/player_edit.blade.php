<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="POST" action="/player/{{ $player->id }}">
			@csrf
			@method('PATCH')
			<label>Name</label><input type="text" name="name"class="form-control" value="{{$player->name}}">
			<label>Answer</label><input  name="answers"class="form-control" value="{{$player->answers}}">
			<label>Points</label><input  name="points"class="form-control" value="{{$player->points}}">
			<br>
			<button class="btn-danger" type="submit">submit</button>
		</form>

		<form method="POST" action="/player/{{ $player->id }} ">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger">Delete</button>
		</form>
	</div>
</body>
</html>