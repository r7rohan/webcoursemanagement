<?php session_start();
$flag=0;
$_SESSION["search"]=$_SESSION["search"]??0;
$_SESSION["submit"]=$_SESSION["submit"]??0;

if(isset($_GET["coursename"])){
  foreach ($_GET as $key => $value) {
    $_SESSION[$key]=$value;}
  $_SESSION["index"]=1;
  header("Location: indexcoursename.php");
  return;}

include "indexphp.php";
if($_SESSION["index"]==1){
  $cname=$_SESSION["coursename"];
  $sql ="SELECT courseid FROM courses where coursename='$cname';";
  $sc=$pd->query($sql);
  while($r=$sc->fetch(PDO::FETCH_ASSOC)){
    $flag=1;
    $id=$r["courseid"];}
  if($_SESSION["search"]!==0){
    if(!$flag){echo ("<script>alert('doesnt exist!');</script>");$_SESSION["search"]=0;}
    else {$_SESSION["courseid"]=$id;$_SESSION["search"]=0;$_SESSION["index"]=0;header("Location: indexpage.php");return;}
  }

  if($_SESSION["submit"]!==0){
    if($flag)echo "<script>alert('exists!');</script>";
    else{
      $cname=$_SESSION["coursename"];
      $_SESSION["courseid"]=$_SESSION["totalcourse"]+1;
      $cid=$_SESSION["courseid"];
      $sql="INSERT INTO courses(courseid,coursename)values ($cid,'$cname');";
      $pd->query($sql);
      $_SESSION["submit"]=0;
      $_SESSION["index"]=0;
      header("Location: indexpage.php");return;
      }
    }
}
$_SESSION["index"]=0;
$_SESSION["submit"]=0;
$_SESSION["search"]=0;
$_SESSION["coursename"]=0;
?>




<html>
<head>
  <style>
    body{
      overflow:auto;
      background:rgba(0,0,0,0.4);
      background: url("../pics/bg.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    form.form{
      text-align: center;
      display: block;
      margin:30vh 30vw;
      font-family:cursive;
      font-size:2vw;
      background:rgba(255,255,255,0.7);
      border-radius:2vh;
    }
    form> input{
      height:5vh;
      width:5vw;
      border-radius:1vh;
      background-color: rgba(0,0,0,0.1);
      margin-right: 1vw;
    }
  </style>
  <title>Course</title>
  </head>

  <body>
    <form class="form">
      <label>--COURSE-NAME--<input name="coursename" type="text" value=""/></label><br>
      <input name="search" type= "submit" value="search"/><input type="submit" name="submit" value="ADDNEW"/>
      </form>
    </body>
</html>
