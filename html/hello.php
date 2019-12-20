<html><head>
<style>

body{
    width: 100%;
    height: 100%;
	float:left;
    display: inline-block;
	border:solid 20px rgba(0,255,125,0.3);
    background-color: rgba(255, 0, 0, 0.1);
    font-family: Arial;
    font-size: 20px;
    font-style: oblique;
    font-variant: all-petite-caps;
	box-sizing:border-box;
	text-align:center;
}
figure{
	box-sizing:border-box;
    width: 90%;
    height: 60%;
    overflow: auto;
	transition:2s ease-in-out;
	
}
figure:hover{
border: solid black 50px;
transform: rotate3d(2, -1, -1, -0.25turn);
 }
 
 
 div{display:inline-block;
 text-align:center;
 float:left;
 border:solid black; 
 border-width:0px 5px;
	background:#80808059;
	 box-sizing:border-box;
	 width:31vw;
	 min-height:10vh; 
	 
 }
 div:hover{background:white; border:none;}
 
 div.cont{
	 
	display:none;	 
	
 }
 
 div:hover div.cont{ 
 border:none;
	display:block;
	box-sizing:border-box;
 }
 

</style>  
    <script>function clickk(ele){ele.src="https://lh3.googleusercontent.com/-vxjpTa8-rng/Vuw3ka_FNcI/AAAAAAAAD5Q/FyI3eDoktWoG4H_34NJl-XfsCWrfDsuLgCEwYBhgL/w140-h139-p/Mig29.jpg"}</script>
<meta charset="utf-8">
<title>Hello world</title>
</head>
<body>

<menu>
<h1><div><a href="https://mail.google.com">GMAIL</a>
<div class="cont"><a  href="https://mail.google.com/mail/u/0/#inbox" >R711</a></div><br>
<div class="cont"><a href="https://mail.google.com/mail/u/1/#inbox" >RIITR</a></div></div>

<div><a href="https://www.google.com">Google</a></div>
<div><a href="https://www.youtube.com"> Youtube</a></div>
</h1></menu>


<p>This is just a hello world site</p>
<figure hover="true">
<img onclick="clickk(this)" src="https://c402277.ssl.cf1.rackcdn.com/photos/13100/images/magazine_large/BIC_128.png?1485963152" alt="Panda/">
<figcaption>Hello Panda</figcaption>
</figure>
<?php include "form1.php"?>
</body></html>