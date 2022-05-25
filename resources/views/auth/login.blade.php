<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">
    <!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
</head>
<body>
<div id="single-wrapper">
    <form action="/loginto" method="POST" class="frm-single">
        @csrf
        <div class="inside">
            <div class="title"><strong>Yamen</strong>Admin</div>
            <!-- /.title -->
            <div class="frm-title">Login</div>
            <!-- /.frm-title -->
            <div class="frm-input">
                <input type="text" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i>
            </div>
            <!-- /.frm-input -->
            <div class="frm-input">
                <input type="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
            </div>
            <!-- /.frm-input -->
            <div class="clearfix margin-bottom-20">
                <div class="pull-left">
                    <div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
                    <!-- /.checkbox -->
                </div>
                <!-- /.pull-left -->
                <div class="pull-right"><a href="{{ route('password.request') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                <!-- /.pull-right -->
            </div>
            <!-- /.clearfix -->
            <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
            <div class="row small-spacing">
                <div class="col-sm-12">
                    <div class="txt-login-with txt-center">or login with</div>
                    <!-- /.txt-login-with -->
                </div>
                <!-- /.col-sm-12 -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
                <!-- /.col-sm-6 -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button>
                </div>
                <!-- /.col-sm-6 -->
            </div>
            <!-- /.row -->
            <a href="#" class="a-link"><i class="fa fa-key"></i>New to YamenAdmin? Register.</a>
            <div class="frm-footer">YamenAdmin © 2022.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>
    <!-- /.frm-single -->
</div>
<!--/#single-wrapper -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
