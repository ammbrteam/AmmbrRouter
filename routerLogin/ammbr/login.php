<?php
function acceptance($authaction, $tok, $redir) {
echo("\n<form method='GET'id='myForm' action='" . $authaction . "'> \n");
echo("<input type='hidden' name='tok' value='" . $tok . "'>\n");
echo("<input type='hidden' name='redir' value='" . $redir . "'></form>\n");
echo("<SCRIPT>document.getElementById('myForm').submit()</SCRIPT>");
}

$authaction=$_GET[authaction];
$tok=$_GET[tok];
$redir=$_GET[redir];
?>

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

    </head>
    <body>
        
        <div class="amr-container">
        	
            <div class="header">
            	<a href="www.ammbr.com"><img src="img/ammbr-hex-logo.png" alt="" /> Ammbr WiFi login</a>
            </div>
            
            <div class="enter-access-code">
            	<div class="sbs-icon align-lg-center">
                	<img src="img/icon-access.png" alt=""/> Enter access code
                </div>
                
                <form action="#" method="post">
                	<div class="form-input-group align-lg-center pad">
                    	<input class="input-control" name="accessCode" type="text" placeholder="Enter you code here"/>
                        <input type="submit" name="submit" class="ammbr-btn btn-fixed">
                    </div>
                </form>
<?php                                                           
if(isset($_POST['submit']))                                     
{                                                               
//preparing data to subm,it to authentication api                                                                
$accessCode = $_POST['accessCode'];                             
$ch = curl_init();     
$authCode='e433g9c892e360d53463oe';//Router authcode given by ammbr api team as a private key.                                                 
$mdhash=md5($authCode.$accessCode);//generating md5 code     
//adding some extra data to curl request to authentication api

$data = array(
    'mac' => 'dwefweewdwe',
    'email' => 'test1@test.com',
    'wallet_address' => 'dwedwedwefwe1'
);
$postFields = http_build_query($data);

curl_setopt($ch, CURLOPT_URL, "http://blog.ammbr.com/_api/v1/code/check/{$accessCode}");                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_POST, count($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);                                                                                           
$headers = array("ammbr-authorization: ".$mdhash);                                         
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$result = curl_exec($ch);                                                                                                                    
if (curl_errno($ch)) {                                                                                                                       
    echo 'Error:' . curl_error($ch);                                                                                                         
}else{
//    print_r($result);
}                                                                                                                                            
curl_close ($ch); 
$result_json = json_decode($result,true);                                                                 
// further processing ....                                                                                
        if ($result_json['message'] == "Valid") {                                                  
                // the name of the file you're writing to                                                 
                $myFile = "data.txt";                                                                     
                                                                                                          
                // opens the file for appending (file must already exist)                                 
                $fh = fopen($myFile, 'a');                                                                
                                                                                                          
                fwrite($fh, $accessCode.",");                            
                // You're done                                           
                echo '<p style="color:blue">Access Granted</p>'; 
		fclose($fh);                                             
                acceptance($authaction,$tok,$redir);                     
                }                                                        
               		 else                                        
               			 {                                                                                                                                                                                                                 
                       		 echo '<p style="color:red">Invalid access code!</p>';
               			 }                                                                                                                                                                                                                 
        		}                                          
		?>      
                <p>Each Ammbr token gets you 24 hours of unmetered access to any WiFi node during the beta phase of the Ammbr mesh network. <br class="helper-hidden-md">  Please reveiew Ammbr beta <a class="normal-link" href="#">terms & Conditions</a>.</p>

				<p> <a href="https://www.ammbr.com">Get Ammbr access codes</a> </p>
                
                <h2 class="hrs24access">24hr ACCESS</h2>
                
                
            </div>
            
            <p class="page-footer">If you'd like to join the Ammbr network and earn Ammbr tokens, <a class="normal-link" href="https://www.ammbr.com">click here</a>.</p>
            <p class="page-footer">To manually redeem collected tokens, <a class="normal-link" href="/ammbr/management.php">click here</a>.</p>
            
        </div>
    </body>
</html>
