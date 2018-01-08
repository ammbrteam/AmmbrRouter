<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ammbr</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="fonts/fonts.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        
        <div class="amr-container">
        	
            <div class="header">
            	<a href="#"><img src="img/ammbr-hex-logo.png" alt="" /> Ammbr Management</a>
            </div>
            
            <div class="management-stats">
            	<p><span class="text-white">Stats:</span></p>
   				<p>Current users: <span class="text-white">2</span></p>
   				<p>Total users: <span class="text-white">18</span></p>
                <p>Access codes collected: </p>
                <p class="ammbr-orange access-codes"><?php include('data.txt'); ?></p>
            </div>
                
            <form>
            	<p class="form-heading">Enter your wallet address & email so so we can auto redeem your codes for Ammbr tokens as you get them.  <a href="#">Need a <u>wallet?</u></a></p>
                <div class="align-lg-center">
                <input class="input-control block-middle" type="text" placeholder="Enter wallet address"/>
            	</div>
                <div class="form-input-group align-lg-center">
                    <input class="input-control" type="text" placeholder="Enter email for notifications"/>
                    <button type="submit" class="ammbr-btn btn-fixed">Submit</button>
                </div>
            </form>

            
            <p class="page-footer">Manualy redeem codes for Ammbr token(s) <a class="normal-link" href="#">here</a>.</p>
            
        </div>
        
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
    </body>
</html>
