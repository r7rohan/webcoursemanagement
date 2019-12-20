<?php
session_start();
$pd=new PDO('mysql:host=localhost;port=3306;dbname=db','rohan','rohan');
$k="";$pass="";$done="submit";
$flag="none";
foreach ($_POST as $key => $value)
    $_SESSION[$key]=$value;
foreach ($_FILES as $key => $value)
    $_SESSION[$key]=$value;
if (isset($_SESSION['submit'])){
$k=$_SESSION['name'];
$pass=$_SESSION['pass']	;
$sql="SELECT val FROM dataset where name='$k'";
$sc=$pd->query($sql);
while($r=$sc->fetch(PDO::FETCH_ASSOC))
$pss=$r['val'];
if($pss==$pass)
	$flag='block';
}
if(isset($_SESSION['newsubmit'])){
	$flag="block";
$newname=$_SESSION['newname'];
$newpass=$_SESSION['newpass'];
//$sql="INSERT INTO dataset(name,val) VALUES('$newname','$newpass');";
//$sc=$pd->prepare($sql);
//$sc->execute();
$done="submitted";
echo print_r($_FILES['file']);
}
 ?>

<div style="display:<?=$flag?>">
<form method="post" id='f1' action="http://localhost/hello.php" enctype="multipart/form-data">
<label>Name <input required id="newname" name="newname" type="text" value="<?php echo($k);?>"></input></label><br>
<label>Pass <input required id="newpass" name="newpass" type="password" value=''></input></label><br>
<label>FILE <input name="file" type="file" ></input></label><br>
<input type="submit" name="newsubmit" value='<?php echo($done);?>' >
</form>
</div>


<form method="post" id='f0'>
<label>Name <input required id="name" name="name" type="text" value="<?php echo($k);?>"></input></label><br>
<label>Pass <input required id="pass" name="pass" type="password" value='<?php echo($pass);?>'></input></label><br>
<input type="submit" name="submit" value="Submit" >
</form>
