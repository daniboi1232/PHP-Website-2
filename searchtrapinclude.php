<!-- 
    Order of operations:
    1. Search Box
    2. filter list
    3. Table of results
    4. Make multi page for more than 20 results
-->


<!-- Search Box -->

<div class="searchbar">
  <div class="search-container">
    <form action="searchtrap.php">
      <input type="text" placeholder="Search Trap Type" name="search">
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
`location` ON trap.location_idlocation = `location`.idlocation";


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