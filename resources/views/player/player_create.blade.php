<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="csrf-token" content="{{csrf_token() }}">
</head>
<body>
	<div class="container">
			
 		<form action="/player" method="POST">
			{{ csrf_field() }}
			<label>Name</label><input type="text" name="name"class="form-control">
			<label>Answer</label><input  name="answers"class="form-control">
			<label>Points</label><input  name="points"class="form-control">
			<br>
			<button class="btn-danger" type="submit">submit</button>

		</form>
	</div>
	<div id="table">
		<form-component></form-component>
		<script src="{{mix('/js/app.js')}}"></script> 
	</div>
</body>

</html>