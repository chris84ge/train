<?php
  include 'head.php';
  if(filter_has_var(INPUT_POST, 'submit')){
    $name = $_POST['name'];
    $email = $_POST['name'];
    if(strlen($name)>10){
      $msg = "$name is a long name!";
    } else {
      $msg = "$name is a regular name";
    }
  }

  if(isset($_POST['more'])){
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    header('Location: page2.php');
  }

  if(filter_has_var(INPUT_POST, 'reset')){
    $name = "";
    $email = "";
  }

?>

  <main class="container">
    <section>
      <p>This form get and display your input</p>
    </section>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" ><br>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" ><br>
      <input type="submit" name="submit">
      <input type="submit" name="reset" value="Reset">
      <?php if(filter_has_var(INPUT_POST, 'submit')): ?>
        <input type="submit" name="more" value="Click here for more">
      <?php endif; ?>
    </form><br>
    <?php if(filter_has_var(INPUT_POST, 'submit')): ?>
    <section>
      <p><?php echo "Il tuo nome e' $name";?></p>
      <p><?php echo "La tua email e' $email";?></p>
      <p><?php echo $msg;?></p>
    </section>
  <?php endif; ?>
  </main>
</body>

<?php
  include 'foot.php';
?>
