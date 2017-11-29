<?php 
//include'member.php';
 include 'connection.php';
session_start();
?>
<?php 
$next=  filter_input(INPUT_POST, 'next');
       $skip= filter_input(INPUT_POST, 'skip');
       $anime1name=$anime2name="";
       if(isset($next)) 
       {
           $select_value=filter_input(INPUT_POST, 'anime');
           $uid=$_SESSION['id'];
           $anime1=$_SESSION['random1'];
           $anime2=$_SESSION['random2'];
           $ts="current_timestamp";
           $q = "Select * from eng_movies where id='".$anime1."';";
           $executequery = mysql_query($q) or die(mysql_error());
           while ($row = mysql_fetch_array($executequery)) {
              $anime1name=$row['name']; 
           }
           
           $q1= "Select * from eng_movies where id='".$anime2."';";
           $executequery1 = mysql_query($q1) or die(mysql_error());
           while ($row = mysql_fetch_array($executequery1)) {
              $anime2name=$row['name']; 
           }
           $_SESSION['a1']=$anime1name;
           $_SESSION['a2']=$anime2name;
           //mysql_select_db('userinfo') or die("cnt select");
           $sql="Insert into resulttable_eng values(". $anime1. ",'".$anime1name."',".$anime2.",'". $anime2name."','". $select_value."',". $ts.",". $uid.");";
           mysql_query($sql) or die(mysql_error());
       }
        else if(isset($skip)){
            header('LOCATION:movies1.php');
            exit();
        }
        ?>
<HTML>
    <head>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);

            body {
              margin:0;
              font-family: 'Open Sans', sans-serif;
              background: #eee;
            }
            a{
                color: #fff;
            }
            hr {
              background:#dedede;
              border:0;
              height:1px;
            }
            form .send{
                alignment-adjust: center;
            }
            .header {
              overflow: hidden;
              display:block;
              position:fixed;
              top:0;
              margin:0;
              width:100%;
              height:4px;
              text-align:center;
            }

            .header ul {
              margin:0;
              padding:0;
            }

            .header ul li {
              overflow:hidden;
              display:block;
              float:left;
              width:20%;
              height:4px;
            }

            .header .cor-1 {
              background:#f1c40f;
            }

            .header .cor-2 {
              background:#e67e22;
            }

            .header .cor-3 {
              background:#e74c3c;
            }

            .header .cor-4 {
              background:#9b59b6;
            }

            .header .cor-5 {
              background-color: hsla(10,40%,50%,1);
            }

            .wrap {
              width: 950px;
              margin:25px auto;
            }

            nav.menu ul {
              overflow:hidden;
              float:left;
              width: 650px;
              padding:0;
              margin:0 0 0;
              list-style: none;
              color:#fff;
              background: #1abc9c;
                -webkit-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
              -moz-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
              box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
            }

            nav.menu ul li {
              float:left;
              margin:0;
            }

            nav.menu ul a {
              display:block;
              padding:25px;
              font-size: 16px;
              font-weight:600;
              text-transform: uppercase;
              color:#fff;
              text-decoration: none;
              transition: all 0.5s ease;
            }

            nav.menu ul a:hover {
              background:#16a085;
              text-decoration: underline;
            }

            .sidebar {
              width:275px;
              float:right;
            }

            .sidebar .widget {
              margin:0 0 25px;
              padding:25px;
              background:#fff;
              transition: all 0.5s ease;
              border-bottom: 2px solid #fff;
            }
            
            .sidebar .widget img {
              margin:0 0 25px -5%;
              max-width: 110%;
              min-width: 110%;
            }
            
            .sidebar .widget:hover {
              border-bottom: 2px solid #3498db;
            }

            .sidebar .widget h2 {
              margin:0 0 15px;
              padding:0;
              text-transform: uppercase;
              font-size: 18px;
              font-weight:800;
              color:#3498db;
            }

            .sidebar .widget p {
              font-size: 14px;
            }

            .sidebar .widget p:last-child {
              margin:0;
            }
             .sidebar .continue-l {
              color:#000;
              font-weight: 700; 
              text-decoration: none;
              transition: all 0.5s ease;
            }

            .sidebar .continue-l:hover {
              margin-left:10px;
            }
            .blog {
              float:left;
            }

            .conteudo {
              width:600px;
              margin:25px auto;
              padding:25px;
              background: #fff;
              border:1px solid #dedede;
              -webkit-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
              -moz-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
              box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
            }

            .conteudo img {
              margin:0 0 25px -25px;
              max-width: absolute;
              min-width: absolute;
              display: inline-block;
            }

            .conteudo h1 {
              margin:0 0 15px;
              padding:0;
              font-family: Georgia;
              font-weight: normal;
              color: #666;
            }

            .conteudo p:last-child {
              margin: 0;
            }

            .conteudo .continue-lendo {
              color:#000;
              font-weight: 700; 
              text-decoration: none;
              transition: all 0.5s ease;
            }

            .conteudo .continue-lendo:hover {
              margin-left:10px;
            }

            .post-info {
              float: right;
              margin: -10px 0 15px;
              font-size: 12px;
              text-transform: uppercase;
            }

            @media screen and (max-width: 960px) {

              .header {
              position:inherit;
            }

            .wrap {
              width: 90%;
              margin:25px auto;
            }
            .sidebar {
              width:100%;
              float:right;
                margin:25px 0 0;
            }

             .sidebar .widget {
              padding:5%;
            }

              nav.menu ul {
              width: 100%;
            }

                nav.menu ul {
              float:inherit;
            }

              nav.menu ul li {
              float:inherit;
              margin:0;
            }

            nav.menu ul a {
              padding:15px;
              font-size: 16px;
              border-bottom:1px solid #16a085;
              border-top:1px solid #1abf9f;
            }

            .blog {
              width:90%;
            }

            .conteudo {
              float:inherit;
              width:101%;
              padding:5%;  
              margin:0 auto 25px;
              background: #fff;
              border:1px solid #dedede;
            }

            .conteudo img {
              margin:0 0 25px -5%;
              max-width: 110%;
              min-width: 110%;
              display: inline-block;
            }

                .conteudo .continue-lendo:hover {
              margin-left:0;
            }


            }

            @media screen and (max-width: 460px) {

              nav.menu ul a {
              padding:15px;
              font-size: 14px;
            }

            .sidebar {
              display:none
            }
              .post-info {
              display:none;
            }

              .conteudo {
              margin:25px auto;
              }

              .conteudo img {
              margin:-5% 0 50px -5%;
            }


            }
     .caption-style-2{
		list-style-type: none;
		margin: 0px;
		padding: 0px;
		
	}

	.caption-style-2 li{
		float: left;
		padding: 0px;
		position: relative;
		overflow: hidden;
	}

	.caption-style-2 li:hover .caption{
		opacity: 1;
		transform: translateY(-100px);
		-webkit-transform:translateY(-100px);
		-moz-transform:translateY(-100px);
		-ms-transform:translateY(-100px);
		-o-transform:translateY(-100px);

	}


	.caption-style-2 img{
		margin: 0px;
		padding: 0px;
		float: left;
		z-index: 4;
	}


	.caption-style-2 .caption{
		cursor: pointer;
		position: absolute;
		opacity: 0;
		top:300px;
		-webkit-transition:all 0.15s ease-in-out;
		-moz-transition:all 0.15s ease-in-out;
		-o-transition:all 0.15s ease-in-out;
		-ms-transition:all 0.15s ease-in-out;
		transition:all 0.15s ease-in-out;

	}
	.caption-style-2 .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		width: 300px;
		z-index: 5;
		position: absolute;
	}

	.caption-style-2 .caption-text h1{
            color: #fff;
		text-transform: uppercase;
		font-size: 18px;
	}
	.caption-style-2 .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		width: 300px;
		height: 300px;
		text-align: center;
		top:5px;
	}
        </style>
    </head>
<body>
<header class="header">
  <ul>
    <li class="cor-1"></li>
    <li class="cor-2"></li>
    <li class="cor-3"></li>
    <li class="cor-4"></li>
    <li class="cor-5"></li>
  </ul>
  </header>
<div class="wrap">
  

<nav class="menu">
  <ul>
    <li>
        <a href="member.php">Home</a>
    </li>
    <li>
      <a href="#">About me</a>
    </li>
    <li>
        <a href="logout.php">Logout</a>
    </li>
  </ul>
  </nav>
    <aside class="sidebar">
    <div class="widget">
      <h2>Hi <?php  echo $_SESSION['u'];?>!</h2>
      <img src="logo.png">
      </div>
      <div class="widget">
          <a href="recenth.php" class="continue-l"><h2>Recent History</h2> </A>
      </div>
    </aside>
            
        <?php
        while(1)
        {
            $rand1=  rand(1, 12);
            $rand2= rand(1, 12);
            $_SESSION['random1']=$rand1;
            $_SESSION['random2']=$rand2;
            $q = "Select * from eng_movies where id='".$rand1."';";
           $executequery = mysql_query($q) or die(mysql_error());
           while ($row = mysql_fetch_array($executequery)) {
              $a1N=$row['name']; 
              $a1desp=$row['description'];
           }
           
           $q1= "Select * from eng_movies where id='".$rand2."';";
           $executequery1 = mysql_query($q1) or die(mysql_error());
           while ($row = mysql_fetch_array($executequery1)) {
              $a2N=$row['name'];
              $a2desp=$row['description'];
           }
            if($rand1!=$rand2)
            {
                break;
            }
        }  
    ?>
    <div class="blog">
  <div class="conteudo">
    <h1> Category : Movie</h1>
    <div class="container-a2">
   <ul class="caption-style-2">
			<li>
                            <img src="movies2.php?id=<?php echo $rand1?>" alt="" width="300" height="300">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Movie 1</h1>
                                                <p><?php echo $a1N;?><br>
                                                <a href="http://www.imdb.com/?ref_=nv_home"> Read more</a></p>
					</div>
				</div>
			</li>
                       
			<li>
                            <img src="movies2.php?id=<?php echo $rand2?>" alt="" width="300" height="300">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Movie 2</h1>
						<p><?php echo $a2N;?><br>
                                                <a href="http://www.imdb.com/?ref_=nv_home"> Read more</a></p>
					</div>
				</div>
                        </li>
		</ul>
        <div>
    <p style="clear: both;"></p>
        <br>
        <form  action='' method='post'> 
            <input type="radio" name="anime" value="Movie1" checked>Movie 1 is better than Movie 2 
        <br>
            <input type="radio" name="anime" value="Movie2"> Movie 2 is better than Movie 1
        <br>
            <input type="radio" name="anime" value="Both"> Both Movies are same
        <br>
            <input type="radio" name="anime" value="DontKnow"> i dont know both 
            
        <br>
        <br>
        
         <button type='submit' name='next'>next</button>
         <button type='submit' name='skip'>Skip</button>
            
        </form>
       <br><br>

    <hr>
   
  </div>
  </div>
</div>
    </DIV>
    </body>
</HTML>