<!DOCTYPE html>
<?php  $agency = 3; ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <?php if ($agency > 5) { ?>
                <div class="title m-b-md">
                    Chicken <img src="/storage/images/superchicken.jpg"  height="62" width="62"> Chaser
                </div>
               <?php } ?>
                
                 <form>
                   <div class="form-row">
                     <div class="form-group col-md-6">
                       <label for="inputEmail4">Email</label>
                       <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                     </div>
                     <div class="form-group col-md-6">
                       <label for="inputPassword4">Password</label>
                       <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputAddress">Address</label>
                     <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                   </div>
                   <div class="form-group">
                     <label for="inputAddress2">Address 2</label>
                     <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                   </div>
                   <div class="form-row">
                     <div class="form-group col-md-6">
                       <label for="inputCity">City</label>
                       <input type="text" class="form-control" id="inputCity">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState">State</label>
                       <select id="inputState" class="form-control">
                         <option selected>Choose...</option>
                         <option>...</option>
                       </select>
                     </div>
                     <div class="form-group col-md-2">
                       <label for="inputZip">Zip</label>
                       <input type="text" class="form-control" id="inputZip">
                     </div>
                   </div>
                   <div class="form-group">
                     <div class="form-check">
                       <input class="form-check-input" type="checkbox" id="gridCheck">
                       <label class="form-check-label" for="gridCheck">
                         Check me out
                       </label>
                     </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Sign in</button>
                 </form>
               
            </div>
        </div>
    </body>
</html>
