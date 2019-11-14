<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
  	<h3> Welcome</h3>
  	<div class="alert alert-success" role="alert">
	           <p>You have <span class="badge badge-light">{{ $player_count }}</span>records</p>
	        </div>
  	 <div class="col-lg-6">
  	 	<div class="table-responsive table-responsive-md">
  	 		<table class="table table-striped  table-borderless table-hover">
  	 		  <caption>List of users</caption>
  	 		  <thead class="thead-dark|thead-light">
  	 		    <tr>
  	 		      <th scope="col">Name</th>
  	 		      <th scope="col">Answer</th>
  	 		      <th scope="col">Points</th>
  	 		    </tr>
  	 		  </thead>
  	 		  <tbody>
  	 		    <tr>
  	 		    @foreach($players as $player)
  	 		      <td>{{$player->name}}</td>
  	 		      <td>{{$player->answers}}</td>
  	 		      <td>{{$player->points}}</td>
  	 		      <td><a class="btn btn-xs btn-success" href=" {{ url('/player/'. $player->id . '/edit') }}" >edit</a></td>
  	 		      <td><a href="{{url('/player/'. $player->id) }}" class="btn btn-outline-danger btn-xsm" > <span class="con glyphicon-cog
glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</a></td>
  	 		    </tr>
  	 		    @endforeach
  	 		  </tbody>
  	 		</table>
  	 		{{ $players->links() }}
  	 	</div>
  	 </div>
  	 <a class=" btn btn-success" href="{{ url('/player/create') }}">Add record</a>
  </div>
  <?php
  echo date("Y-m-j H:i:s", strtotime( '-1 days' ) ) ."\n"; 

   $date = new DateTime();
   $date->add(DateInterval::createFromDateString('yesterday'));
   echo $date->format('F j, Y') . "\n";
  ?>
</body>
</html>