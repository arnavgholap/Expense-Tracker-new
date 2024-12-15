<?php
include('header.php');
include('functions.php');
checkuser();
$msg = "";
$category = "";
$label = "Add";
if (isset($_GET['id']) and $_GET['id'] > 0) {
    $label = "Edit";
    $id = ($_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM category WHERE id='$id'");
    if (mysqli_num_rows($res) == 0) {
        echo "<script> window.location.href = 'category.php' </script>";
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $type = "add";
    $sub_sql = "";
    if (isset($_GET['id']) and $_GET['id'] > 0) {
        $type = "edit";
        $sub_sql = "and id!=$id";
    }

    $res = mysqli_query($con, "SELECT * FROM category WHERE name='$name' $sub_sql");
    if (mysqli_num_rows($res) > 0) {
        $msg = "Category Already Exists!";
    } else {
        $sql = "insert into category(name) values('$name')";
        if (isset($_GET['id']) and $_GET['id'] > 0) {
            $sql = "UPDATE category SET name='$name' where id='$id'";
        }
        mysqli_query($con, $sql);
        echo "<script> window.location.href = 'category.php' </script>";
    }
}
?>

<script>
    document.title = "Manage Category";
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="expense_center">
                        <h1><?php echo $label; ?> Category</h1><br>
                        <a href="category.php">Back</a>
                    </div><br>
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" class="form-horizontal">
                                <div class="form-group"> <label class="control-label mb-1">Category Name</label>
                                    <input type="text" name="name" id="cname" required value="<?php $category; ?>"
                                        class="form-control" rquired>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit"
                                        class="btn btn-lg btn-info btn-block">
                                </div>
                            </form>
                            <div class="msg">
                                <?php
                                echo "$msg <br> <br>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("footer.php");
?>