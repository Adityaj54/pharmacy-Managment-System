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
<title><?php echo $user;?> - Pharmacy Sys</title><style>
.hero-image {
  background-image: url("images/1234.jpg");
  background-color: #cccccc;
  height: 800px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
cr { text-align: center; }
ul { display: inline-block; text-align: left; }
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
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
    width: 10%;
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
    width: 90%;

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
    background-color: #777;
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
#left_column{
height: 800px;
}
img {
opacity:0.6;
    filter: alpha(opacity=50);
  border-radius: 50%;
}
img:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}
.button1 {font-size: 16px;}
.button2 {font-size: 16px;}
.button3 {font-size: 16px;}
.button1 {background-color: #f44336;} 
.button2 {background-color: #f44336;} 
.button3 {background-color: #f44336;} 
.button1 {border-radius: 50%;}
.button2 {border-radius: 50%;}
.button3 {border-radius: 50%;}
.button1 {padding: 12px 28px;}
.button2 {padding: 12px 28px;}
.button3 {padding: 12px 28px;}

.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


.button3:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.button1 {width: 125px;}
.button2 {width: 125px;}
.button3 {width: 125px;}
.button3 {float:right}
.button3 {background-color: #f44336;} 
</style>

</head>
<body>
<body>
<body background=<div class="hero-image">
<header>
<h2>Pharmacy Management System</h2>
<li><a href="logout.php"><button class="button button3">Logout</button></a></li>
</header>
<section>
<nav>
                    

<ul>
<li><a href="manager.php"><button class="button button3">Dashboard</button></a></li>
			<li><a href="view.php"><button class="button button1">View Users</button></a></li>
			<li><a href="view_prescription.php"><button class="button button2">View Prescription</button></a></li>
			<li><a href="stock.php"><button class="button button3">Manage Stock</button></a></li>


			
		</ul>	
</div>
</div>
	
		</center>
</table>
</nav>
		</div>
<article>
    
            	<a href="manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png" width="100" height="100" alt="edit" />
                	<span><button class="button button1">Dashboard</button></span>
                </a>
				<a href="view.php" class="dashboard-module">
                	<img src="images/patients_1.png"  width="100" height="100" alt="edit" />
                	<span><button class="button button1">View Users</button></span>
                </a>
               	
				<a href="view_prescription.php" class="dashboard-module">
                	<img src="images/prescri.jpg" width="100" height="100" alt="edit" />
                	<span><button class="button button1">View Prescription</button></span>
				</a>
				<a href="stock.php" class="dashboard-module">
                	<img src="images/stock_icon.jpg" width="100" height="100" alt="edit" />
                	<span><button class="button button1">Manage Stock</button></span>
                </a>
        </div>
</div>
</article>
</section>
</body>
</html>
