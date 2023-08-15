<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./stylesheets/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Page</title>
</head>
<body>
<?php

require "connect.inc";
include "nav.php";


?>



<div class="container">
  <form action="tester.php">
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
      <label for="trapregion">Trap Line Region:</label>
    </div>
    <div class="col-75">
      <select  name="trapregion">
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
      <select  name="trappark">
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

<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $markernumber = trim($_POST['markernumber']);
    $traploc = trim($_POST['traploc']);
    $trapregion = trim($_POST['trapregion']);
    $trappark = trim($_POST['trappark']);
    $bait = trim($_POST['bait']);
    $notes = trim($_POST['notes']);
    
    

    //write a block checking if there is a trapline for the area and if not then insert the location
    //$qr1="SELECT markernumber FROM trap";
    $qry1 = "SELECT * FROM trap WHERE markernumber = '$markernumber'"; 
    $result = @mysqli_query($conn,$qry1); 
    if ($result) { if (mysqli_fetch_assoc($result) > 0) {
         echo 'found! '; 
    } 
    else { 
        echo 'not found'; 
    } } 
    else { 
        echo 'Error: ' ; 
    }




    //$qry="SELECT * FROM  WHERE idTeam='$team";
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







<?php
include "footer.php";
?>
</body>
</html>
