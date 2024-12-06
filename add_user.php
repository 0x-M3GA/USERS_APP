<?php
include_once('db.php');
$title = "Add";
$name = "";
$email = "";
$mobile = "";
$password = "";
$btn_title = "Save";
$action = 'add';

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $action = 'edit';
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $user = mysqli_query($con, $sql);
    if ($user) {
        $current_user = $user->fetch_assoc();
        $name = $current_user['name'];
        $email = $current_user['email'];
        $mobile = $current_user['mobile'];
        $password = $current_user['password'];
        $btn_title = "Update";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Users App</title>
</head>

<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo ($action == 'edit') ? 'Update' : 'Add'; ?> User</h2>
                <div> <a href="index.php"> <i data-feather="corner-down-left"></i> </a></div>
            </div>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="name"
                        value="<?php echo $name; ?>" autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="enter your email" name="email"
                        value="<?php echo $email; ?>" autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="tel" class="form-control" placeholder="enter your phone number" name="mobile"
                        value="<?php echo $mobile; ?>" autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="password" name="password"
                        value="<?php echo $password; ?>" autocomplete="false">
                </div>
                <input type="submit" class="btn btn-primary" value="<?php echo $btn_title; ?>" name="save">
            </form>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>