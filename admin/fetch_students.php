<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disha_foundation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, student_name, dob, contact_no, address, in_disha_since, father_name, mother_name, family_members, earning_members, school_name, class, school_timings, subjects, receiving_sponsorship, taking_tuitions, tuition_subjects, tuition_time, tuition_place, fees_paid, amount_paid, part_time_job, job_description, interests, how_help_back FROM student_profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td data-bs-toggle='collapse' data-bs-target='#collapse".$row["id"]."' aria-expanded='false' aria-controls='collapse".$row["id"]."'>".$row["id"]."</td>
        <td data-bs-toggle='collapse' data-bs-target='#collapse".$row["id"]."'>".$row["student_name"]."</td>
        <td data-bs-toggle='collapse' data-bs-target='#collapse".$row["id"]."'>".$row["dob"]."</td>
        <td>
            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editStudentModal".$row['id']."'>Edit</button>
            <button class='btn btn-dark' onclick='confirmDelete(".$row["id"].")'>Delete</button>
        </td>
      </tr>
      <tr id='collapse".$row["id"]."' class='collapse'>
        <td colspan='4'>
            <table class='table mb-0'>
                        <tr><th>Contact No.</th><td>".$row["contact_no"]."</td></tr>
                        <tr><th>Address</th><td>".$row["address"]."</td></tr>
                        <tr><th>In Disha Since</th><td>".$row["in_disha_since"]."</td></tr>
                        <tr><th>Father's Name</th><td>".$row["father_name"]."</td></tr>
                        <tr><th>Mother's Name</th><td>".$row["mother_name"]."</td></tr>
                        <tr><th>Family Members</th><td>".$row["family_members"]."</td></tr>
                        <tr><th>Earning Members</th><td>".$row["earning_members"]."</td></tr>
                        <tr><th>School Name</th><td>".$row["school_name"]."</td></tr>
                        <tr><th>Class</th><td>".$row["class"]."</td></tr>
                        <tr><th>School Timings</th><td>".$row["school_timings"]."</td></tr>
                        <tr><th>Subjects</th><td>".$row["subjects"]."</td></tr>
                        <tr><th>Receiving Sponsorship</th><td>".$row["receiving_sponsorship"]."</td></tr>
                        <tr><th>Taking Tuitions</th><td>".$row["taking_tuitions"]."</td></tr>
                        <tr><th>Tuition Subjects</th><td>".$row["tuition_subjects"]."</td></tr>
                        <tr><th>Tuition Time</th><td>".$row["tuition_time"]."</td></tr>
                        <tr><th>Tuition Place</th><td>".$row["tuition_place"]."</td></tr>
                        <tr><th>Fees Paid</th><td>".$row["fees_paid"]."</td></tr>
                        <tr><th>Amount Paid</th><td>".$row["amount_paid"]."</td></tr>
                        <tr><th>Part Time Job</th><td>".$row["part_time_job"]."</td></tr>
                        <tr><th>Job Description</th><td>".$row["job_description"]."</td></tr>
                        <tr><th>Interests</th><td>".$row["interests"]."</td></tr>
                        <tr><th>How Help Back</th><td>".$row["how_help_back"]."</td></tr>
                    </table>
                </td>
              </tr>";
              echo "<div class='modal fade' id='editStudentModal".$row['id']."' tabindex='-1' aria-labelledby='editStudentModalLabel' aria-hidden='true'>
              <div class='modal-dialog modal-lg'> <!-- Increased modal size for better layout -->
                  <div class='modal-content'>
                      <div class='modal-header'>
                          <h5 class='modal-title'>Edit Student Details</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                      </div>
                      <div class='modal-body'>
                          <form action='update_student.php' method='post'>
                              <input type='hidden' name='id' value='".$row['id']."'>
                              
                              <div class='mb-3'>
                                  <label for='student_name'>Name</label>
                                  <input type='text' class='form-control' id='student_name' name='student_name' value='".$row['student_name']."' required>
                              </div>
                              <div class='mb-3'>
                                  <label for='dob'>Date of Birth</label>
                                  <input type='date' class='form-control' id='dob' name='dob' value='".$row['dob']."' required>
                              </div>
                              <div class='mb-3'>
                                  <label for='contact_no'>Contact Number</label>
                                  <input type='text' class='form-control' id='contact_no' name='contact_no' value='".$row['contact_no']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='address'>Address</label>
                                  <input type='text' class='form-control' id='address' name='address' value='".$row['address']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='in_disha_since'>In Disha Since</label>
                                  <input type='date' class='form-control' id='in_disha_since' name='in_disha_since' value='".$row['in_disha_since']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='father_name'>Father's Name</label>
                                  <input type='text' class='form-control' id='father_name' name='father_name' value='".$row['father_name']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='mother_name'>Mother's Name</label>
                                  <input type='text' class='form-control' id='mother_name' name='mother_name' value='".$row['mother_name']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='family_members'>Family Members</label>
                                  <input type='number' class='form-control' id='family_members' name='family_members' value='".$row['family_members']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='earning_members'>Earning Members</label>
                                  <input type='number' class='form-control' id='earning_members' name='earning_members' value='".$row['earning_members']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='school_name'>School Name</label>
                                  <input type='text' class='form-control' id='school_name' name='school_name' value='".$row['school_name']."'>
                              </div>
                              <div class='mb-3'>
                                  <label for='class'>Class</label>
                                  <input type='text' class='form-control' id='class' name='class' value='".$row['class']."'>
                              </div>
                              <div class='mb-3'>
                              <label for='class'>Class</label>
                              <input type='text' class='form-control' id='class' name='class' value='".$row['class']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='school_timings'>School Timings</label>
                              <input type='text' class='form-control' id='school_timings' name='school_timings' value='".$row['school_timings']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='subjects'>Subjects</label>
                              <textarea class='form-control' id='subjects' name='subjects'>".$row['subjects']."</textarea>
                          </div>
                          <div class='mb-3'>
                              <label for='receiving_sponsorship'>Receiving Sponsorship</label>
                              <select class='form-control' id='receiving_sponsorship' name='receiving_sponsorship'>
                                  <option value='1'".($row['receiving_sponsorship'] == 1 ? ' selected' : '').">Yes</option>
                                  <option value='0'".($row['receiving_sponsorship'] == 0 ? ' selected' : '').">No</option>
                              </select>
                          </div>
                          <div class='mb-3'>
                              <label for='taking_tuitions'>Taking Tuitions</label>
                              <select class='form-control' id='taking_tuitions' name='taking_tuitions'>
                                  <option value='1'".($row['taking_tuitions'] == 1 ? ' selected' : '').">Yes</option>
                                  <option value='0'".($row['taking_tuitions'] == 0 ? ' selected' : '').">No</option>
                              </select>
                          </div>
                          <div class='mb-3'>
                              <label for='tuition_subjects'>Tuition Subjects</label>
                              <input type='text' class='form-control' id='tuition_subjects' name='tuition_subjects' value='".$row['tuition_subjects']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='tuition_time'>Tuition Time</label>
                              <input type='text' class='form-control' id='tuition_time' name='tuition_time' value='".$row['tuition_time']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='tuition_place'>Tuition Place</label>
                              <input type='text' class='form-control' id='tuition_place' name='tuition_place' value='".$row['tuition_place']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='fees_paid'>Fees Paid</label>
                              <select class='form-control' id='fees_paid' name='fees_paid'>
                                  <option value='1'".($row['fees_paid'] == 1 ? ' selected' : '').">Yes</option>
                                  <option value='0'".($row['fees_paid'] == 0 ? ' selected' : '').">No</option>
                              </select>
                          </div>
                          <div class='mb-3'>
                              <label for='amount_paid'>Amount Paid</label>
                              <input type='number' class='form-control' id='amount_paid' name='amount_paid' value='".$row['amount_paid']."'>
                          </div>
                          <div class='mb-3'>
                              <label for='part_time_job'>Part Time Job</label>
                              <select class='form-control' id='part_time_job' name='part_time_job'>
                                  <option value='1'".($row['part_time_job'] == 1 ? ' selected' : '').">Yes</option>
                                  <option value='0'".($row['part_time_job'] == 0 ? ' selected' : '').">No</option>
                              </select>
                          </div>
                          <div class='mb-3'>
                              <label for='job_description'>Job Description</label>
                              <textarea class='form-control' id='job_description' name='job_description'>".$row['job_description']."</textarea>
                          </div>
                          <div class='mb-3'>
                              <label for='interests'>Interests/Hobbies</label>
                              <textarea class='form-control' id='interests' name='interests'>".$row['interests']."</textarea>
                          </div>
                          <div class='mb-3'>
                              <label for='how_help_back'>How Will You Help Back</label>
                              <textarea class='form-control' id='how_help_back' name='how_help_back'>".$row['how_help_back']."</textarea>
                          </div>
                          <button type='submit' class='btn btn-primary'>Save Changes</button>
                          </form>
                          
                      </div>
                  </div>
              </div>
          </div>";
      
  }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
$conn->close();
?>
