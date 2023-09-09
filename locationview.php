<!-- WRITE SECTION TO INSERT INTO BAIT TABLE -->
<!--  PHP for the form  -->
<?php
include "connect.inc";

if (isset($_POST['submit'])) {

  //echo 'hello world';
  if (empty($_POST['newregion'] || $_POST['newpark'])){
    echo 'Required fields are empty';
  } else {
    $newregion = trim($_POST['newregion']);
    $newpark = trim($_POST['newpark']);
    //var_dump($newbait);
    //echo $newtarget;
    $qry = "SELECT * FROM `location` WHERE region LIKE '$newregion'";
    $result = mysqli_query($conn,$qry);
    if (isset($result)) { if (mysqli_num_rows($result) > 0) {
          echo 'This Bait is Already entered';
          
    }
    else{
        $qry = "INSERT INTO `location`(`region`, `park`) VALUES ('$newregion','$newpark')";
        $r = mysqli_query($conn,$qry);
        mysqli_close($conn);
        echo '<b>your location is inserted :)<b>';

        //tried to redirect so that the bait page will not enter any more
        header("Location: location.php");
        exit;
    }


  }
}}
?>

<!-- Table of Results for locations -->

<table class="table_style">
    <thead>
        <tr>
            <th>Regions</th>
            <th>Parks</th>
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

$q= "SELECT * FROM `location`";
$r=mysqli_query($conn,$q);



while ($row = mysqli_fetch_assoc($r)) {
    
    
    //$idtraptype = $row['trap_type_idtrap_type'];
    //$querie= "SELECT trap_bait FROM trap_type WHERE idtrap_type=$idtraptype";
    //$result=mysqli_query ($conn,$query);
    ///var_dump($r);
    //$rows = mysqli_fetch_assoc($result);
?>
        <tr>
            <td><?php echo $row['region'];?></td>
            <td><?php echo $row['park'];?></td>
        </tr>
<?php
}

?>
    </tbody>
</table>
<!--  Heading Text  -->
<h1 class="insertheader" >Insert New Location</h1>
<!-- End of PHP and Start of HTML Form-->
<br>
<div class="container">
  <form action="location.php" method="POST">
  <div class="row">
    <div class="insert-col-25">
      <label for="newregion">Region</label>
    </div>
    <div class="insert-col-75">
      <input type="text" name="newregion" placeholder="Region" value="" onfocus="this.value=''">
    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="insert-col-25">
      <label for="newpark">Park</label>
    </div>
    <div class="insert-col-75">
      <input type="text" name="newpark" value="" placeholder="Park" onfocus="this.value=''">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit" name="submit" class="submitbutton" >
  </div>
  </form>
</div>





<!-- END OF BAIT INSERT -->


