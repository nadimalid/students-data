let modal = document.getElementById("new-student");

let newSturdentModal = document.getElementById("openModal");

let closeModal = document.getElementById("closeModal");

let studentTableBody = document.getElementById("students");

let studentForm = document.getElementById("student-form");

//open new student form modal
newSturdentModal.onclick = function() {
  modal.style.display = "block";
}

// cloes new studednt form modal
closeModal.onclick = function() {
  modal.style.display = "none";
}

// loads students data into a table using ajax
const getStudents = () => {
   let xhr =new XMLHttpRequest();

   xhr.onprogress = () => {
      studentTableBody.innerHTML = "<tr><td colspan='4' style='text-align:center;'>Loading Data</td></tr>";
   }

   xhr.onload = () => {
      if(xhr.status == 200){
         let studentsData = JSON.parse(xhr.responseText);
         if(studentsData.length > 0){
            studentTableBody.innerHTML = "";
            studentsData.forEach((record) => {
               let row = `<tr>
                              <td>${record['student_id']}</td>
                              <td>${[record['first_name'], ' ', record['middle_name'], ' ', record['last_name']].join('') }</td>
                              <td>${record['course']}</td>
                              <td><button class='btn delete' data-id=${record['student_id']} onclick='deleteStudent(this)'>Delete</button></td>
                           </tr>`;
               studentTableBody.innerHTML += row;
            });
         } else {
            studentTableBody.innerHTML = "<tr><td colspan='4' style='text-align:center;'>No data available</td></tr>";
         }
      }
   }

   xhr.open("GET", "getStudents.php", true);
   xhr.send();
}

const newStudent = (e) => {
   e.preventDefault();

   let firstName = document.getElementById("first_name").value;
   let middleName = document.getElementById("middle_name").value;
   let familyName = document.getElementById("family_name").value;
   let course = document.getElementById("course").value;

   let formData = `firstname=${firstName}&middlename=${middleName}&familyname=${familyName}&course=${course}`

   let xhr = new XMLHttpRequest();

   xhr.onload = () => {
      if(xhr.status == 200){
         let result = JSON.parse(xhr.responseText);
         if(result) {
            getStudents();
            modal.style.display = "none";
            studentForm.reset();
         }
      }
   }

   xhr.open("POST", "addStudent.php", true);
   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhr.send(formData);
}

getStudents();

studentForm.addEventListener("submit", newStudent);

const deleteStudent = (el) => {
   let studentId = el.getAttribute("data-id");

   if (confirm("Are you sure you want to delete this record?") == true) {
      let xhr =new XMLHttpRequest();

      xhr.onload = () => {
         if(xhr.status == 200){
            let result = JSON.parse(xhr.responseText);
            if(result) {
               getStudents();
            }
         }
      }

      xhr.open("GET", `deleteStudent.php?deleteid=${studentId}`, true);
      xhr.send();
   }
}
