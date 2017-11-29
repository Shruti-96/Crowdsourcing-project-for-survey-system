<?php 
  session_start();
  include 'connection.php';
  include 'login.php';
  $_SESSION["errormsg"]="";
      $user=filter_input(INPUT_POST, 'username');
        $passw=filter_input(INPUT_POST, 'pwd');
         $con=  mysql_connect('localhost','root','') or die("doesnt connect");
        mysql_select_db('userinfo') or die("cnt select");
        if(($user=="") || ($passw==""))
        {
            $_SESSION["errormsg"]="empty fields";
                   header("location: login.php");
                     exit;
        }
        if($passw && $user)
        {
           
           $query=  mysql_query("Select * from uinfo where Username='".$user."';") or die(mysql_error());
           $numrows= mysql_num_rows($query);
            echo $numrows;
           if($numrows!=0)
           {
               while($row = mysql_fetch_assoc($query))
               {
                   $dbuser=$row['Username'];
                   $dbpassw=$row['Password'];
                   $dbId=$row['ID'];
               }
               $p=  md5($passw);
               if($user==$dbuser && $p==$dbpassw)
               {
                   $_SESSION['u']=$user;
                   $_SESSION['pas']=$passw;
                   $_SESSION['id']=$dbId;
                   $_SESSION['uerr']="";
                   $_SESSION['perr']="";
                  header("location: member.php");
                     exit;
               }
               else
               {
                   $_SESSION["errormsg"]="incorrect";
                   header("location: login.php");
                     exit;
                   echo "incorrect";
               }
    }
    else
    {
        $_SESSION["errormsg"]="incorrect";
                   header("location: login.php");
                     exit;
         die("that user doesnt exist");
    }
  }
        
?>        