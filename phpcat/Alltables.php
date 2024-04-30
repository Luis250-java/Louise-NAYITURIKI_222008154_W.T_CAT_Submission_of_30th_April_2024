<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
    <h1>ALL DATABASE TABLES ARE HERE:</h1>
<hr>
    <center>
    <h2><i> TABLE FOR TEACHERS</h2></i></center>
    <table>
        <tr>
            <th>teacher_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>date_of_birth</th>
            <th>email</th>
            <th>teaching_experience</th>
            <th>subject_taught</th>
            <th colspan="2">Action</th>
        </tr>
        <?php

// Establish Database Connection
include('databaseconnection.php');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all teachers info
        $sql = "SELECT * FROM teachers";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['teacher_id']; // Fetch the teacher_id
                echo "<tr>
                    <td>" . $row['teacher_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['date_of_birth'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['teaching_experience'] . "</td>
                    <td>" . $row['subject_taught'] . "</td>
                    <td style='background-color:grey'><a style='padding:4px' href='deleteteachers.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:pink'><a style='padding:4px' href='updateteacher.php?id=$pid'>Update</a></td> 
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
</h2>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
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
                    <td style='background-color:grey'><a style='padding:4px' href='deletestudents.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:pink'><a style='padding:4px' href='updatestudents.php?id=$pid'>Update</a></td> 
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
</h2>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR MULTIMEDIAS</h2></i></center>
    <table>
        <tr>
            <th>mid_id</th>
            <th>user_id</th>
            <th>media_type</th>
            <th>location</th>
            <th>upload_date</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
include('databaseconnection.php');
        // Prepare SQL query to retrieve all multimedias information
        $sql = "SELECT * FROM multimedias";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['mid_id']; // Fetch the class_id
                echo "<tr>
                    <td>" . $row['mid_id'] . "</td>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['media_type'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['upload_date'] . "</td>
                    <td style='background-color:pink'><a style='padding:4px' href='deletemultimedia.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:grey'><a style='padding:4px' href='updatemultimedia.php?id=$pid'>Update</a></td> 
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
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR ADMINS</h2></i></center>
    <table>
        <tr>
            <th>admin_id</th>
            <th>username</th>
            <th>password</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all admins information
        $sql = "SELECT * FROM admins";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['admin_id']; // Fetch the admins_id
                echo "<tr>
                    <td>" . $row['admin_id'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='deleteadmins.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:brown'><a style='padding:4px' href='updateadmin.php?id=$pid'>Update</a></td> 
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
</h2>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR USERACCOUNTS</h2></i></center>
    <table>
        <tr>
            <th>user_id</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
            <th>registration_date</th>
            <th>role</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all users information
        $sql = "SELECT * FROM useraccounts";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['user_id']; // Fetch the user_id
                echo "<tr>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['registration_date'] . "</td>
                    <td>" . $row['role'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='deleteuseraccount.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:brown'><a style='padding:4px' href='updateuseraccount.php?id=$pid'>Update</a></td> 
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
</h2>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR COURSES</h2></i></center>
    <table>
        <tr>
            <th>course_id</th>
            <th>course_name</th>
            <th>course_code</th>
            <th>course_description</th>
            <th>teacher_id</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all courses information
        $sql = "SELECT * FROM courses";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['course_id']; // Fetch the course_id
                echo "<tr>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['course_name'] . "</td>
                    <td>" . $row['course_code'] . "</td>
                    <td>" . $row['course_description'] . "</td>
                    <td>" . $row['teacher_id'] . "</td>
                    <td style='background-color:pink'><a style='padding:4px' href='deletecourse.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:grey'><a style='padding:4px' href='updatecourse.php?id=$pid'>Update</a></td> 
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
</h2>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR CLASSES</h2></i></center>
    <table>
        <tr>
            <th>class_id</th>
            <th>class_name</th>
            <th>course_id</th>
            <th>teacher_id</th>
            <th>class_section</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all attendance information
        $sql = "SELECT * FROM classes";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['class_id']; // Fetch the class_id
                echo "<tr>
                    <td>" . $row['class_id'] . "</td>
                    <td>" . $row['class_name'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['teacher_id'] . "</td>
                    <td>" . $row['class_section'] . "</td>
                    <td style='background-color:pink'><a style='padding:4px' href='deleteclass.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:grey'><a style='padding:4px' href='updateclass.php?id=$pid'>Update</a></td> 
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
</body>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR ATTENDANCE</h2></i></center>
    <table>
        <tr>
            <th>attendance_id</th>
            <th>student_id</th>
            <th>student_name</th>
            <th>course_id</th>
            <th>attendance_date</th>
            <th>status</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all attendance information
        $sql = "SELECT * FROM attendance";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['attendance_id']; // Fetch the attendance_id
                echo "<tr>
                    <td>" . $row['attendance_id'] . "</td>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['student_name'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['attendance_date'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td style='background-color:pink'><a style='padding:4px' href='deleteattendance.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:grey'><a style='padding:4px' href='updateattendance.php?id=$pid'>Update</a></td> 
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
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR ADMINS</h2></i></center>
    <table>
        <tr>
            <th>department_id</th>
            <th>department_name</th>
            <th>department_head</th>
            <th>location</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
// Establish Database Connection
$connection = new mysqli("localhost", "root", "", "students attendance database");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
        // Prepare SQL query to retrieve all admins information
        $sql = "SELECT * FROM departments";
        $result = $connection->query($sql);

        // Check if there are any info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['department_id']; // Fetch the department_id
                echo "<tr>
                    <td>" . $row['department_id'] . "</td>
                    <td>" . $row['department_name'] . "</td>
                    <td>" . $row['department_head'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td style='background-color:grey'><a style='padding:4px' href='deletedepartment.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:pink'><a style='padding:4px' href='updatedepartment.php?id=$pid'>Update</a></td> 
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

<div><footer style="background-color:grey;text-align: center;width:100%;height:70px; color: white;font-size: 25px;"><p> Designed by Louise_NAYITURIKI-222008154 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</center>
<center>
    <button style="background-color: darkgreen; width: 150px;height: 40px;" ><a href="home.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button>
</center>
</body>
</html>