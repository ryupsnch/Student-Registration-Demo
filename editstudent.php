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

header("location:reg.php");

}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>
  <body><center>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">

    <?php
    $sql_2="SELECT tbl_student.* FROM tbl_student WHERE SID='$sid'";
    $qry_2 = mysql_query($sql_2,$reg) or die(mysql_error());
    $data_2 = mysql_fetch_array($qry_2);
    ?>


  <fieldset><legend><font color="#0000FF"><b>แก้ไขประวัตินักศึกษา</b></font></legend>
    <table width="60%" border="0" cellpadding="5" cellspacing="0">
      <tr bgcolor= "#0066ff">
  	  <td colspan="2" align="center"><font color="white"><b>ประวัตินักศึกษา</b></font>
  	  </td>
      </tr>
  	<tr>
  	  <td>คำนำหน้า</td>
  	  <td align="left">

            <input type="radio" name="initial" value="1" <?php if (!(strcmp(1, $data_2['Title']))) {echo "checked=\"checked\"";} ?> >นาย
            <input type="radio" name="initial" value="2" <?php if (!(strcmp(2, $data_2['Title']))) {echo "checked=\"checked\"";} ?>>นางสาว

  	  </td>
      </tr>

      <tr>
        <td>ชื่อ</td>
        <td align="left"><input type="text" name="sname" size="20" maxlength="20" value="<?php echo $data_2['Sname']?>" ></td>
     </tr>

     <tr>
        <td>นามสกุล</td>
        <td align="left"><input type="text" name="sname" size="20" maxlength="20" value="<?php echo $data_2['lname']?>" ></td>
     </tr>

  	  <td colspan = "2" align="center">
            <input type="hidden" name="sid" value="<?php echo $data_2['SID']; ?>">
            <input type="hidden" name="EditStudent" value="Yes">
            <input type="submit" name="submit" value ="Submit">
            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;"></td>
      </tr>
    </table>
    <hr width="60%" color="red">
  </fieldset></form>
  </center>
  </body>
</html>
