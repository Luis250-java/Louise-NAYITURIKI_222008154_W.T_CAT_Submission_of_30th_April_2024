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
include('databaseconnection.php');
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
                    <td style='background-color:pink'><a style='padding:4px' href='delete_attendance.php?id=$pid'>Delete</a></td> 
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

<div><footer style="background-color:grey;text-align: center;width:100%;height:70px; color: white;font-size: 25px;"><p> Designed by Louise_NAYITURIKI-222008154 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</center>
<center>
    <button style="background-color: darkgreen; width: 150px;height: 40px;" ><a href="home.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button>
</center>
</body>
</html>