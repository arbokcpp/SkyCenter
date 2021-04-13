<?php
/* test sugli input */
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "inserire un nome";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "sono consentiti solo lettere e spazi";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "inserire un indirizzo mail";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "è richiesto un indirizzo Email valido";
    }
  }

/*
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
*/
Name: <input type="text" name="name" value="<?php echo $name;?>">

Email: <input type="text" name="email" value="<?php echo $email;?>">

?>