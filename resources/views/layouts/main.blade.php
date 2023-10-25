<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('styles/style.css')}}" />
    <title>StudyBuddy - Find study partners around the world!</title>
  </head>

<body>

@include('layouts.navbar')
@yield('room_component')
@yield('create-room')
@yield('delete_room')
@yield('room')
@yield('index')
@yield('topics')
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>