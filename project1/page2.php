<?php
  include 'head.php';
  session_start();
  $name = isset($_SESSION['name']) ? $_SESSION["name"] : "Guest";
  $email = $_SESSION['email'];
?>

  <p><?php echo "Hello $name";?></p>
  <p><?php echo "Your mail is $email, right?";?></p>
</body>

<?php
  include 'foot.php';
?>
