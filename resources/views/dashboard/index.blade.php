@extends('layouts.header')
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<a href="/register"><button type="button" class="btn btn-success btn-rounded btn-bordered waves-effect waves-light float-left">Register</button></a>
		<a href="/login"><button type="button" class="btn btn-violet btn-rounded  btn-bordered waves-effect waves-light float-left">Login</button></a>
		<a href="#" class="ico-item fa fa-power-off js__logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


@extends('layouts.footer')