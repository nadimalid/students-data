<?php require_once("../src/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="./assets/css/main.css" />
		<title>Students</title>
	</head>
	<body>
		<?php //echo checkRowCount(); ?>
		<main class="main-content">
			<header>
				<h2 class="title">Students</h2>
				<button class="btn" id="openModal">New Struden</button>
			</header>
			<table style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Course</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="students">
				</tbody>
			</table>
		</main>
		<!-- New student form - modal -->
		<div id="new-student" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>New Student</h2>
					<span id="closeModal" class="close">&times;</span>
				</div>
				<div class="modal-body">
					<form id="student-form">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" id="first_name" value="" placeholder="First Name" required minlength="3" maxlength="40"/>
						<label for="middle_name">Middle Name</label>
						<input type="text" name="middle_name" id="middle_name" value="" placeholder="Middle Name" minlength="1" maxlength="40"/>
						<label for="family_name">Family Name</label>
						<input type="text" name="family_name" id="family_name" value="" placeholder="Family Name" required minlength="3" maxlength="40"/>
						<label>Course</label>
						<input type="text" name="course" id="course" value="" placeholder="Course" required/>
						<input class="btn" id="submit" type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>

		<script src="./assets/scripts/script.js"></script>
	</body>
</html>
