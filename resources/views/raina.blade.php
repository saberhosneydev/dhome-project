
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Messages</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

	<link rel="stylesheet" href="{{ asset('/css/raina.css') }}">


</head>

<body>

	<section id="container">
		<!-- MESSAGES LIST -->
		<aside id="links" class="links-open">
			<ol>
				<h1>Newer</h1>
				<li class="latest">
					<h3>White Wolf Wizard</h3>
					<span>3:33 AM</span>
					<p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
				</li>
				<h2>Older</h2>
				@foreach($messages as $msg)
				{{-- <li>
					<p> Requested review on this
					<br>
					- Owner : {{$home::where('id', $msg->homeID)->first()->user->name}}
					<br>
					- - / phone 1 : {{$home::where('id', $msg->homeID)->first()->user->phone_1}}
					<br>
					- - / phone 2 : {{$home::where('id', $msg->homeID)->first()->user->phone_2}}
					<br>
					- Customer : {{$user::where('id', $msg->customerID)->first()->name}}
					<br>
					- - / phone 1 : {{$user::where('id', $msg->customerID)->first()->phone_1}}
					<br>
					- - / phone 2 : {{$user::where('id', $msg->customerID)->first()->phone_2}}
					<br>
					</p>
				</li> --}}
				<li>
					<h3>Brigid</h3>
					<span>{{ \Carbon\Carbon::parse($msg->created_at)->format('d/m/Y G:i A')}}</span>
					<p>Requested Review on <a target="_blank" href="/homes/{{$home::where('id', $msg->homeID)->first()->slug}}">House</a></p>
				</li>
				@endforeach
			</ol>
		</aside>
		<!-- DROPDOWN -->
		<aside id="drop">
			<ol>
				<span></span>
				<li>Forward</li>
				<li>Edit</li>
				<li>Copy</li>
				<li>Clear</li>
				<li>Delete</li>
			</ol>
		</aside>
		<!-- HEADER -->
		<header id="header">
			<button type="button" id="back" class="button" name="back"><span></span></button>
			<h1>Messages</h1>
			<button type="button" id="edit" class="button" name="edit"><span></span></button>
		</header>
		<!-- FOOTER -->
		<footer id="footer">
			<button type="button" id="camera" name="camera"><span><sub></sub><p></p></span></button>
			<input type="text" id="message" name="message" placeholder="Message" />
			<button type="button" id="send" name="send"><span></span></button>
		</footer>
	</section>
	<aside id="flash"></aside>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>



	<script  src="{{ asset('/js/raina.js') }}"></script>



</body>

</html>
