<?php
// check if student id already used
// return true if not used
function checkIdavailability($student_id){
   try{
      $pdo = new PDO("sqlite:../studentsdb.db");
   } catch (PDOException $e) {
      echo $e->getMessage();
   }

   $sql = "select count(*) from student where student_id=:studentid";

   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(":studentid", $student_id);
   $stmt->execute();

   $count = $stmt->fetchColumn();

   $isAvailable = $count > 0 ? false : true;

   return $isAvailable;
}

// checks number of returned rows in student table
function checkRowCount() {
   try{
      $pdo = new PDO("sqlite:../studentsdb.db");
   } catch (PDOException $e) {
      echo $e->getMessage();
   }

   $sql = "select count(*) from student";

   $stmt = $pdo->query($sql);

   $count = $stmt->fetchColumn();

   return $count;
}
