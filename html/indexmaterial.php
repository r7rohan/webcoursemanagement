<?php session_start();
if(isset($_POST["filename"])){
  foreach ($_POST as $key => $value) {
    $_SESSION[$key]=$value;}
  $_SESSION["file"]=$_FILES["file"];
  $_SESSION["index"]=1;}

include "indexphp.php";
$flag=0;

if($_SESSION["index"]==1){

  $cname=$_SESSION["filename"];
  $sql ="SELECT fileid FROM files where filename='$cname';";
  $sc=$pd->query($sql);
  while($r=$sc->fetch(PDO::FETCH_ASSOC)){
    $flag=1;}
  $sql ="SELECT max(fileid) FROM files;";
  $sc=$pd->query($sql);
  $place=1;
  while($r=$sc->fetch(PDO::FETCH_ASSOC)){
    $place=$r["max(fileid)"]+1;}

  if($flag==1)echo ("<script>alert('exists!');</script>");
  else{
    $f=$_SESSION["file"]["name"];
    $ex=explode('.',$_SESSION["file"]["name"]);
    $ext=strtolower(end($ex));
    chmod ('files/',0777);
    $dest='files/'.$f.$cname.'.'.$ext;
    $temp=$_SESSION["file"]["tmp_name"];
    move_uploaded_file($temp,$dest);

    $dw=0;
    $ts=time();
    $cid=$_SESSION["courseid"];
    $_SESSION["myfiles"][]=$cname;
    $sql="INSERT INTO files(fileid,filename,downloads,fileadd,courseid,ts)values ($place,'$cname',$dw,'$dest',$cid,$ts);";
    $pd->query($sql);
    $_SESSION["index"]=0;
    $_SESSION["filename"]=0;
    header("Location: indexpage.php");return;
}}
$_SESSION["index"]=0;
$_SESSION["filename"]=0;
?>






<html>
<head>
  <style>
    body{
      overflow:auto;
      background: url("../pics/bg.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    form.form{
      display: block;
      margin:30vh 30vw;
      font-family:cursive;
      font-size:2vw;
      background:rgba(255,255,255,0.7);
      border-radius:2vh;
    }
    form button{
      height:5vh;
      width:5vw;
      margin-left:3vw;
      border-radius:1vh;
      background-color: rgba(0,0,0,0.1);
    }
  </style>
  </head>
  <title>Add Files</title>
  <body>
    <form class="form" method="post" enctype="multipart/form-data">
      <label>--> FILE-NAME <input name="filename" type="text" value=""/></label><br>
      <label>--> FILE <input name="file" type="FILE" value=""/></label><br>
      <button>SUBMIT</button>
      </form>
    </body>
</html>
