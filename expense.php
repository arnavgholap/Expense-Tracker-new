<?php
include('header.php');
include('functions.php');
checkuser();
$res = mysqli_query($con, "select expense.*,category.name from expense,category  where expense.category=category.name and expense.added_by='" . $_SESSION['UID'] . "'
   order by expense.added_on asc");
if (isset($_GET['type']) and $_GET['type'] == "delete" and $_GET['id'] > 0) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM expense WHERE id=$id");
    echo "<br>Expense Deleted Successfully!<br>";
}
?>

<script>
    document.title = "Expense";
</script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                            <table class="table table-borderless table-striped table-earning">
                                <div class="expense_center">
                                    <h2 class="h2expense">Expense</h2> <br>
                                    <a href="manage_expense.php" id="add_expense">Add Expense</a>
                                </div>
                                <br><br>
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Expense Date</th>
                                        <th></th>
                                    </tr>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['category']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['item']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['price']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['details']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['added_on']; ?>
                                            </td>
                                            <td>
                                                <a href="?type=delete&id=<?php echo $row['id']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo "<br><br>";
include('footer.php');
?>