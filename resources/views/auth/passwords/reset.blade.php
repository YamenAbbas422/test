<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
</head>

<body>

    <div id="single-wrapper">
        <form  method="POST" action="/resetPassword" class="frm-single">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="inside">
                <div class="title"><strong>Yamen</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Confirm Password</div>
                <!-- /.frm-title -->
                <p class="text-center">Email</p>
                <div class="frm-input">
                    <input type="email" name="email"  value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Enter Email" class="frm-inp">
                    <i class="fa fa-envelope frm-ico"></i>
                </div>
                <p class="text-center">Password</p>
                <div class="frm-input">
                    <input id="password" type="password"  name="password" required autocomplete="new-password" class="frm-inp">
                </div>
                <p class="text-center">Confirm Password</p>
                <div class="frm-input">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="frm-inp">
                </div>
                <!-- /.frm-input -->
                <button type="submit" class="frm-submit">Reset Password<i class="fa fa-arrow-circle-right"></i></button>
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