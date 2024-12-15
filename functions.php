<?php
function checkuser()
{
    if (!isset($_SESSION['UID']) and $_SESSION['UID'] == '') {
        include('logout.php');
    }
}

function getCategory($category_id = '', $page = '')
{
    global $con;
    $fun = "";
    $res = mysqli_query($con, "SELECT * FROM category ORDER BY name");
    $fun = "required";
    if ($page == "report") {
        $fun = "";
    }
    $html = '<select $fun name="category_id" id="category_id" class="form-control">';
    $html .= '<option value="">Select Category</option>';

    while ($row = mysqli_fetch_assoc($res)) {
        if ($category_id > 0 && $category_id == $row['id']) {
            $html .= '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
        } else {
            $html .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}
function getDashboardExpense($type)
{
    global $con;
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('yesterday'));
    $week = date('Y-m-d', strtotime('-1 week'));
    $month = date('Y-m-d', strtotime('-1 month'));
    $year = date('Y-m-d', strtotime('-1 year'));
    $from = '';
    $to = '';
    if ($type == 'today') {
        $sub_sql = "WHERE expense.added_on='$today'";
        $from = $today;
        $to = $today;
    } elseif ($type == 'yesterday') {
        $sub_sql = "WHERE expense.added_on='$yesterday'";
        $from = $yesterday;
        $to = $yesterday;
    } elseif ($type == 'week') {
        $sub_sql = "WHERE expense.added_on BETWEEN '$week' AND '$today'";
        $from = $week;
        $to = $today;
    } elseif ($type == 'month') {
        $sub_sql = "WHERE expense.added_on BETWEEN '$month' AND '$today'";
        $from = $month;
        $to = $today;
    } elseif ($type == 'year') {
        $sub_sql = "WHERE expense.added_on BETWEEN '$year' AND '$today'";
        $from = $year;
        $to = $today;
    } else {
        $sub_sql = "";
        $from = '';
        $to = '';
    }
    $res = mysqli_query($con, "SELECT sum(expense.price) as price FROM expense $sub_sql");
    $row = mysqli_fetch_assoc($res);
    $p = 0;
    $link = "";
    if ($row['price'] > 0) {
        $p = $row['price'];
        $link = '&nbsp;<a href="dashboard_report.php?from=' . $from . '&to=' . $to . '" TARGET="anotherframe" class="detail_link"> Details </a>';
    }
    return $p . $link;
}
?>