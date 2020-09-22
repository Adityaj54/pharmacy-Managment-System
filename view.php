<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Sys</title>
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
    width: 30%;
    height: 300px; /* only for demonstration, should be removed */
    
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 70%;
    
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
    float:center;
  
  
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
.button3 {float:right}
.button3 {background-color: #f44336;} 
.button2 {align="right";}
.button1 {font-size: 16px;}
.button2 {font-size: 16px;}
.button3 {font-size: 16px;}
.button1 {background-color: #f44336;} 
.button3 {background-color: #f44336;}
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
color: #CA0101;
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

                        <li><a href="manager.php"><button class="button button1">Dashboard</button></a></li>
			<li><a href="view.php"><button class="button button1">View Users</button></a></li>
			<li><a href="view_prescription.php"><button class="button button1">View Prescriptions</button></a></li>
			<li><a href="stock.php"><button class="button button1">Manage Stock</button></a></li>


			
		</ul>	
</nav>
<article>
<h4>Manage Pharmacist</h4> 
<div class="tab">

<ul>
  <button class="button button2" onclick="openCity(event, 'content_1')">Pharmacist</button>
  <button class="button button2" onclick="openCity(event, 'content_2')">Cashier</button>
<button class="button button2" onclick="openCity(event, 'content_3')">Manager</button>
  </ul>
          
        <div id="content_1" class="tabcontent">  
<?php echo $message;
			  echo $message1;
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM pharmacist")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
			} 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="tabcontent">  
		          <?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Cashier' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM cashier") 
                or die(mysql_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' >";
         echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?>
        </div>  
		 <div id="content_3" class="tabcontent">  
		        <?php echo $message1;
			  
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
        
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['Staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?> 
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