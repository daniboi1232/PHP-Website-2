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
