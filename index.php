<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2> login Successfull</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<b><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></b>

		<b><p>Now u can find the fibonacci series </p></b>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
	
  <form method="post">
  <table class="table table-bordered">
	<tr>
  <td><label for="name" class="form-label">Enter a number:</label> <td><input type="text" name="n1" ><br>
	</tr>
	<tr>
		<td>
  <label for="name" class="form-label">Enter 2nd number:</label><td> <input type="text" name="n2" ><br>
	</tr>
	<tr>
		<td>
  <label for="name" class="form-label">Enter the limit:</label> <td><input type="text" name="Number" ><br>
	</tr>
	<tr>
		<td>
  <button name="submit">Submit</button>
  <br><br>
  <?php
if (isset($_POST['submit'])) {
  $n=$_POST['Number'];
  $number1 = $_POST['n1'];
  $number2 = $_POST['n2'];
  echo "Fibonacci Series  are \n";
    echo $number1.' '.$number2.' ';
 
  for($i = 2; $i < $n; $i++){
    $number3= $number1 + $number2;
    echo $number3.' ';
    $number1 = $number2;
    $number2 = $number3;
    
    
   
  }
}
    ?>
	</tr>
  </form>


	

</table>	
</body>
</html>


