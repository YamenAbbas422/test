<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Confirm Email</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

    <div id="single-wrapper">
        <form action="{{ route('user.verify') }}" class="frm-single" method="POST">
            @csrf
            <div class="inside">
                <div class="title"><strong>Yamen</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Code Confirm Email</div>
                <!-- /.frm-title -->
                <img src="assets/images/icon-email.png" alt="" class="ico-email">
                <label class="text-center">Enter the verification code</label>
                <div class="frm-input"><input type="text" name="token" placeholder="Enter Code" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
                <button type="submit" class="frm-submit">Confirm<i class="fa fa-arrow-circle-right"></i></button>
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