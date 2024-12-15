<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>

<body>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/animsition/animsition.min.js"></script>


    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- end document-->
    <script>
        const change_cat = () => {
            let category = document.getElementById('category_id').value
            console.log(category)
            window.location.href = "?category_id=" + category
        }

        const set_to_date = () => {
            let from_date = document.getElementById('from').value
            document.getElementById('to').setAttribute('min', from_date)
        }
    </script>
</body>

</html>