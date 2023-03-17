<?php
// setup host & connect database
session_start();

$hostname_reg = "localhost";
$database_reg = "XXXX";
$username_reg = "XXXX";
$password_reg = "XXXX";
$reg = mysql_pconnect($hostname_reg, $username_reg, $password_reg) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_reg, $reg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <!-- style & js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<!-- decorate -->
<style>
.fakeimg {
  height: 100px;
  background: #aaa;
}

main {
    padding: 1rem 0;
}

</style>
</head>
<body>

    <div class="jumbotron text-left" style="margin-bottom:0">
        <h1>Student Registration</h1>
        <p>Rajamangala University of Technology Phra Nakhon</p>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" 
            data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
            </button><a class="navbar-brand" href="#">Registration System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="register.php">Student List</a></li>
            <li><a href="addstudent.php">enroll Student</a></li>
            <li><a href="addsubject.php">enroll Course</a></li>
          </ul>
        </div>
        </div>
    </nav>


    <main>

    <div class="w3-container">
        <h2>Student Detail</h2><br>

        <div style="width:10px;"&nbsp;><a class="w3-button w3-left-align w3-round-xxlarge 
        w3-yellow" href="edit_std.php?sid=<?php echo $data_1['SID']; ?>">edit</a> </div>
        <div class="w3-col w3-padding" style="width:10px;"&nbsp;>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST" name="Delete">
              <div class="w3-col">
              <input class="w3-button w3-left-align w3-round-xxlarge w3-red" type="submit" name="button" id="button" value="delete" />
              <input type="hidden" name="sid" value="<?php echo $data_1['SID']; ?>" />
              <input type="hidden" name="DeleteStudent" value="Yes" />
              </div>
            </form>
          </div>

      <div class="w3-content">
      <table class="w3-gray w3-col">
        <tr>
          <th class="w3-left-align" style="width:6%">No.</th>
          <th class="w3-left-align" style="width:20%">Name</th>
          <th class="w3-left-align" style="width:20%">Surname</th>
          <th class="w3-center">Subject</th>
        </tr>
      </table>
      
        <table id="mytable" class="table">
        <tbody>

        <?php
            $sid=$_GET['SID'];
            $sql_1 = "SELECT tbl_reg.SID,tbl_student.sname,tbl_student.lname,tbl_reg.BookID,tbl_book.Book
            FROM tbl_student JOIN tbl_reg ON tbl_student.SID=tbl_reg.SID JOIN tbl_book ON tbl_book.BookID=tbl_reg.BookID 
            WHERE tbl_reg.SID='$sid'";
            $qry_1 = mysql_query($sql_1, $reg) or die(mysql_error());
            $row_total= mysql_num_rows($qry_1);
        while ($data_1 = mysql_fetch_array($qry_1)) { ?>
        
        <tr>
            <td class="w3-col w3-left-align w3-padding" style="width:5%;"><?php echo $data_1['SID']; ?></td>
            <td class="w3-col w3-padding" style="width:20%;"><?php echo $data_1['sname']; ?></td>
            <td class="w3-col w3-padding" style="width:30%;"><?php echo $data_1['lname']; ?></td>
            <td class="w3-col w3-padding" style="width:40%;"><?php echo $data_1['Book']; ?></td>
        </tr>

        <?php
        }
        ?>
        </tbody>
        </table>
      </div>

    </div>
    </main>

</body>
</html>