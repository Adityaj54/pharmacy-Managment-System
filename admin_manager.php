<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];
$sql1=mysql_query("SELECT * FROM manager WHERE username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
 if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO manager(first_name,last_name,staff_id,postal_address,phone,email,username,password,date)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_manager.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> - Pharmacy Sys</title>

<style>



* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
    
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 50%;
    height: 300px; /* only for demonstration, should be removed */
    
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: right;
    padding: 20px;
    width: 50%;
    
    height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
footer {
   
    padding: 10px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
   
    }

/* Style the buttons inside the tab */
.tab button {
    background-color:  #000000;
    float: center;
  
  
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    
}

/* Style the tab content */
.tabcontent {
    display: none;
    
   
    border-top: none;
}
.button {
   
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {float:center;}
.button1 {font-size: 16px;}
.button2 {font-size: 16px;}
.button3 {font-size: 16px;}
.button1 {background-color: #f44336;} 
.button1 {border-radius: 50%;}
.button2 {border-radius: 12px}
.button3 {border-radius: 50%;}
.button1 {padding: 12px 28px;}
.button2 {padding: 12px 28px;}
.button3 {padding: 12px 28px;}
.button2 {background-color: #000000;} 
.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button3 {float:right}
.button3 {background-color: #f44336;} 
.button1 {width: 125px;}
.button2 {width: 125px;}
.button3 {width: 125px;}
.hero-image {
  background-image: url("images/bckg.jpg");
  background-color: #cccccc;
  height: 800px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
h2 {
color: #D00101;
word-spacing: 20px;

}

</style>
</head>
<body>
<body background=<div class="hero-image">
<section>
<header>
  <h2>Pharmacy Management System</h2>
<li><a href="logout.php"><button class="button button3">Logout</button></a></li>
</header>

  <nav>
    
		<ul>
			<li><a href="admin.php"><button class="button button1">Dashboard</button></a></li>
			<li><a href="admin_pharmacist.php"><button class="button button1">Pharmacist</button></a></li>
			<li><a href="admin_manager.php"><button class="button button1">Manager</button></a></li>
			<li><a href="admin_cashier.php"><button class="button button1">Cashier</button></a></li>
			
		</ul>	

</nav> 
<article><center<
    <h4>Manage Manager</h4> 
<div class="tab">


  <button class="button button2" onclick="openCity(event, 'content_1')">View User</button>
  <button class="button button2" onclick="openCity(event, 'content_2')">Add User</button>


</div>

      </center>
       
          
        <div id="content_1" class="tabcontent">  
			<?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM manager") 
                or die(mysql_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['manager_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				
				<td><a href="delete_manager.php?manager_id=<?php echo $row['manager_id']?>"><img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="tabcontent">  
		           <!--Cashier-->
		<?php echo $message;
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="admin_manager.php" method="post" >
			<table align="center" width="220" height="106" border="0" >	
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" required="required" id="staff_id"/></td></tr>  
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" required="required" id="postal_address" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>   
        
      
    </div>  
  
</div>
 
</div>
</div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script></article>
</body>
</html>
