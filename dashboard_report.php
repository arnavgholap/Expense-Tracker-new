<?php
include('header.php');
include('functions.php');
checkuser();
$sub_sql = '';
if (isset($_GET['from'])) {
    $from = $_GET['from'];
}
if (isset($_GET['to'])) {
    $to = $_GET['to'];
}
if ($from != '' and $to != '') {
    $sub_sql .= " AND expense.added_on BETWEEN '$from' AND '$to'";
}

$res = mysqli_query($con, "SELECT expense.price, category.name, expense.item, expense.added_on FROM expense, category WHERE expense.category = category.name $sub_sql");
?>

<script>
    document.title = "Dashboard Report";
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="replace"><br>
                        <?php if ($from != '') {
                            ?>
                            <?php echo str_replace("-", "/", $from) ?>&nbsp;
                            -
                            <?php echo str_replace("-", "/", $to) ?>&nbsp;
                        <?php } ?>
                    </h2>

                    </form>
                    <?php if (mysqli_num_rows($res) > 0) {
                        ?>
                        <br>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Item</th>
                                        <th>Expense Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <?php
                                $final_price = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $final_price += $row['price'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['item'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['added_on'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['price'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <thead>
                                    <tr>
                                        <th colspan="3" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TOTAL</th>
                                        <th colspan="1">
                                            <?php echo "$final_price"; ?>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } else {
                        echo "No Data Found <br> <br>";
                    }
                    ?>

<?php include "footer.php"; ?>