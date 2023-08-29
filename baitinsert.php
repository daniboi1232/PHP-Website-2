<!-- Table of Results for Bait Types -->

<table class="table_style">
    <thead>
        <tr>
            <th>Bait</th>
            <th>Bait Target</th>
        </tr>
    </thead>
    <tbody>

<?php 
//$query= "SELECT * FROM trap";
//$r=mysqli_query ($conn,$query);

///echo $query;
///echo mysqli_error($conn);
///$row = mysqli_fetch_assoc($r);
//echo $row['trap_notes'];
///var_dump($r);


$query= "SELECT * FROM bait";
$r=mysqli_query ($conn,$query);


while ($row = mysqli_fetch_assoc($r)){
    
    
    //$idtraptype = $row['trap_type_idtrap_type'];
    //$querie= "SELECT trap_bait FROM trap_type WHERE idtrap_type=$idtraptype";
    //$result=mysqli_query ($conn,$query);
    ///var_dump($r);
    //$rows = mysqli_fetch_assoc($result);
?>
        <tr>
            <td><?php echo $row['bait'];?></td>
            <td><?php echo $row['target'];?></td>
        </tr>
<?php
}

?>
    </tbody>
</table>




<!-- WRITE SECTION TO INSERT INTO BAIT TABLE -->

<!--  PHP for the form  -->
<?php
include "connect.inc";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo 'hello world';
  $newbait = trim($_POST['newbait']);
  $newtarget = trim($_POST['newtarget']);
  var_dump($newbait);
  echo $newtarget;
  $qry = "INSERT INTO `bait`(`bait`, `target`) VALUES ('$newbait','$newtarget')";

  $r = mysqli_query($conn,$qry);
  echo 'your bait is inserted :)';
}
?>
<!-- End of PHP and Start of HTML Form-->
<br>
<div class="container">
  <form action="bait.php">
  <div class="row">
    <div class="bait-col-25">
      <label for="newbait">Bait</label>
    </div>
    <div class="bait-col-75">
      <input type="text" name="newbait" placeholder="Bait" value="<?php if (isset($_POST['newbait'])) echo $_POST['newbait']; ?>">
    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="bait-col-25">
      <label for="newtarget">Bait Target</label>
    </div>
    <div class="bait-col-75">
      <input type="text" name="newtarget" value="<?php if (isset($_POST['newtarget'])) echo $_POST['newtarget']; ?>" placeholder="Bait Target">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>





<!-- END OF BAIT INSERT -->


