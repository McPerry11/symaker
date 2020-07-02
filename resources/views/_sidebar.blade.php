@if (Request::is('subjectcode/edit/*'))
{{-- This will only appear on course syllabus modification modules --}}
<aside class="menu">
	<ul class="menu-list">
		<li><a id="sb-course-info"><span class="icon"><i class="fas fa-info"></i></span><span class="sb-li">Course Information</span></a></li>
		<li><a id="sb-learning-outcomes" href="{{ url('subjectcode/edit/learning_outcomes') }}"><span class="icon"><i class="fas fa-lightbulb"></i></span><span class="sb-li">Learning Outcomes</span></a></li>
		<li><a id="sb-course-content"><span class="icon"><i class="fas fa-clipboard-list"></i></span><span class="sb-li">Course Content</span></a></li>
		<li><a id="sb-rcm"><span class="icon"><i class="fas fa-bookmark"></i></span><span class="sb-li">References & Content Management</span></a></li>
		<li><a id="sb-help"><span class="icon"><i class="fas fa-question"></i></span><span class="sb-li">Help</span></a></li>
	</ul>
	<ul class="menu-list">
		<li><a id="sb-submit"><span class="icon"><i class="fas fa-check"></i></span>Submit</a></li>
		<li><a id="sb-cancel"><span class="icon"><i class="fas fa-times"></i></span>Cancel</a></li>
	</ul>
</aside>

@else
{{-- This is the main sidebar menu --}}
<aside class="menu">
	<p class="menu-label">General</p>
	<ul class="menu-list">
		<li><a id="sb-dashboard" href="{{ url('') }}"><span class="icon"><i class="fas fa-columns"></i></span>Dashboard</a></li>
		<li><a id="sb-courses" href="{{ url('courses') }}"><span class="icon"><i class="fas fa-book"></i></span>Courses</a></li>
		<li><a id="sb-settings" href="{{ url('settings') }}"><span class="icon"><i class="fas fa-cog"></i></span>Settings</a></li>
		<li><a id="sb-help"><span class="icon"><i class="fas fa-question"></i></span>Help</a></li>
	</ul>
	<p id="admin" class="menu-label">Administration</p>
	<ul class="menu-list">
		<li><a id="sb-accounts" href="{{ url('accounts') }}"><span class="icon"><i class="fas fa-users"></i></span>Accounts</a></li>
		<li><a id="sb-colleges" href="{{ url('colleges') }}"><span class="icon"><i class="fas fa-chalkboard"></i></span>Colleges</a></li>
		<li><a id="sb-others"><span class="icon"><i class="fas fa-plus-square"></i></span>Other Content</a></li>
		<li><a id="sb-logs" href="{{ url('logs') }}"><span class="icon"><i class="fas fa-stream"></i></span>Logs</a></li>
	</ul>
</aside>

@endif