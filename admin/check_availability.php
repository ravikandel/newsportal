<?php 
require_once("includes/config.php");
// code   username availablity
if(!empty($_POST["username"])) {
	$uname= $_POST["username"];
	
    $sql = "select AdminuserName from tbladmin where AdminuserName=?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$uname]);
            
	$rowCount = $stmt->rowCount();
	
    if($rowCount>0)
    {
        echo "<span style='color:red'> Username already exists. Try with another username</span>";
         echo "<script>$('#submit').prop('disabled',true);</script>";
    } 
    else{
        echo "<span style='color:green'> Username available for Registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
