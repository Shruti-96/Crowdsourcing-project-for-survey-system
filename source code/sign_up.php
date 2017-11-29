<html>
<head>
<style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
body 
{
    font-family:'Exo', Sans-Serif;
    color: #ededed;
    background-image: url("images/new.jpg");
    background-size: cover;
}
#container {width:400px; margin:0 auto;}
form label {display:inline-block; width:140px;}
.error {color: #e74c3c;}
form input[type="text"]
{
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
form input[type="password"]
{
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
form input[type="submit"]{
	width: 260px;
	height: 35px;
	background: #1abc9c;
	border: 1px solid #1abc9c;
	cursor: pointer;
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 22px;
	font-weight: 400;
	padding: 5px;
	margin-top: 10px;
        alignment-adjust: 'center';
}
form input[type="email"] {width:160px;}
form .line {clear:both;}
form .line.submit 
{text-align:right;}

</style>
</head>
<body>
    <?php
    
        include 'connection.php';
        $sql="";
        $username=$pwd=$c_pwd=$name=$email="";
        $nameErr = $emailErr = $userErr = $c_pwdErr =$pwdErr= "";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["username"])){
                $userErr="Username required";
            }
            else
            {
                $username=test($_POST["username"]);
                if (!preg_match("/^[A-Za-z]{1}[A-Za-z0-9]{5,15}$/", $username))
                {
                    $userErr="letters and numbers only and must start with a letter(5 to 15 charac) ";
                }
            }
            if(empty($_POST["pwd"])){
                $pwdErr="Password required";
            }
            else
            {
                $pwd=test($_POST["pwd"]);
                if(!preg_match("/^(?=.*\d)(?!.*\s).{4,20}$/", $pwd))
                {
                    $pwdErr="weak password";
                }
            }
            if(empty($_POST["c_pwd"])){
                $c_pwdErr="confirm password not filled";
            }
            else 
            {
                echo "herer";
                $c_pwd=test($_POST["c_pwd"]);
                if(($pwd!="") && ($pwd == $c_pwd))
                {
                    $c_pwdErr="Match";
                }
                else
                {
                    $c_pwdErr="Not Match";
                }
            }
            if(empty($_POST["name"])){
                $nameErr="name required";
            }
            else
            {
                $name=test($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed"; 
                }
            }
            if(empty($_POST["email"])){
                $emailErr="Email required";
            }
            else
            {
                $email=test($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                }
            }
        }
        $pwd=  md5($pwd);
        if(($nameErr=="") && ($userErr=="") && ($c_pwdErr=="Match") && ($pwdErr=="") && ($emailErr==""))
        {
            $sql="Insert into uinfo(Name,Username,Password,Email) values('". $name. "','".$username."','".$pwd."','". $email."');";
        }
       // $conn->query($sql);
        $done=0;
        if($sql!="")
        {
            if (mysql_query($sql) == TRUE) {
                echo "New record created successfully";
                header('LOCATION: registered.php');
                exit();
                $done=1;
            } else {
                echo "Error: " ;
            }
        }
        
        function test($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
<div id="container">
    <form method="POST" action="<?php if($done==0){echo htmlspecialchars($_SERVER["PHP_SELF"]);}else{echo "registered.php";}?>">
<h1 align="center">     Create Login</h1>

<div class="line"><label for="username">Username : </label><input type="text" name="username"  >
    <br>
<span class="error">* <?php echo $userErr;?></span>
</div>
<br><br>

<div class="line"><label for="pwd">Password : </label><input type="password" name="pwd" />
    <br>
<span class="error">* <?php echo $pwdErr;?></span>
</div>
<br><br>

<div class="line"><label for="c_pwd">Conform Password: </label><input type="password" name="c_pwd" />
    <br>
<span class="error">* <?php echo $c_pwdErr;?></span>
</div>
<br><br>

<div class="line"><label for="name">Name : </label><input type="text" name="name" />
    <br>
<span class="error">* <?php echo $nameErr;?></span>
</div>
<br><br>
<div class="line"><label for="email">Email : </label><input type="text" name="email" />
    <br>
<span class="error">* <?php echo $emailErr;?></span>
</div>
<br><br>

<div class="line submit" align="center"><input type="submit" value="Submit" /></div> 
</form>
</div>
</body>
</html>