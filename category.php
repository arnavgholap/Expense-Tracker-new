<?php
include('header.php');
include('functions.php');
checkuser();
if (isset($_GET['type']) and $_GET['type'] == "delete" and $_GET['id'] > 0) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM category WHERE id = $id");
    echo "<br>Data Deleted Successfully!<br>";
}
$res = mysqli_query($con, "SELECT DISTINCT * FROM category");
?>

<script>
    document.title = "Category";
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="expense_center">
                        <h2 class="h2expense">Category</h2> <br>
                        <a href="manage_category.php" id="add_expense">Add Category</a>
                    </div>
                    <br><br>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <a href="manage_category.php?&id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                                        <a href="?type=delete&id=<?php echo $row['id']; ?>">Delete</a>&nbsp;
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    echo "<br><br>";
    include('footer.php');
    ?>