<?php include 'db_connect.php' ?>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $member_id = $_POST['member_id'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  // $date_created = $_POST['date_created'];

  $sql = "INSERT INTO `members`(`member_id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `date_created`) VALUES ('$member_id','$firstname','$middlename','$lastname','$gender','$contact','$email',current_timestamp())";

  $result = mysqli_query($conn,$sql);

  if($result){
    $showAlert = true;
  }
  else {
    $showAlert = false; // Set this to false in case of an error.
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration Form in HTML CSS</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="registration.css" />
</head>

<body>
<!-- <?php 
   if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Account Is Created.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
 }?> -->


  <section class="container">
    <header>Registration Form</header>
    <form action="#" class="form">
      <div class="column">
        <div class="input-box">
          <label>First Name</label>
          <input type="text" placeholder="Enter full name" name="firstname" required />
        </div>

        <div class="input-box">
          <label>Middle Name</label>
          <input type="text" placeholder="Enter full name" name="middlename" required />
        </div>

        <div class="input-box">
          <label>Last Name</label>
          <input type="text" placeholder="Enter full name" name="lastname" required />
        </div>
      </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" name="email" required />
        </div>
      

      <div class="column">
        <div class="input-box">
          <label>Phone Number</label>
          <input type="number" placeholder="Enter phone number" name="contact" required />
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" placeholder="Enter birth date" name="dob" required />
        </div>
      </div>
      <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" checked />
            <label for="check-male">male</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-female" name="gender" />
            <label for="check-female">Female</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-other" name="gender" />
            <label for="check-other">prefer not to say</label>
          </div>
        </div>
      </div>
      <div class="input-box address">
        <label>Address</label>
        <input type="text" placeholder="Enter street address" name="address" required />
        <input type="text" placeholder="Enter street address line 2" name="address" required />
        <div class="column">
          <div class="select-box">
            <select>
              <option hidden>Country</option>
              <option>America</option>
              <option>Japan</option>
              <option>India</option>
              <option>Nepal</option>
            </select>
          </div>
          <input type="text" placeholder="Enter your city" name="city" required />
        </div>
        <div class="column">
          <input type="text" placeholder="Enter your region" name="region" required />
          <input type="number" placeholder="Enter postal code" name="pin" required />
        </div>
      </div>
      <div class="input-box">
        <label>Select Plan</label>
        <div class="select-box">
          <select>
            <option hidden>Package</option>
            <option>Basic Package - ₹1200</option>
            <option>Premium Package - ₹2400</option>
            <option>Diamond Package - ₹4200</option>
          </select>
        </div>
      </div>
      <button>Submit</button>
    </form>
  </section>
</body>

</html>