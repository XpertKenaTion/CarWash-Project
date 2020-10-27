<?php
$spot_dest = "SELECT * FROM donor";
$spot_dest_res = $link->query($spot_dest);

if($spot_dest_res->num_rows > 0){
while ($spot_dest_row = $spot_dest_res->fetch_assoc()){
?>

<option option = "<?php print $spot_dest_row["destinationaddress"]; ?>" ><?php print $spot_dest_row["destinationaddress"]; ?></option>

<?php
}
}else{
    print $link->error;
}
?>