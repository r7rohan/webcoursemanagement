
<a href="https://r7ohan.000webhostapp.com/html/indexpage.php"><h3>You can see an example of working website here https://r7ohan.000webhostapp.com/html/indexpage.php</h3></a>

<h1>
Setting up the web server
</h1>

<ul><li>Download the files together in the web server folder (/htdocs)</li></ul> 

<h1>
Setting up the sql server  
</h1>

<ul><li>In sql, execute the following<br>
- create database db;<br>
- create table courses(courseid int primary key AUTO_INCREMENT, coursename varchar(20));<br>
- create table files(fileid int PRIMARY key AUTO_INCREMENT, filename varchar(20),fileadd varchar(100),ts int,downloads int,courseid int);<br>
- create table dataset(sno int PRIMARY key AUTO_INCREMENT, name varchar(20),val varchar(20));<br></li><br>

<li>- In sql, Grant the web server the access and create an account<br>
grant all on db.* 'rohan'@localhost identified by 'rohan';   //name='rohan' //password='rohan' //webserver=localhost</li><br>

<li>In html/indexphp.php, modify the sql server, the name, password and database to give database access to php </li></ul>
<br>


<h1>FEATURES...</h1>
<ul>
  <li> Name and password should be entered in the Login page. If name isn't in the database, a new account is automatically created. 
  </li><br>
  <li> There is a log out button, if not clicked you can always freely enter the site without logging in(main site /html/indexpage)
  </li><br>
  <li> You can add a course or search for an already added course using the upper right file button.
  </li><br>
  <li> The course bar is like the google tab bar, it can adjust size depending on number of courses. It can also change it's color when selected
  </li><br>
   <li> After selecting any of the course tabs, You can add files in it.
  </li><br>
  
   <li> The website also has a left menu which comes out when hovered. It has buttons for adding file, leaderboard, delete file. They change color when hovered.
  </li><br>
  
  <li> Clicking the add files, you are directed to another page where you select file for upload to the selected course. It wont let files with multiple names to exist. Same design is applied to add file.
  </li><br>
  
   <li> On clicking the leaderboard button, the leaderboard panel slides in from right. This panel contains the list of names of files of the selected course in descending order of downloads. 
  </li><br>
  <li> On clicking the delete button, a tab emerges in the left menu. Enter the file to delete. If it is you uploaded the file then it deletes the file otherwise it doesn't 
  </li><br>
  
   <li> Now the main window, This has the list of files uploaded in the particular course. It also has the info of number of downloads and date of upload. If clicked it downloads the particular file and the download for it increases by 1.
  </li><br>
   <li> All of it happens in real time and updates everytime any button(course , file) is clicked.
  </li><br>
  <li> I could have added a sorting button on the basis of date of upload, name in the main window or a my-file search option but, i feel its not that important.
  </li><br>
  
  
  <h1>Working...</h1>
   <li> The backend (uploading file/course and info, displaying in tab form ~htmldivs, login and verification, deleting) is fully functioning and is written in php with database from sql;
  </li><br>
  <li> Frontend structure is written in basic html, design in basic css and functioning (sorting of leaderboard, buttons for panels, course tab selection etc.
  </li><br>
  
  
  
  
  
  
  
  
  
  
  
  
  
  </ul>


