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
			<a class="navbar-item">
				<p>Username</p>
				<figure id="avatar" class="image is-32x32">
					<img class="is-rounded" src="{{ asset('img/Blank.JPG') }}">
				</figure>
			</a>
		</div>
	</div>
</nav>

