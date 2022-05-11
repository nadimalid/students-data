<?php
require_once("../src/functions.php");

try{
   $pdo = new PDO("sqlite:../studentsdb.db");
} catch (PDOException $e) {
   echo $e->getMessage();
}

$sql = "delete from student where student_id=:studentid";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":studentid", $_GET["deleteid"]);
$result = $stmt->execute();

echo json_encode($result);
