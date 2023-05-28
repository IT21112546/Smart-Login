<!DOCTYPE html>
<html>
<head>
    <title>Secure  Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <style>
        body{
          font-family: 'Open Sans', sans-serif;
          background:#3498db;
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




if(isset($_POST['btn_login']))

{
require_once('DBconnection.php');



      $stmt = $con->prepare('select UserName,UserPassword from users WHERE UserName=? AND UserName=?');
      $stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
      $stmt->bindParam(2, $_POST['pw'], PDO::PARAM_STR);

      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row)
{
   
    session_start();

	$n = 6;
    $otp=generateNumericOTP($n);
     
    $_SESSION["newotp"] =$otp;

   
   echo "<script> alert('OTP is send to E-mail $otp');</script>";

    header('refresh:1;otp.php');

}else{

	echo "<script> alert('Fail to Login due to incorrect Username Or Password');</script>";
	header('refresh:1;index.php');
  
}



}




function generateNumericOTP($n)
{
 
  $generator = "1357902468";

  
  $result = "";

  for ($i = 1; $i <= $n; $i++) {
    $result .= substr($generator, rand() % strlen($generator), 1);
  }


  return $result;
}

?>
<body>
    <div id="absoluteCenteredDiv">
        <form action="" method="post">
            <div class="box">
                <h1>Login</h1>
                <input class="username" name="username" type="text" placeholder="User Name">
                <input class="username" name="pw" type="password" placeholder="Password">
                <br/>
                <br/>
                <div><input type="submit" name="btn_login"></div>
            </div>
        </form>
        <p>Forgot your password? <a class="fpwd" href="#">Click Here!</a></p>
    </div>        
</body>
</html>