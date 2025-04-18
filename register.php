<?php
 include 'partials/_dbconn.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $fullName = $_POST['fullName'];
  $address = $_POST['address'];
  $pinCode = $_POST['pinCode'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mob = $_POST['mob'];

  $sql = "INSERT INTO `members`(`fullName`, `address`, `pinCode`, `email`, `password`, `mob`) VALUES ('$fullName','$address','$pinCode','$email','$password','$mob')";

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./stylereg.css" />
  <link rel="stylesheet" href="./style2.css" />
  <script src="https://www.gstatic.com/firebasejs/10.3.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.3.0/firebase-database-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.3.0/firebase-auth-compat.js"></script>
  <script src="https://js.stripe.com/v3"></script>

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

  <div class="container" id="container">
    <div class="displayStep" id="displayStep">
      <div class="circle">
        <div class="circle1" id="circle1">
          <p>1</p>
        </div>
        <div class="circle2" id="circle2">
          <p>2</p>
        </div>
        <div class="circle3" id="circle3">
          <p>3</p>
        </div>
      </div>
      <div class="steps">
        <div class="step1">
          <p>STEP 1</p>
          <span>YOUR INFO</span>
        </div>
        <div class="step1">
          <p>STEP 2</p>
          <span>SELECT PLAN</span>
        </div>
        <div class="step1">
          <p>STEP 3</p>
          <span>SUMMARY</span>
        </div>
      </div>
    </div>

    <form id="registrationForm" action="register.php" method="post">

    <div class="stepContainer" id="stepContainer">
      <!--PERSO INFOS -------------------------------------------------------------------->
      <div class="affichStep">
        <div class="stepInfo" id="stepInfo">
          <h1>Personal Info</h1>
          <p class="descrition">
            Please provide vour name, email address, and phone number.
          </p>

          <div class="flexError">
            <p for="fullName">Full Name</p>
            <span id="errorName"></span>
          </div>
          <input type="text" name="fullName" id="fullName" placeholder="e.g. Peter Parker" />
          <div class="flexError">
            <p>Address</p>
            <span id="errorAddr"></span>
          </div>
          <input type="text" name="address" id="address" placeholder="e.g. Block 301, sector 20..." />
          <div class="flexError">
            <p>Pin-Code</p>
            <span id="errorPin"></span>
          </div>
          <input type="text" name="pinCode" id="pinCode" placeholder="e.g. 421503" />
          <div class="flexError">
            <p>Email Address</p>
            <span id="errorMail"></span>
          </div>
          <input type="text" name="email" id="email" placeholder="e.g. peterparker@gmail.com" />
          <div class="flexError">
            <p>Password</p>
            <span id="errorPin"></span>
          </div>
          <input type="text" name="password" id="password" placeholder="Enter New Password" />
          <div class="flexError">
            <p>Phone Number</p>
            <span id="errorNum"></span>
          </div>
          <input type="text" name="mob" id="mob" placeholder="e.g. +1 234 567 890" />

          <div class="buttonContainerStepOne">
            <button onclick="goStepTwo()" class="nextStep">Next Step</button>
          </div>
          
        </div>

        
        <!--SELECT PLAN ------------------------------------------------------------------------>
        <div class="stepPlan" id="stepPlan">
          <h1>Select your plan</h1>
          <p class="descrition">
            You have the option of monthly or yearly billing.
          </p>
          <div class="planMonth" id="planMonth">
            <button class="planButton" id="moisArcade" name="price" value="1200" onclick="getPrice1()">
              <img src="./imagereg/icon-arcade.svg" alt="" />

              <p>Basic</p>
              <span id="priceMonth" class="priceMonth">₹1200/mo</span>
            </button>

            <button class="planButton" id="moisAdvenced" name="price" value="2400" onclick="getPrice2()">
              <img src="./imagereg/icon-advanced.svg" alt="" />

              <p>Premium</p>
              <span id="priceMonth" class="priceMonth">₹2400/mo</span>
            </button>

            <button class="planButton" id="moisPro" name="price" value="4200" onclick="getPrice3()">
              <img src="./imagereg/icon-pro.svg" alt="" />

              <p>Diamond</p>
              <span id="priceMonth" class="priceMonth">₹4200/mo</span>
            </button>
          </div>
          <div class="planMonth" id="planYear">
            <button class="planButton" id="anneeArcade" name="price" onclick="getPrice4()">
              <img src="./imagereg/icon-arcade.svg" alt="" />
              
              <p>Basic</p>
              <span class="priceYear">₹5000/yr</span>
              <label class="free">2 months free</label>
            </button>
            
            <button class="planButton" id="anneeAdvenced" name="price" onclick="getPrice5()">
              <img src="./imagereg/icon-advanced.svg" alt="" />
              
              <p>Premium</p>
              <span class="priceYear">₹8000/yr</span>
              <label class="free">2 months free</label>
            </button>
            
            <button class="planButton" id="anneePro" name="price" onclick="getPrice6()">
              <img src="./imagereg/icon-pro.svg" alt="" />

              <p>Diamond</p>
              <span class="priceYear">₹11000/yr</span>
              <label class="free">2 months free</label>
            </button>
          </div>

          <div class="switch">
            <p class="monthly">Monthly</p>
            <label class="check"><input type="checkbox" id="switch" id="checkbox" onclick="reset()" />
            <span></span></label>

            <p class="yearly">Yearly</p>
          </div>

          <div class="buttonContainerStepTwo">
            <button onclick="backStepOne()" class="goBack">Go back</button>
            <button onclick="goStepFour()" class="nextStep">
              Next Step
            </button>
          </div>

        
        </div>

        
        <!--ADD ON---------------------------------------------------------------------------------->

        <!--RESUME---------------------------------------------------------------------------------->
        <div class="stepSummary" id="stepSummary">
          <h1>Finishing up</h1>
          <p class="descrition">
            Double-check everything looks OK before confirming.
          </p>
          <div class="resume">
            <div class="containerResume">
              <div id="resumeMonth" >

                <div class="flexResume">
                  <div>
                    <h4 id="modeResume">Choose a plan</h4>
                    <button onclick="goFromFourToTwo()">Change</button>
                  </div>
                  <label for="" id="priceResume"></label>
                </div>
                <br />
                <span></span>
                <div class="flexResume">
                  <p>Additional Equipments</p>
                  <label for="" id="onlinePrice">+₹0</label>
                </div>
                <div class="flexResume">
                  <p>Personal Trainer</p>
                  <label for="" id="storagePrice">+₹0</label>
                </div>
                <div class="flexResume">
                  <p>Combo Package</p>
                  <label for="" id="customizablePrice">+₹0</label>
                </div>
              </div>
            </div>
            <div class="flexTotal">
              <p id="modeTotal">Total</p>
              <span id="totalPrice"></span>
              <span id="dollar1" class="dollar">₹</span>


            </div>
            <div class="buttonContainerStepFour">
              <button onclick="backSteptTwo()" class="goBack">
                Go back
              </button>
              <button id="checkout" onclick="window.location.href='pricing.html';signUp()" class="nextStep">
                Confirm
              </button>
              <script async src="https://js.stripe.com/v3/pricing-table.js"></script>

           



            </div>
          </div>
        </div>
        <!--THANK YOU------------------------------------------------------------------------------>
        <div class="stepThankYou" id="stepThankYou">
          <img src="./imagereg/icon-thank-you.svg" alt="" />
          <h1>Thank you!</h1>
          <p>
            Thanks for confirming your subscription! We hope you have fun
            using our platform. If you ever need support, please feel free to
            email us at support@gymfreaks.com.
          </p>
        </div>
      </div>
      </form>
    </div>
  </div>


  <script src="firebase.js"></script>

  <script src="./script.js"></script>


</body>

</html>