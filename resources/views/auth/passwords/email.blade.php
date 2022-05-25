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
        <form method="POST" action="{{ route('password.email') }}" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>Yamen</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Reset Password</div>
                <!-- /.frm-title -->
                <p class="text-center">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                <div class="frm-input">
                    <input type="email" name="email" value="" required autocomplete="email" placeholder="Enter Email" class="frm-inp">
                    <i class="fa fa-envelope frm-ico"></i>
                </div>
                <!-- /.frm-input -->
                <button type="submit" class="frm-submit">Send Email<i class="fa fa-arrow-circle-right"></i></button>
                <a href="#" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
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