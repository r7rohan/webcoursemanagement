<?php include "indexphp.php";
if(!isset($_GET['pass']))session_start();

if (isset($_GET['pass'])){                                                             //login
$f=0;
$sessname=$_GET['name'];
$pass=$_GET['pass']	;
$sql="SELECT val FROM dataset where name='$sessname'";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC)){
$f=1;
$pss=$r['val'];}
if(!$f){
	$f=1;
  $sql="INSERT INTO dataset(name,val) VALUES ('$sessname','$pass')";
  $sc=$pd->query($sql);}
else if($pss!=$pass&&$f==1){header("location:indexlog.php");return;}
else $f=0;
setcookie("PHPSESSID","",time()-3600);
session_id($sessname);                                                                      //session
session_start();
if($f==1){session_destroy();session_id($sessname);session_start();}
$_SESSION["sessname"]=$sessname;
$_SESSION["loggedin"]=1;
$_SESSION["index"]=0;}

elseif($_SESSION["loggedin"]==1);
else{header("location:indexlog.php");return;}
if(isset($_GET['message'])&&$_GET["message"]==1)echo ("<script>alert('new account created');</script>");

if(isset($_GET['pass'])){header("location:indexpage.php?message=$f");return;}
if(isset($_GET["duserid"])){
  foreach ($_GET as $key => $value)
    $_SESSION[$key]=$value;                                                                  //removeget
    $_SESSION['index']=1;
    header("location:indexpage.php");
    return;}
if($_SESSION['index']==1){
  $id=$_SESSION['duserid'];
  $sql ="SELECT downloads FROM files where fileid=$id";
  $sc=$pd->query($sql);
  while($r=$sc->fetch(PDO::FETCH_ASSOC))
  $dn=$r["downloads"]+1;
  $sql="UPDATE files SET downloads=$dn where fileid=$id";                                       //downloads
  $pd->query($sql);
  $_SESSION['index']=0;}
if(isset($_GET['logout'])){
  $_SESSION["loggedin"]=0;
  setcookie("PHPSESSID","",time()-3600);                                                      //logout
  header("location:indexlog.php");
  return;
}
if(isset($_GET["delete"])){
    $id=$_GET["delete"];
  if(in_array($_GET["delete"],$_SESSION["myfiles"])||$_SESSION["sessname"]=="rohan"){
    $sql="DELETE from files where filename='$id'";                                              //delete
    $pd->query($sql);
    $_SESSION["myfiles"]= \array_diff($_SESSION["myfiles"], [$_GET["delete"]]);}
  else echo ("<script>alert('doesnt exist or doesnt belong to you');</script>");
}

include "indexinitialize.php";                                                                  //initialize
?>


<!DOCTYPE html>
<html
  <head>
    <title>COURSE MANAGEMENT</title>
    <link rel="stylesheet" type="text/css" href="../CSS/indexpagecss.css">
    <script>
    var coursematerial=[],coursedownload=[],totalcoursematerial=0;
    <?php $y=$_SESSION['courseid'];
          $z=$_SESSION['totalcourse'];
          $l=$_SESSION['totalcoursematerial'];
    echo "courseid=$y;";
      echo "totalcourse=$z;";
      echo "totalcoursematerial=$l;";
    for($i=1; $i<=$_SESSION['totalcoursematerial']; $i++){
      $k=$_SESSION['material'][$i]['downloads'];
      $j=$_SESSION['material'][$i]['filename'];
      echo("coursematerial[$i]='$j';
        coursedownload[$i]=$k;");}
        ?>

    function leaderboard(){
        var o=document.getElementById('lb');
        o.style.transition='width 1s ease-in-out';
        if(o.style.width=="0vw")o.style.width = '40vw' ;
        else o.style.width = '0vw' ;
      }
    function submit(id){
        document.getElementById(id).submit();}
    function deletetab(){
      if(document.getElementById('delete').style.display=="none")
      document.getElementById('delete').style="display:block;";
      else document.getElementById('delete').style="display:none;";
    }

    function onload(){
      for(var i=1;i<=totalcoursematerial;i++){
        for(var j=1;j<=totalcoursematerial-i;j++){
          if(coursedownload[j]>coursedownload[j+1]){
            var temp=coursedownload[j];
            coursedownload[j]=coursedownload[j+1];
            coursedownload[j+1]=temp;
            var temps=coursematerial[j];
            coursematerial[j]=coursematerial[j+1];
            coursematerial[j+1]=temps;}}}
      var str=' ';
      for(var i=totalcoursematerial;i>=1;i--){
          var s=24-coursematerial[i].length-2-1;
          str+=coursematerial[i];
          if(s>0)
          for(var j=1;j<=s;str+=' ',j++);
          str+=coursedownload[i];
          str+='\n ';}

      var o=document.getElementById("leaderpara");
      o.textContent=str;
      var o=document.getElementById("course"+courseid);
      o.style="background-color:white";

      if(totalcourse>3)
        for(var i=0;i<=totalcourse;i++){
          var o=document.getElementById("course"+i);
          o.style.width=(40.01/(totalcourse+1))+'vw';}
    }
    </script>
  </head>

<body onload="onload();">

        <section><div class="material">
          <div  onclick="submit('f100')"><a class="name">Trial</a><a class="info">date downloads=0</a></div>
          <form id="f100" style="display:none;"><input  name="duserid" value='100'/></form>
          <?php
          for($i=$_SESSION["totalcoursematerial"];$i>=1;$i--){
          $id=$_SESSION["material"][$i]["fileid"];
          $name=$_SESSION["material"][$i]["filename"];
          $add=$_SESSION["material"][$i]["fileadd"];
          $ts=$_SESSION["material"][$i]["ts"];
          $date=date("d.m.Y",$ts);
          $downloads=$_SESSION["material"][$i]["downloads"];
          echo("<div  onclick=\"submit('f$id')\">
          <a class='name' href='$add' download style='color:black;font-style: normal;text-decoration:none'>$name</a>
          <a class='info' href='$add' download style='color:black;font-style: normal;text-decoration:none'>$date downloads=$downloads</a></div>
          <form id='f$id' style='display:none;'><input  name='duserid' value='$id'/></form>");}
          ?>
        </div></section>


        <header><div class="header">
            <div class="logo">COURSE MANAGEMENT</div>
            <div class="coursecontainer"><div id="course0" class='courses' onclick="submit('c0');">Trial</div>
            <form id='c0' style='display:none;'><input  name='courseid' value='0'/></form>
            <?php
            for($i=$_SESSION["totalcourse"];$i>=1;$i--){
            $id=$_SESSION["course"][$i]["courseid"];
            $name=$_SESSION["course"][$i]["coursename"];
            echo("<div id='course$id' class='courses' onclick=\"submit('c$id');\">$name</div>
            <form id='c$id' style='display:none;'><input  name='courseid' value='$id'/></form>");}
            ?>
            </div>
            <div class="logout" onclick="submit('logout')"></div>
            <form id="logout" style="display:none;"><input type="hidden" name="logout" val=''/></form>
            <div class="addcourse" onclick="window.location.href='indexcoursename.php'"></div>
        </div></header>


        <section>
            <div class="leftmenu">
            <div class="addmaterial" onclick="window.location.href='indexmaterial.php'">Add File</div>
            <div class="leaderboardb" onclick="leaderboard()">Leaderboard</div>
            <div class="mymaterialb" onclick="deletetab();">Delete</div>
            <form id="delete" class="delete" align="center" style="display:none;" ><input name="delete" required type="text"/><br><button>DELETE</button><form>
            </div>

        </section>

          <section>
              <div class="leaderboard" id="lb">
                <div align="center">TOP GEMS</div>
                <pre id="leaderpara"></pre>
              </div>
          </section>





    </body></html>
