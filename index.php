<html>
<head>
  <title>LOGIN</title>
  <style>
    body{
      overflow:auto;
      background:rgba(0,0,0,0.2);
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

  <body>
    <form class="form" action="html/indexpage.php" >
      <label>--> NAME <input name="name" type="text" value=""/></label><br>
      <label>--> PASSWORD <input name="pass" type="text" value=""/></label><br>

      <button>SUBMIT</button>
      </form>
    </body>
</html>
