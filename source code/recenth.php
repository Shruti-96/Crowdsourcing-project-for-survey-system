<?php
include 'connection.php';
session_start();
$q = "Select * from resulttable where userid=".$_SESSION['id']." order by timestamp desc;";
$eq = mysql_query($q) or die(mysql_error());
$qen = "Select * from resulttable_eng where userid=".$_SESSION['id']." order by timestamp desc;";
$eqen = mysql_query($qen) or die(mysql_error());
?>
<html>
    <head>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);
            @import url('http://getbootstrap.com/dist/css/bootstrap.css');
            body {
              margin:0;
              font-family: 'Open Sans', sans-serif;
              background: #eee;
            }

            hr {
              background:#dedede;
              border:0;
              height:1px;
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

            .blog {
              float:left;
            }

            .conteudo {
              width:650px;
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
              max-width: 650px;
              min-width: 650px;
            }

            .conteudo h1 {
              margin:0 0 15px;
              padding:0;
              font-family: Georgia;
              font-weight: normal;
              color: #666;
            }
            
            .conteudo h3 {
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
              margin:-5% 0 25px -5%;
            }
            }
            
            .conteudo table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 550px;
        }	

            .conteudo th {
                    background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#1abc9c, #1abc9c);
                    border-left: 1px solid #1abc9c;
                    border-right: 1px solid #1abc9c;
                    border-top: 1px solid #1abc9c;
                    border-bottom: 1px solid #1abc9c;
                    box-shadow: inset 0 1px 0 #999;
                    color: #fff;
                    font-weight: bold;
                    padding: 10px 15px;
                    position: relative;
                    text-shadow: 0 1px 0 #000;	
            }

            .conteudo th:after {
                    background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
                    content: '';
                    display: block;
                    height: 25%;
                    left: 0;
                    margin: 1px 0 0 0;
                    position: absolute;
                    top: 25%;
                    width: 100%;
            }

            .conteudo th:first-child {
                    border-left: 1px solid #777;	
                    box-shadow: inset 1px 1px 0 #999;
            }

            .conteudo th:last-child {
                    box-shadow: inset -1px 1px 0 #999;
            }

            .conteudo td {
                    border-right: 1px solid #fff;
                    border-left: 1px solid #e8e8e8;
                    border-top: 1px solid #fff;
                    border-bottom: 1px solid #e8e8e8;
                    padding: 10px 15px;
                    position: relative;
                    transition: all 300ms;
            }

            .conteudo td:first-child {
                    box-shadow: inset 1px 0 0 #fff;
            }	

            .conteudo td:last-child {
                    border-right: 1px solid #e8e8e8;
                    box-shadow: inset -1px 0 0 #fff;
            }	

            .conteudo tr {
                    background: url(http://jackrugile.com/images/misc/noise-diagonal.png);	
            }

            .conteudo tr:nth-child(odd) td {
                    background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);	
            }

            .conteudo tr:last-of-type td {
                    box-shadow: inset 0 -1px 0 #fff; 
            }

            .conteudo tr:last-of-type td:first-child {
                    box-shadow: inset 1px -1px 0 #fff;
            }	

            .conteudo tr:last-of-type td:last-child {
                    box-shadow: inset -1px -1px 0 #fff;
            }	

            .conteudo tbody:hover td {
                    color: transparent;
                    text-shadow: 0 0 3px #aaa;
            }

            .conteudo tbody:hover tr:hover td {
                    color: #444;
                    text-shadow: 0 1px 0 #fff;
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
      <h2> Hi <?php  echo $_SESSION['u']; ?> !</h2>
      <img src="logo.png">
      </div>
        </aside>
          <div class="blog">
  <div class="conteudo">
    <h1> Recent History </h1>
    <hr>
    <h3>Category : Movies </h3>
    <table>
        <thead>
<tr>
   <th>Movie 1</th>
   <th>Movie 2</th>
   <th>Result</th>
   <th>Time</th>
</tr>
        </thead>

          <?php

               If(mysql_num_rows($eqen)>0)
               {
                 while($row=mysql_fetch_array($eqen))
                 {  

            ?>
             <tr>
              <td><?php echo $row['a1name']; ?></td> 
              <td><?php echo $row['a2name']; ?></td> 
              <td><?php echo $row['result']; ?></td> 
              <td><?php echo $row['timestamp']; ?></td> 
            </tr>
            <?php

            }
            }
             ?>
   </table>
    <br>
    <h3>Category : Anime </h3>
    <table>
        <thead>
<tr>
   <th>Anime 1</th>
   <th>Anime 2</th>
   <th>Result</th>
   <th>Time</th>
</tr>
        </thead>

          <?php

               If(mysql_num_rows($eq)>0)
               {
                 while($row=mysql_fetch_array($eq))
                 {  

            ?>
             <tr>
              <td><?php echo $row['a1name']; ?></td> 
              <td><?php echo $row['a2name']; ?></td> 
              <td><?php echo $row['result']; ?></td> 
              <td><?php echo $row['timestamp']; ?></td> 
            </tr>
            <?php

            }
            }
             ?>


   </table>
    </div>
            </div>
            </div>
    </body>
</html>
