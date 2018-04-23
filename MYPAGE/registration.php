
<?php include('header.php')?> 

<?php
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
   // $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     // $emailErr = "Invalid email format"; 
    //}
  }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div style="width: 1350px; height: 50px; margin: 0 auto;">
	<p style="font-size: 1.1em; float: right;"> <button><a href="count_vowels.php"> Help </a> </button>  </p>
</div>
<div style="width: 400px; height: 170px; background-color: #e6ffe6; text-align: center; margin:10vh auto; top:30%; left: 30%;">
<h3>Please identifier your self</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span>* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="pass" value="<?php echo $pass;?>">
  <span>* <?php echo $passErr;?></span>
  <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</div>

<?php include('footer.php')?>

