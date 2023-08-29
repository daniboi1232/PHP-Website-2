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

if (isset($_POST['submit'])) {

  //echo 'hello world';
  if (empty($_POST['newbait'] || $_POST['newtarget'])){
    echo 'Required fields are empty';
  } 
  else {
    $newbait = trim($_POST['newbait']);
    $newtarget = trim($_POST['newtarget']);
    //var_dump($newbait);
    //echo $newtarget;
    //block checking if the trap they are entering is already in the database
    $qry = "SELECT * FROM bait WHERE bait LIKE '$newbait'";
    $result = mysqli_query($conn,$qry);
    if (isset($result)) { if (mysqli_num_rows($result) > 0) {
          echo 'This Bait is Already entered';
          
    }
    else{
      $qry = "INSERT INTO `bait`(`bait`, `target`) VALUES ('$newbait','$newtarget')";
      $r = mysqli_query($conn,$qry);
      mysqli_close($conn);
      echo '<b>your bait is inserted :)<b>';
      
      //tried to redirect so that the bait page will not enter any more
      header("Location: index.php");
      exit;
    }


  }
}}
?>
<!-- End of PHP and Start of HTML Form-->
<br>
<div class="container">
  <form action="bait.php" method="POST">
  <div class="row">
    <div class="insert-col-25">
      <label for="newbait">Bait</label>
    </div>
    <div class="insert-col-75">
      <input type="text" name="newbait" placeholder="Bait" value="" onfocus="this.value=''">
    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="insert-col-25">
      <label for="newtarget">Bait Target</label>
    </div>
    <div class="insert-col-75">
      <input type="text" name="newtarget" value="" placeholder="Bait Target" onfocus="this.value=''">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit" name="submit">
  </div>
  </form>
</div>





<!-- END OF BAIT INSERT -->
