<footer class="main-footer well" style="margin-bottom:0px;">
	<div class="pull-right hidden-xs">
		Version 1.0
	</div>
	<a href="#">Wardan Tech</a> &copy; {{ date('Y') }}
</footer>

{{-- Flash message --}}
<flash message="{{ Session('flash') }}"></flash>