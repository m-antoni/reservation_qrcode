<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
</head>
<body data-token="{{ csrf_token() }}">

	<h2>Balagbag Traverse Email Sender</h2>
	{{-- body of the message --}}
	<p>{{$msg}}</p>
	
</body>
</html>