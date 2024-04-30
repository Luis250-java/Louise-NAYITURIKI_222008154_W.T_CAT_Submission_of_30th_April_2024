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
include('databaseconnection.php');
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

<div><footer style="background-color:grey;text-align: center;width:100%;height:70px; color: white;font-size: 25px;"><p> Designed by Louise_NAYITURIKI-222008154 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</center>
<center>
    <button style="background-color: darkgreen; width: 150px;height: 40px;" ><a href="home.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button>
</center>
</h2>
</body>
</html>