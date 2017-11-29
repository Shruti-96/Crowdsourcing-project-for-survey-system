
<html>
<head>
<style>
     @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
body{
	margin: 0;
	padding: 0;
	//background: http://images7.alphacoders.com/381/381065.jpg;
        background-image: url("images/background.jpg");
    background-size: cover;
	
}
h2{
    position: absolute;
    top: calc(50% - 150px);
    left: calc(50% - 150px);
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 7px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 20px;
    font-weight: 400;
    padding: 4px;
    
}
.header{
	position: absolute;
	top: calc(50% - 90px);
	left: calc(50% - 400px);
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
.random{
        position: absolute;
        top: calc(50% + 30px);
        left: calc(50% - 395px);
        font-family: 'Exo', sans-serif;
	font-size: 17px;
        color: #fff;
}
.login{
	position: relative;
	top: calc(50% - 75px);
	left: calc(50% + 25px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}
.login input[type=button]{
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
</style>
</head>
<body>
    <br><br><br>
    <h2 align="center"> You have registered successfully !</h2>
    <div class="login">
<form>
    <div class="header">
                    <div>Survey<span><br> System</span></div><br>
                    
		</div>
    <div class="random"> Rate your fav anime ! </div>
<input type="button" value="Login"
onclick="window.location.href='http://localhost/login/login.php'" />
        <br>
        <br>
<input type="button" value="Sign up"
onclick="window.location.href='http://localhost/login/sign_up.php'"/>
</form>
        </div>
</body>
</html>
        