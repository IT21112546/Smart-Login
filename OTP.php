<!DOCTYPE html>
<html>
<head>
    <title>Secure  Login System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <style>
        body{
          font-family: 'Open Sans', sans-serif;
          background: #94b8b8;
          margin: 0 auto 0 auto;  
          width:100%; 
          text-align:center;
          margin: 20px 0px 20px 0px;   
        }
        p{
          font-size:12px;
          text-decoration: none;
          color:#ffffff;
        }
        h1{
          font-size:1.5em;
          color:#525252;
        }
        .box{
          background:white;
          width:300px;
          border-radius:6px;
          margin: 0 auto 0 auto;
          padding:0px 0px 70px 0px;
          border: #2980b9 4px solid; 
        }
        .username{
          background:#ecf0f1;
          border: #ccc 1px solid;
          border-bottom: #ccc 2px solid;
          padding: 8px;
          width:250px;
          color:#AAAAAA;
          margin-top:10px;
          font-size:1em;
          border-radius:4px;
        }
        .button{
          background:#2ecc71;
          width:125px;
          padding-top:5px;
          padding-bottom:5px;
          color:white;
          border-radius:4px;
          border: #27ae60 1px solid;
          margin-top:20px;
          margin-bottom:20px;
          float:left;
          margin-left:88px;
          font-weight:800;
          font-size:0.8em;
        }
        .button:hover{
          background:#2CC06B; 
        }
        .fpwd{
            color:#f1c40f;
            text-decoration: underline;
        }
       #absoluteCenteredDiv{
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width:400px;
            height: 300px;
            text-align: center;
       }
    </style>

</head>





<?php
session_start();


if(isset($_POST['btn_login']))

{
     $systemOTP= $_SESSION["newotp"];
     $user_enteredOTP=$_POST['OTP'];

      
if($systemOTP==$user_enteredOTP)
{
  
   echo "<script> alert('Login Sucess');</script>";
   header('refresh:1;sucess.php');
}else{

	echo "<script> alert('Invalid OTP Try Again');</script>";

    header('refresh:1;index.php');
}



}





?>
<body>
    <div id="absoluteCenteredDiv">
        <form action="" method="post">
            <div class="box">
                <h1>OTP Verification</h1>
                <input class="username" name="OTP" type="text" placeholder="Enter OTP here">
                <br/>
                <br/>
                <div><input type="submit" name="btn_login" value="Verify"></div>
            </div>
        </form>
      
    </div>        
</body>
</html>