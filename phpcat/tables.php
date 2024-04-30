<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <style>
        /* Basic styling for the navigation bar */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: darkgreen;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="home.html">Home</a>
    <a href="logo.html">Logo</a>
    <a href="tables.html">Tables</a>
    <a href="image.html">Images</a>
    <a href="video.html">videos</a>
    <a href="form.html">Forms</a>
    <a href="audio.html">audios</a>
    <a href="service.html">Service</a>
    <a href="contact.html">contacts</a>
    <a href="about.html">About</a>
        <div class="user-links">
        <a href="userlogin.html">Login</a>
        <a href="signup.html">Sign Up</a>
    </div>
</div>
  </ul>
<center>
    <body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR STUDENTS</h2></i></center>
    <table>
        <tr>
            <th>student_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>reg_number</th>
            <th>date_of_birth</th>
            <th>email</th>
            <th>Address</th>
            <th>Class_section</th>
            <th colspan="2">Action</th>
        </tr>
        <?php

// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all students info
        $sql = "SELECT * FROM students";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['student_id']; // Fetch the student_id
                echo "<tr>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['reg_number'] . "</td>
                    <td>" . $row['date_of_birth'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['Address'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['Class_section'] . "</td>
                    <td style='background-color:grey'><a style='padding:4px' href='deletestudent.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:pink'><a style='padding:4px' href='updatestudent.php?id=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>

<div><footer style="background-color:grey;text-align: center;width:100%;height:70px; color: white;font-size: 25px;"><p> Designed by Louise NAYITURIKI_222008154 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</center>
<center>
    <button style="background-color: indigo; width: 150px;height: 40px;" ><a href="home.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button>
</center>
</h2>
</body>
</html>
	<h1> ATTENDANCE TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>attendance id</th>
			<th>Student id</th>
			<th>Course id</th>
			<th>date</th>			
</tr> <!--inserting data in course table-->
<tr>
    <td>1</td>
	<td>2</td>
	<td>3</td>
	<td>2023-08-09</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
 <tr>
    <td>2</td>
	<td>2</td>
	<td>3</td>
	<td>2023-07-09</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
</body>
</html>
	<h1>CLASSES TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>Class id</th>
			<th>Class Name</th>
			<th>Course id</th>
			<th>Teacher id</th>
			<the>Class section</th>
			
</tr> <!--inserting data in class table-->
<tr>
    <td>1</td>
	<td>Class of maths</td>
	<td>1</td>
	<td>1</td>
	<td>A</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
 <tr>
    <td>2</td>
	<td>Class of IT</td>
	<td>3</td>
	<td>2</td>
	<td>B</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
    <td>3</td>
	<td>Class of Economics</td>
	<td>3</td>
	<td>3</td>
	<td>c</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
</body>
</html>
	<h1> COURSE TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>Course id</th>
			<th>Course Name</th>
			<th>Course code</th>
			<th>Course description</th>
			<the>Teacher id</th>
			
</tr> <!--inserting data in course table-->
<tr>
    <td>1</td>
	<td>Mths</td>
	<td>jMaths 101</td>
	<td>Introduction to Mathematics</td>
	<td>1</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
 <tr>
    <td>2</td>
	<td>Economics</td>
	<td>Economics 102</td>
	<td>Principal of Economics</td>
	<td>3</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
</body>
</html>
	<h1> DEPARTMENTS TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>Department id</th>
			<th>fDepartment Name</th>
			<th>Department head</th>
			<th>Location</th>
			
</tr> <!--inserting data in department table-->
<tr>
    <td>1</td>
	<td>Mathematics</td>
	<td>john KAMILI</td>
	<td>HUYE</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
 <tr>
    <td>2</td>
	<td>Information technology</td>
	<td>Jean UMUTONI</td>
	<td>KIGALI</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
</body>
</html>
	<h1> TEACHERS TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>Teacher id</th>
			<th>first Name</th>
			<th>Date of Birth</th>
			<th>User name</th>
			<th>Password</th>
			<th>email</th>
			<th>Teaching experiment</th>
			<th>Subject tought</th>
			<th><a href="">Edit</a> | <a href=""></a> Delete</a></th>
</tr> <!--inserting data in teachers table-->
<tr>

</tr>
 <tr>
    <td>2</td>
	<td>Alice</td>
	<td>KAMIKAZI</td>
	<td>1980-05-02</td>
	<td>-</td>
	<td>Alice@123</td>
	<td>alicekamikazi@gmail.com</td>
	<td>Maths</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
</body>
</html>
	<h1> USER TABLE</h1>
	<table border="1"  style="color:darkgreen;font-family: Arial;font-size: 18;">
		<tr style="color:dimgray;font-family: Times New Roman; font-size: 22;">

			<th>User id</th>
			<th>user name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Registration date</th>
			<th>Role</th>
			
</tr> <!--inserting data in useraccounts table-->
<tr>
    <td>1</td>
	<td>Alexis@250</td>
	<td>alexisa@gmail.com</td>
	<td>Alexis_1</td>
	<td>2023-08-19</td>
	<td>Admin</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>

</tr>
 <tr>
    <td>2</td>
	<td>Louis@123</td>
	<td>nayituriluisgmail.com</td>
	<td>Loui345</td>
	<td>2023-08-19</td>
   <td>Student</td>
   <td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
  </tr>
 <tr>

	<td>3</td>
	<td>@francis1</td>
	<td>francis@gmail.com</td>
	<td>hirwa2012</td>
    <td>2023-08-19</td>
   	<td>Teacher</td>
	<td><a href="">Edit</a> | <a href=""></a> Delete</a></td>
</tr>
</table>
<footer>
  <center> 
  <marquee><h1 style="color: brown;">UR CBE BIT &copy, 2024 &sams, Designed by: @Louise NAYITURIKI</h1></marquee>
  </center>
</footer>
</body>
</html>
