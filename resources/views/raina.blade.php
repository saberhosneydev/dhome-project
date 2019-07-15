<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Messages</title>
	<link rel="stylesheet" href="{{ asset('/css/app3.css') }}">
</head>

<body>

	<div id="root">
		<div v-for="result in results" v-if="result.done == 0">
			<p v-for="home in result.home">
			@{{home.location}}
		</p>
		<p v-for="user in result.user">
			@{{user.name}}
		</p>
		<p>
			@{{result.done}}
		</p>
		</div>

	</div>

	<script src="{{ asset('/js/axios.min.js') }}"></script>
	<script src='{{ asset('/js/vue.js') }}'></script>
	<script>
		const vm = new Vue({
			el: '#root',
			data: {
				results: []
			},
			mounted() {
				axios.get("http://127.0.0.1:8000/raina/messages")
				.then(response => {this.results = response.data})
			}
		});
	</script>
</body>

</html>
