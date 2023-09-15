<?php
include('includes/config.php');
if (!empty($_POST["catid"])) {
    $id = intval($_POST['catid']);
    
    
        $sql = "SELECT SubCategoryId, SubcategoryName FROM tblsubcategory WHERE CategoryId=? and IsActive=1"; 
        $stmt1 = $con->prepare($sql); 
        $stmt1->execute([$id]); 
        
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);?>
        <option value="">Select Subcategory</option>
       <?php foreach ($result1 as $res)
        { ?>
            <option value="<?php echo htmlentities($res['SubCategoryId']); ?>"><?php echo htmlentities($res['SubcategoryName']); ?></option>
        <?php }
}
    
?>