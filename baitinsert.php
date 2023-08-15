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
<br>
<div class="container">
  <form action="reciever.php">
  <div class="row">
    <div class="col-25">
      <label for="bait">Bait</label>
    </div>
    <div class="col-75">
      <input type="text" name="bait" placeholder="Bait" value="<?php if (isset($_POST['bait'])) echo $_POST['bait']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="target">Bait Target</label>
    </div>
    <div class="col-75">
      <input type="text" name="target" value="<?php if (isset($_POST['target'])) echo $_POST['target']; ?>" placeholder="Bait Target">
    </div>
  </div>
  
  
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>




<!-- END OF BAIT INSERT -->


