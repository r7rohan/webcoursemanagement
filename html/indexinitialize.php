<?php
include "indexphp.php";
$_SESSION["index"]=$_SESSION["index"]??0;
$_SESSION["courseid"]=$_SESSION["courseid"]??0;
$_SESSION["myfiles"]=$_SESSION["myfiles"]??array();
foreach ($_POST as $key => $value) {
  $_SESSION[$key]=$value;}
foreach ($_GET as $key => $value) {
    $_SESSION[$key]=$value;}

$sql ="SELECT count(courseid) FROM courses;";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC))
  $_SESSION["totalcourse"]=$r["count(courseid)"];

$sql ="SELECT count(fileid) FROM files";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC))
$_SESSION["totalmaterial"]=$r["count(fileid)"];

$id=$_SESSION["courseid"];
$sql ="SELECT count(fileid) FROM files where courseid=$id";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC))
$_SESSION["totalcoursematerial"]=$r["count(fileid)"];

$n=1;
$sql ="SELECT fileid,filename,fileadd,ts,downloads FROM files where courseid=$id";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC)){
$_SESSION["material"][$n]=$r;$n+=1;}

$n=1;
$sql ="SELECT courseid,coursename FROM courses;";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC)){
$_SESSION["course"][$n]=$r;$n+=1;}

?>
