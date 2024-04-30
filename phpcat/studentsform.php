<?php
$connection =new mysqli("localhost","root","","students attendance database");

if($connection->connect_error){
    die("connection failed:".$connection->connect_error);
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $student_id =$_POST['student_id'];
    $first_name =$_POST['first_name'];
    $last_name =$_POST['last_name'];
    $date_of_birth =$_POST['date_of_birth'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $Class_section =$_POST['Class_section'];
    $sql ="INSERT INTO students (student_id, first_name, last_name, date_of_birth, email,password, Class_section) VALUES ('$student_id','$first_name', '$last_name', '$date_of_birth', $email','$password','$Class_section";

    if ($connection->query($sql)==TRUE) {
        echo "Registration successful!";

    }
    else{
        echo "Error:".$sql."<br>".$connection->error;
    }

}
$connection->close();
?>