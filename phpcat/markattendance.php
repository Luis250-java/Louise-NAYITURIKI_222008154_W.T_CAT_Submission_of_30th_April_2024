            <!-- PHP code to fetch and display attendance records -->
            <?php
            // database connection
include('databaseconnection.php');

            $sql = "SELECT * FROM attendance";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["attendance_id"] . "</td>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["student_name"] . "</td>";
                    echo "<td>" . $row["course_id"] . "</td>";
                    echo "<td>" . $row["attendan_date"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No attendance records found</td></tr>";
            }
            $conn->close();
            ?>