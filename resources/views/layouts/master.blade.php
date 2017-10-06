<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('layouts.head')
	<style>
img{
	max-width:100%;
	height:auto;
}
.pd15{
	padding:15px;
}
.active {
  border-left: 3px solid #18bc9c;
}
a:hover, a:focus{
text-decoration: none;
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
-ms-transition: all 0.3s ease;
-o-transition: all 0.3s ease;
transition: all 0.3s ease;
}

/* Navbar */
.navbar{
margin-bottom:0px;
}

/* content */
.content-wrapper, .main-footer {
  margin-left: 230px;
  padding:15px;
}
.content-header > h3{
	margin-top:0px;
}

/* Sidebar */
.sidebar-wrapper {
	left: 0;
	min-height: 100%;
	padding-top: 60px;
	position: absolute;
	top: 0;
	width: 230px;
}
.sidebar-menu ul{
  list-style: outside none none;
  margin: 0;
  padding: 0;
}
.sidebar-menu ul li a{
	display: block;
	padding: 12px 5px 12px 15px;	
}
.sidebar-menu ul li a i{
	margin-right:5px;
}
.sidebar-menu .dropdown-menu{
background-color: rgba(13,19,24,0.3);
border: 0 solid rgba(0, 0, 0, 0);
border-radius: 0;
box-shadow: 0 0 0 rgba(0, 0, 0, 0);
float: none;
min-width: 100%;
position: inherit;
}
.avatar{
border: 2px solid rgba(255, 255, 255, 0.1);
border-radius: 50%;
height: 65px;
padding: 5px;
width: 65px;	
}
.require {
  font-size: 8px;
  position: absolute;
}
	</style>
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        @include('layouts.sidebar')

        <div class="content-wrapper">
        	@yield('content')
        </div>
        
        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    	$(function() {

      		/* Dashboard sidebar */
      		var docHeight = $(document).height() + 'px';
      		$('.sidebar-wrapper').css('height', docHeight);

      		/* Tooltip */
      		$('[data-toggle="tooltip"]').tooltip();

          //active class
          var url = window.location;

          //for sidebar menu entirely but not cover treeview
          $('ul.sidebar-menu a').filter(function() {
             return this.href == url;
          }).parent().addClass('active');

          $("li.active").parent().parent().addClass('open');
    	});	    	
    </script>
</body>
</html>