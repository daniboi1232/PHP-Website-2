<!-- 
    Order of operations:
    1. Search Box
    2. filter list
    3. Table of results
    4. Make multi page for more than 20 results
-->


<!-- PHP for Search Box -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = trim($_POST['search']);
    $qry = "SELECT idlocation FROM `location` WHERE park LIKE '$search%'";
    $r1 = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($r1);
    $qry2 = "SELECT
    marker_number,
    trap_loc,
    trap_notes,
    bait.bait,
    `location`.park,
    `location`.region
    FROM
    trap
    INNER JOIN
    bait ON trap.bait_idbait = bait.idbait
    INNER JOIN
    `location` ON trap.location_idlocation = `location`.idlocation
    WHERE idlocation == '$location'";
}


?>


<!-- Search Box -->

<div class="searchbar">
  <div class="search-container">
    <form action="searchtrap.php">
      <!-- <input type="text" placeholder="Search Trap Type" name="search"> -->
      <input type="text" name="search1" placeholder="Search Trap Type" value="<?php if (isset($_POST['search1'])) echo $_POST['search1']; ?>">
      <button type="submit"><i class="fa fa-search"></i>Search</button>
    </form>
  </div>
</div>

<br>

<!-- Filter Bar -->


<!-- Table of Results -->

<table class="table_style">
    <thead>
        <tr>
            <th>Marker Number</th>
            <th>Trap Location</th>
            <th>Trap Notes</th>
            <th>Trap Bait</th>
            <th>Trap Region</th>
            <th>Trap Park</th>
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

$query= 
"SELECT
marker_number,
trap_loc,
trap_notes,
bait.bait,
`location`.park,
`location`.region
FROM
trap 
INNER JOIN
bait ON trap.bait_idbait = bait.idbait
INNER JOIN
`location` ON trap.location_idlocation = `location`.idlocation
ORDER BY `location`.park ASC";


$r=mysqli_query ($conn,$query);


while ($row = mysqli_fetch_assoc($r)){
    
    
    //$idtraptype = $row['trap_type_idtrap_type'];
    //$querie= "SELECT trap_bait FROM trap_type WHERE idtrap_type=$idtraptype";
    //$result=mysqli_query ($conn,$query);
    ///var_dump($r);
    //$rows = mysqli_fetch_assoc($result);
?>
        <tr>
            <td><?php echo $row['marker_number'];?></td>
            <td><?php echo $row['trap_loc'];?></td>
            <td><?php echo $row['trap_notes'];?></td>
            <td><?php echo $row['bait'];?></td>
            <td><?php echo $row['region'];?></td>
            <td><?php echo $row['park'];?></td>
        </tr>
<?php
}

?>
    </tbody>
</table>