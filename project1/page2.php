<?php
  include 'head.php';
  if(filter_has_var(INPUT_POST, 'submit')){
    $units = $_POST['units'];
    function calcUnit($unit){
      if($unit <= 50){
        return $unit * 3.5;
    } elseif($unit <= 100){
       return $unit * 4;
    } elseif ($unit <= 200){
      return $unit * 5.2;
    } else {
      return $unit * 6.5;
    }
  }
     $result = calcUnit($units);
  }


?>
<section>
Description:
Write a Program to create following pattern using for loops:

*
**
***
****
*****
******
*******
********
</section>
<br>
<section class="container">
<?php
  for($row=0; $row<8; $row++){
    for($star=1; $star<=$row; $star++){
      echo "*";
    }
    echo "<br>";
  }
?>
</section>
<hr>

<section class="container">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for "units" id="bill">Enter your KW</label>
    <input type="number" required min="1" max="500" name="units" id="units">
    <input type="submit" name="submit">
  </form>
<?php
echo "With $units KW, you'll pay $result euro";

?>
</section>
</body>

<?php
  include 'foot.php';
?>
