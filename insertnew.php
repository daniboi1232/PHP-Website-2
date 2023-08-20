<?php
include "connect.inc";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $markernumber = trim($_POST['markernumber']);
    $traploc = trim($_POST['traploc']);
    $region = trim($_POST['region']);
    $park = trim($_POST['park']);
    $bait = trim($_POST['bait']);
    $notes = trim($_POST['notes']);
    
   

    //write a block checking if there is a trapline for the area and if not then insert the location
    $qry1 = "SELECT * FROM trap WHERE marker_number = '$markernumber'";
    //var_dump($conn);
    //broken here - not getting through the next command
    $result = mysqli_query($conn,$qry1);
    
    if (isset($result)) { if (mysqli_num_rows($result) > 0) {
         echo 'found! ';
         
    } 
    echo 'notfound';
    }
    else { 
        echo 'not found';
        
    }

    
    $qry="SELECT * FROM location WHERE $region == `region` AND $park == `park`";
    $r = @mysqli_fetch_assoc($conn,$qry);
    echo $r;
    

    //inserts into the database
    //$q = "INSERT INTO `trap`(`idtrap`,`marker_number`, `trap_loc`, `trap_notes`,``,``) 
    //VALUES (NULL,'$markernumber','$traploc','$notes','$bait','$',,'$vaccine')";
    //echo $query;
    //$result = @mysqli_query($conn, $q);
    //var_dump($result);
    //if ($result) { //if it ran ok
        //echo "Thank you for inserting your pet's information";


    //} else {
        //public message
        //echo "Request Unsuccessful";
}




?>


<div class="container">
  <form action="insertnewtrap.php" method="POST">
  <div class="row">
    <div class="col-25">
      <label for="markernumber">Marker Number:</label>
    </div>
    <div class="col-75">
      <input type="text" name="markernumber" placeholder="Marker Number.." value="<?php if (isset($_POST['markernumber'])) echo $_POST['markernumber']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="traploc">8 Figure Grid Reference</label>
    </div>
    <div class="col-75">
      <input type="text" name="traploc" value="<?php if (isset($_POST['traploc'])) echo $_POST['traploc']; ?>" placeholder="8 Figure Grid Reference...">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="region">Trap Line Region:</label>
    </div>
    <div class="col-75">
      <select  name="region">
        <option value="" disabled selected>Select A Region</option>
<?php  
    $query= "SELECT * FROM `location`";
    $r=mysqli_query ($conn,$query);
    
    ///echo $query;
    ///echo mysqli_error($dbc);
    ///$row = mysqli_fetch_assoc($r);
    ///echo $row['bait'];
    ///var_dump($r);

    while ($row = mysqli_fetch_assoc($r)){
    ?>
        <option value="<?php echo $row['idregions'];?>"><?php echo $row['region'];?></option>
    <?php
    }
?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="trapregion">Trap Line Park:</label>
    </div>
    <div class="col-75">
      <select  name="park">
        <option value="" disabled selected>Select A Park</option>
<?php  
    $query= "SELECT * FROM `location`";
    $r=mysqli_query ($conn,$query);
    
    ///echo $query;
    ///echo mysqli_error($dbc);
    ///$row = mysqli_fetch_assoc($r);
    ///echo $row['bait'];
    ///var_dump($r);

    while ($row = mysqli_fetch_assoc($r)){
    ?>
        <option value="<?php echo $row['idlocation'];?>"><?php echo $row['park'];?></option>
    <?php
    }
?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="bait">Trap Bait Used:</label>
    </div>
    <div class="col-75">
      <select  name="bait">
        <option value="" disabled selected>Select A Bait</option>
<?php  
    $query= "SELECT * FROM bait";
    $r=mysqli_query ($conn,$query);
    
    ///echo $query;
    ///echo mysqli_error($dbc);
    ///$row = mysqli_fetch_assoc($r);
    ///echo $row['bait'];
    ///var_dump($r);

    while ($row = mysqli_fetch_assoc($r)){
    ?>
        <option value="<?php echo $row['idbait'];?>"><?php echo $row['bait'];?></option>
    <?php
    }
?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="notes">Trap Notes:</label>
    </div>
    <div class="col-75">
      <textarea name="notes" placeholder="E.g. Beside a young Lancewood..." style="height:200px" value="<?php if (isset($_POST['notes'])) echo $_POST['notes']; ?>" ></textarea>
    </div>
  </div>
  <br>
  
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>










