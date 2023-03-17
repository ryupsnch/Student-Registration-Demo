<?php
// setup host & connect database
session_start();

$hostname_reg = "localhost";
$database_reg = "XXXX";
$username_reg = "XXXX";
$password_reg = "XXXX";
$reg = mysql_pconnect($hostname_reg, $username_reg, $password_reg) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_reg, $reg);

$sid=$_GET['sid'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["EditStudent"] == "Yes") {

  $sid=$_POST['sid'];
  $initial=$_POST['initial'];
  $sname=$_POST['sname'];
  $lname=$_POST['lname'];

$sql=" UPDATE tbl_student SET  Title='$initial',Sname='$name',lname='$lname'
       WHERE SID='$sid'";

$dbquery = mysql_db_query($database_reg, $sql)or die(mysql_error());

header("location:detail_std.php");

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Student</title>
    <link rel="stylesheet" href="add_std.css"> 

  </head>
  <body>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">

    <?php
    $sql_2="SELECT tbl_student.* FROM tbl_student WHERE SID='$sid'";
    $qry_2 = mysql_query($sql_2,$reg) or die(mysql_error());
    $data_2 = mysql_fetch_array($qry_2);
    ?>

    <div class="container">
          <div class="brand-title">edit Student</div>
          
          <div class="radio">
                <label>Mr.</label>
                <input type="radio" name="initial" value="1" <?php if (!(strcmp(1, $data_2['Title']))) {echo "checked=\"checked\"";} ?> >
                <td><label>Mrs.</label>
                <input type="radio" name="initial" value="2" <?php if (!(strcmp(2, $data_2['Title']))) {echo "checked=\"checked\"";} ?>></td>
          </div>

          <div class="inputs">
            <label>First Name</label>
            <input type="name" value="<?php echo $data_2['Sname']?>" placeholder="Your name.." />
            <label>Last Name</label>
            <input type="name" value="<?php echo $data_2['lname']?>" placeholder="Your last name.." />

            <input type="hidden" name="sid" value="<?php echo $data_2['SID']; ?>">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <button type="submit" name="submit" value ="Submit">Submit</button>
            <button type="reset"name="reset" value="&nbsp;Reset&nbsp;">Reset</button>
          </div>
          <a href="register.php">Back</a> 
        </div>

  </body>
</html>
