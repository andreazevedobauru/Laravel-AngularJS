<!DOCTYPE html>
<html lang="pt-br" ng-app="app">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eprom</title>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    @if(Config::get('app.debug'))
		<link href="{{ asset('build/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/components.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/flaticon.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/font-awesome.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/vendor/bootstrap-theme.min.css') }}" rel="stylesheet" />
    @else
        <link href="{{ elixir('/css/all.css') }}" rel="stylesheet" />
    @endif
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Eprom API's</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/#/home') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/#/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div ng-view>

	</div>

	<!-- Scripts -->
    @if(Config::get('app.debug'))
		<script src="{{ asset('build/js/vendor/jquery.min.js') }}" ></script>

		<script src="{{ asset('build/js/vendor/angular.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-route.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-resource.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-animate.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-messages.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-cookies.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/query-string.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/angular-oauth2.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/ng-file-upload.min.js') }}" ></script>

		<script src="{{ asset('build/js/vendor/ui-bootstrap-tpls.min.js') }}" ></script>
		<script src="{{ asset('build/js/vendor/navbar.min.js') }}" ></script>

		<script src="{{ asset('build/js/app.js') }}" ></script>
		<!-- Controllers -->
		<script src="{{ asset('build/js/controllers/login.js') }}" ></script>
		<script src="{{ asset('build/js/controllers/home.js') }}" ></script>
        <!--  Clients  -->
		<script src="{{ asset('build/js/controllers/client/clientList.js') }}" ></script>
		<script src="{{ asset('build/js/controllers/client/clientNew.js') }}" ></script>
		<script src="{{ asset('build/js/controllers/client/clientEdit.js') }}" ></script>
		<script src="{{ asset('build/js/controllers/client/clientRemove.js') }}" ></script>
        <!--  Projects  -->
        <script src="{{ asset('build/js/controllers/project/projectList.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project/projectNew.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project/projectEdit.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project/projectRemove.js') }}" ></script>
        <!--  Project-note  -->
        <script src="{{ asset('build/js/controllers/project-note/projectNoteList.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-note/projectNoteShow.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-note/projectNoteNew.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-note/projectNoteEdit.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-note/projectNoteRemove.js') }}" ></script>
        <!--  Project-file  -->
        <script src="{{ asset('build/js/controllers/project-file/projectFileList.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-file/projectFileNew.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-file/projectFileEdit.js') }}" ></script>
        <script src="{{ asset('build/js/controllers/project-file/projectFileRemove.js') }}" ></script>
        <!-- Filters -->
        <script src="{{ asset('build/js/filters/date-br.js') }}" ></script>
        <!-- Services -->
        <script src="{{ asset('build/js/services/user.js') }}" ></script>
        <script src="{{ asset('build/js/services/client.js') }}" ></script>
        <script src="{{ asset('build/js/services/project.js') }}" ></script>
        <script src="{{ asset('build/js/services/projectNote.js') }}" ></script>
        <script src="{{ asset('build/js/services/url.js') }}" ></script>

	@else
        <script src="{{ elixir('js/all.js') }}" ></script>
    @endif
</html>
