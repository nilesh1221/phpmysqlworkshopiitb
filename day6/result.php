<?php
  session_start();

  // Declarations
  $rollno = $_SESSION['rollno'];

  $conn = mysqli_connect("localhost", "root", "", "result") or die("Could't connect");

  $sql = "SELECT fullname, rollno, php, mysql, html FROM students WHERE rollno='$rollno'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0)
  {
    $row = mysqli_fetch_assoc($result);
    $fullname =  $row["fullname"];
    $php =  $row["php"];
    $mysql =  $row["mysql"];
    $html =  $row["html"];
    $total = $php + $mysql + $html;
    $percentage = round($total/3,2);
  }
  else
    echo "Result is pending";

  mysqli_close($conn);

  if(@$_POST['submit'])
  {
    @$to = $_POST['mailid'];
    $admin= "@gmail.com"; //****insert admin email id****
    if($to)
  	{
  			ini_set("SMTP","smtp.gmail.com");
  			ini_set("smtp_port","587");
  			//setup variables
  			$subject = "Course result";
  			$headers="From: $admin";
  			$body ="Hello $fullname.\nFollowing is your Course result.\n\n Name: $fullname\n Roll No.: $rollno\n Marks:\n
          PHP : $php/100 \n
          MYSQL : $mysql/100 \n
          HTML : $html/100 \n
      TOTAL : $total/300 \n
      AGG. PERCENTAGE : $percentage";

  			mail($to, $subject, $body, $headers);
        echo "Notification : Mail sent successfully.";
    }
    else
  	 echo "Notification : You must enter a mail id.";
  }

  if(@$_POST['logout'])
  {
    header('Location: logout.php');
  }
?>

<html>
  <head>
    <title>Course Result</title>
    <style>
      table, th, td {
        border: 1px solid black;
      }
    </style>
  </head>
  <body style="background-color: #585f74;  font-family: Open, sans-serif;color: black;text-align: center;">
    <br>
    <div style="text-align: center;
                background-color: #ffc857;
                padding: 10px;
                border-radius: 10px;
                color: black;
                width: 70%;
                height: 75%;
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);">
      <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;"><u>COURSE RESULT</u></h2>
      <p style="text-align: center;">Name : <b><?php echo $fullname; ?></b><br>Roll No. : <b><?php echo $rollno; ?></b><br><br></p>
      <table style="width:60%; text-align: center; margin: auto;">
        <tr>
          <th>SUBJECT</th>
          <th>MARKS OBTAINED</th>
          <th>MAXIMUM MARKS</th>
        </tr>
        <tr>
          <td><b>PHP</b></td>
          <td><?php echo $php; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>MYSQL</b></td>
          <td><?php echo $mysql; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>HTML</b></td>
          <td><?php echo $html; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>TOTAL</b></td>
          <td><b><?php echo $total; ?></b></td>
          <td><b>300</b></td>
        </tr>
        <tr>
          <td colspan="3"><b>Agg. Percentage : <?php echo $percentage." %"; ?></b></td>
        </tr>
      </table>
      <h3 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">
      <?php
        if($percentage >=60)
          echo "CONGRATULATIONS ".strtoupper($fullname);
      ?>
      </h3>
      <br>
      <form action='result.php' method='POST'>
        E-mail : <input type='text' name='mailid' style="border-radius: 5px;"><br><br>
        <input type='submit' name='submit' value='Mail Result' style="border-radius: 10px;"><br><br>
      </form>
      <a href='changepw.php'>Change password</a>
      <form action='logout.php' method ='POST'>
        <input type='submit' name='logout' value='Log Out' style="border-radius: 10px; margin: 10px;"><br><br>
      </form>
    </div>
  </body>
</html>
