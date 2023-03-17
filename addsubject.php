<?php
// setup host & connect database
session_start();

$hostname_reg = "localhost";
$database_reg = "XXXX";
$username_reg = "XXXX";
$password_reg = "XXXX";
$reg = mysql_pconnect($hostname_reg, $username_reg, $password_reg) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_reg, $reg);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewSubject"] == "Yes") {


$BookID=$_POST['BookID'];
$Book=$_POST['Book'];
  
$sql = "INSERT INTO tbl_book (BookID,Book) VALUES ('$BookID','$Book')";
$dbquery = mysql_db_query($database_reg, $sql)or die(mysql_error());
  
header("location:register.php");
  
}



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>enroll Course</title>
    <link rel="stylesheet" href="add_sub.css"> 

  </head>
  <body>


  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">

    <div class="container">
        <div class="brand-title">enroll Course</div>
        
        <div class="inputs">
          <label>Course Code</label>
          <input type="text" placeholder="ST2082116" />
          <label>Course Name</label>
          <input type="text" placeholder="Web Application Programming" />
          <input type="hidden" name="InsertNewSubject" value="Yes">
          <button type="submit" name="submit" value ="Submit">Submit</button>
          <button type="reset"name="reset" value="&nbsp;Reset&nbsp;">Reset</button>
        </div>
        <a href="register.php">Back</a>
      </div>

  </body>
</html>
