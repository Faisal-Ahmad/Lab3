<?php?>

<html>
<head>
<style>
.error{color:red;}
</style>
</head>
<body>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nameErr = $fullnameErr = $emailErr = $genderErr = $phoneErr = $passErr = $cpassErr ="";
$name = $fullname = $email = $gender = $phone = $password = $cpassword = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["un"])) {
    $nameErr = "Username is required";
  } else {
    $name = test_input($_POST["un"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["fn"])) {
    $fullnameErr = "FullName is required";
  } else {
    $fullname = test_input($_POST["fn"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
      $fullnameErr = "Only letters and white space allowed";
    }
  }
if (empty($_POST["ue"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["ue"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
 if (empty($_POST["up"])) {
    $phoneErr = "Phone Number is required";
  } else {
    $phone = test_input($_POST["up"]);
    if (!preg_match("/^[0-9]{11}$/", $phone)) {
      $phoneErr = "Invalid phone number";
    }
  }
   if (empty($_POST["pw"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["pw"]);
    if (!preg_match("/^[a-zA-Z0-9]{8}/", $password)) {
      $passErr = "password is too short";
    }
  }
   if (empty($_POST["gen"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gen"]);
  }
}
?>
<form name="application" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table align="center" style="font-size:30px">
	<tr>
		<td>
		username :
		</td>
		<td>
		 <input type ="text" name ="un" value="<?php echo $name;?>"/>
		 <span class="error">* <?php echo $nameErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Fullname :
		</td>
		<td>
		 <input type ="text" name ="fn" value="<?php echo $fullname;?>"/>
		  <span class="error">* <?php echo $fullnameErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Email :
		</td>
		<td>
		 <input type ="text" name ="ue" value="<?php echo $email;?>"/>
		 <span class="error">* <?php echo $emailErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Phone :
		</td>
		<td>
		 <input type ="text" name ="up" value="<?php echo $phone;?>"/>
		 <span class="error">* <?php echo $phoneErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Password :
		</td>
		<td>
		 <input type ="password" name ="pw" value="<?php echo $password;?>"/>
		 <span class="error">* <?php echo $passErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Gender :
		</td>
		<td>
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"/>Male
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"/>Female
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other"/>Other
		 <span class="error">* <?php echo $genderErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Education :
		</td>
		<td>
		 <input type="checkbox" name="edu[]" value="SSC">SSC
		 <input type="checkbox" name="edu[]" value="HSC">HSC
		 <input type="checkbox" name="edu[]" value="BSC">BSC
		 <input type="checkbox" name="edu[]" value="MSC">MSC
		</td>
	</tr>
	<tr>
	<tr>
		<td>
		
		</td>
		<td>
		<input type="submit" style="font-size:30px;">
		</td>
	</tr>


</table>
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $fullname;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $cpassword;
echo "<br>";
echo $gender;
?>
</body>
</html>