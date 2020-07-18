<?php
  $msg = "";
  $msgClass = ""; // this is for bootstrap

  //check the form submitted Datas
  if(filter_has_var(INPUT_POST, "submit")){
    //get form data
    $name = htmlspecialchars($_POST["Name"]);
    $email = htmlspecialchars($_POST["Email"]);
    $message = htmlspecialchars($_POST["Message"]);
    //check required fields
    if(!empty($name) && !empty($email) && !empty($message)){
      //passed, now check Email
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // fail
        $msg = 'Please add a valied email';
        $msgClass = "alert-danger"; // sempre per bootstrap
      } else {
        // passsssssed
        echo "passed";
        $toEmail = "support@chris.com";
        $subject = 'Contact request from'. $name;
        $body = "<h2>COntact request</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>email</h4><p>'.$email.'</p>
                <h4>message</h4><p>'.$message.'</p>";
        // email headers:...
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // additional $headers
        $headers .= "From: " .$name. "<" .$email. ">" . "\r\n";
        if(mail($toEmail, $subject, $body, $headers)){
          // emakl socket_sent
          $msg = "ypur email has been sent";
          $msgClass = "alert-success";
        } else {
          $msg = "your email hasn't been sent, ty agaub";
          $msgClass = "alert-danger";
        }
      }
    } else {
      // failed
      $msg = 'Please fill all fielsd';
      $msgClass = "alert-danger"; // sempre per bootstrap
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Contact form</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/cosmo/bootstrap.min.css">
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="contact.php">My website</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <?php if($msg != ""): ?>
        <div class="alert <?php echo $msgClass; ?>">
          <?php echo $msg ?>
        </div>
      <?php endif; ?>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="Name" class="form-control" value="<?php echo isset($_POST["Name"]) ? $name : "" ;?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="Email" class="form-control" value="<?php echo isset($_POST["Email"]) ? $email : "" ;?>">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea name="Message" class="form-control" value=""><?php echo isset($_POST["Message"]) ? $message : "" ;?></textarea>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </body>
</html>
