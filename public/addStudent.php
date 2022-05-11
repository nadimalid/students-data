<?php
require_once("../src/functions.php");

try{
   $pdo = new PDO("sqlite:../studentsdb.db");
} catch (PDOException $e) {
   echo $e->getMessage();
}

$sql = "insert into student (student_id ,first_name ,middle_name ,last_name, course)";
$sql .= " values(:studentid , :firstname, :middlename, :familyname, :course)";

// change the number if its already available
$number;
do {
   $number = rand(1, 100);
} while (!checkIdavailability($number));

$studentId = $number;

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":studentid", $studentId);
$stmt->bindParam(":firstname", $_POST["firstname"]);
$stmt->bindParam(":middlename", $_POST["middlename"]);
$stmt->bindParam(":familyname", $_POST["familyname"]);
$stmt->bindParam(":course", $_POST["course"]);
$result = $stmt->execute();

echo json_encode($result);
