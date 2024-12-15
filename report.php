<?php
include('header.php');
include('functions.php');
checkuser();
$final = 0;
$cat_id = '';
$sub_sql = '';
$from = '';
$to = '';
if (isset($_GET['category_id']) and $_GET['category_id'] > 0) {
    $cat_id = $_GET['category_id'];
    $sub_sql = " AND category.id=$cat_id";
    if (isset($_GET['from'])) {
        $from = $_GET['from'];
    }
    if (isset($_GET['to'])) {
        $to = $_GET['to'];
    }
    if ($from != '' and $to != '') {
        $sub_sql .= " AND expense.added_on BETWEEN '$from' AND '$to'";
    }
}
$res = mysqli_query($con, "SELECT category.name, sum(expense.price) as price FROM category JOIN expense ON expense.category = category.name$sub_sql GROUP BY expense.category");
?>

<script>
    document.title = "Report";
</script>

<div class="main-content">
    <h1 align="center">Report</h1><br><br>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter_form">
                        <form method="get">
                            <label for="from">From</label>
                            <input type="date" name="from" id="from" class="form-control w100"
                                max="<?php echo date('Y-m-d') ?>" onchange="set_to_date()">&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <label for="to">To</label>
                            <input type="date" name="to" id="to" class="form-control w100">&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <?php echo getCategory($cat_id, 'report'); ?><br>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $final += $row['price'];
                                            echo $row['price'] ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b><?php echo "$final"; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>