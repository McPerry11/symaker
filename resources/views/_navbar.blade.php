<nav class="navbar is-fixed-top">
	<div class="navbar-brand">
		<a id="title" class="navbar-item is-size-4 has-text-weight-bold has-text-primary">Symaker 2.0</a>
		{{-- #user is only visible on tablet viewport --}}
		<a id="user" class="level is-hidden-desktop is-hidden-mobile is-mobile">
			<div class="level-item">
				<p>Username</p>
			</div>
			<div class="level-item">
				<figure class="image is-32x32">
					<img class="is-rounded" src="{{ asset('img/Blank.JPG') }}">
				</figure>
			</div>
		</a>
		{{-- .navbar-burger is only visible on mobile viewport --}}
		<a class="navbar-burger is-hidden-tablet">
			<span></span>
			<span></span>
			<span></span>
		</a>
	</div>

	{{-- .navbar-menu is only visible on desktop viewport --}}
	<div class="navbar-menu">
		<div class="navbar-start">
			<div class="navbar-item breadcrumb has-succeeds-separator">
				<ul>
					<li></li>
					<li class="is-active">
						<a><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="navbar-end">
			<div id="profile" class="navbar-item has-dropdown">
				<a class="navbar-link is-arrowless">
					<p>Username</p>
					<figure id="avatar" class="image is-32x32">
						<img class="is-rounded" src="{{ asset('img/Blank.JPG') }}">
					</figure>
				</a>
				<div class="navbar-dropdown">
					<a class="navbar-item"><span class="icon"><i class="fas fa-user"></i></span>Profile</a>
					<a class="navbar-item"><span class="icon"><i class="fas fa-sign-out-alt"></i></span>Logout</a>
				</div>
			</div>
		</div>
	</div>

	{{-- #mobile will be shown in mobile viewport after clicking navbar-burger --}}
	<div id="mobile" class="navbar-menu is-hidden-tablet">
		<div class="navbar-start">
			<a class="navbar-item"><span class="icon"><i class="fas fa-columns"></i></span>Dashboard</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-book"></i></span>Courses</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-cog"></i></span>Settings</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-question-circle"></i></span>Help</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-users"></i></span>Accounts</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-chalkboard"></i></span>Colleges</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-plus-square"></i></span>Other Content</a>
			<a class="navbar-item"><span class="icon"><i class="fas fa-stream"></i></span>Logs</a>
		</div>
		<div class="navbar-end">
			<div class="navbar-item columns is-mobile">
				<div class="column is-1">
					<figure class="image is-24x24">
						<img class="is-rounded" src="{{ asset('img/Blank.JPG') }}">
					</figure>
				</div>
				<div class="column">
					<p>Username</p>
				</div>
			</div>
		</div>
	</div>
</nav>
