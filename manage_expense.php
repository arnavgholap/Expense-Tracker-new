<?php
include('header.php');
include('functions.php');
checkuser();
$msg = "";
$category_id = "";
$arr = array();
$res = mysqli_query($con, "SELECT * FROM category ORDER BY name");
while ($row = mysqli_fetch_assoc($res)) {
    $arr[$row['id']] = $row['name'];
}

if (isset($_POST['submit'])) {
    $category_id = ($_POST['category_id']);
    $item = ($_POST['item']);
    $price = ($_POST['price']);
    $details = ($_POST['details']);
    $added_on= ($_POST['expense_date']);
    $added_by = $_SESSION['UID'];

    $type = "add";

    $sql = "INSERT INTO expense(category,item,price,details,added_on,added_by) values('$arr[$category_id]','$item','$price','$details','$added_on','$added_by')";
    mysqli_query($con, $sql);
    echo "<script>window.location.href ='expense.php'</script>";
}
?>


<br>
<?php
$res = mysqli_query($con, "SELECT DISTINCT * FROM category");
$arr = array();
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-borderless table-striped table-earning">
                        <div class="expense_center">
                            <h2 class="h2expense">Add Expense</h2> <br>
                            <a href="expense.php">Back</a> <br>
                        </div>
                        <br><br>
                        <form method="post">
                            <div class="form-group"> <label class="control-label mb-1">Category</label>
                                <?php echo getCategory($category_id) ?>
                            </div>
                            <div class="form-group"> <label class="control-label mb-1">Item</label>
                                <input type="text" name="item" class="form-control">
                            </div>
                            <div class="form-group"> <label class="control-label mb-1">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group"> <label class="control-label mb-1">Details</label>
                                <input type="text" name="details" class="form-control">
                            </div>
                            <div class="form-group"> <label class="control-label mb-1">Expense Date</label>
                                <input type="date" name="expense_date" class="form-control"
                                    max="<?php echo date('Y-m-d') ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info btn-block">
                            </div>
                            <?php
                            echo "$msg <br> <br>";
                            ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>