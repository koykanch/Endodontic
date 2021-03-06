<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dentistry Information System</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:700,300,400">        
      	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/elegant-font/code/style.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">

    </head>

    <body><!-- change background image at assets/js/scripts.js -->
    
        <!-- Loader -->
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>
		
		<!-- Top menu -->
		<nav class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="Login.html"></a> <!-- import pic from style.css file -->
				</div>
			</div>
		</nav>
		
        <!-- Page title -->
        <div class="page-title top-content">
            <div class="page-title-text wow fadeInUp">
            	<h1>Welcome to Dentistry Information Systems</h1>

            
            <form class="form-inline" name="login" method="post" action="verifypassword.php">
            <p>
          		<div class="form-group">
             		<label for="InputUsername">Username: </label> &nbsp;
             		<input type="text" class="form-control" name="InputUsername" placeholder="Username">
             	</div>
            </p>
            <p>
  				<div class="form-group">
					<label for="InputPassword">Password: </label> &nbsp;&nbsp;
					<input type="password" class="form-control" name="InputPassword" placeholder="Password">
				</div>
  			</p>

  			<p>
				<input type="submit" class="big-link-1 btn scroll-link" name="submit" value="Login">
				<input type="reset" class="big-link-2 btn scroll-link" name="submit" value="Clear">

  			</p>
			</form>

            <!-- <form name="forgot_password" method="post" action="sendpassword.php">
                 <input type="submit" class="big-link-1 btn scroll-link" name="forgot_pass" value="Forget Password">
            </form> -->


            </div>
        </div>
</div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>