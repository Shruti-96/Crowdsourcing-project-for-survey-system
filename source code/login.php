<?php
session_start();
if(isset($_SESSION["errormsg"])) {
    $error = $_SESSION["errormsg"];
    session_unset($_SESSION["errormsg"]);
} else {
    $error = "";
}
?>
<html>
<head>
<title>Login</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	//background: http://images7.alphacoders.com/381/381065.jpg;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://images7.alphacoders.com/381/381065.jpg);
	background-size: cover;
	
}



.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 50px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 7px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 20px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 7px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 20px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 5px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 22px;
	font-weight: 400;
	padding: 5px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
.error {color: #FF0000;}
</style>

    <script src="js/prefixfree.min.js"></script>
</head>
<body>
    <?php
        $userErr=$pwdErr=$error;
        ?>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
                    <div>Survey<span><br> System</span></div><br>
		</div>
		<div class="login">
		<form method="POST" action="vlogin.php">
                    
Username : <input type="text" name="username"  >
    <br>
<span class="error">* <?php echo $error;?></span>

<br><br>

Password :&nbsp; <input type="password" name="pwd" />
    <br>
<span class="error">* <?php echo $error;?></span>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Submit" />
                </div>
		

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<br><br>

</form>
</tr>
</table>
</body>
</html>




