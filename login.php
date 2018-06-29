<?php
require_once 'core/init.php';

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true
        ),
        'password' => array(
            'required' => true
        )
    ));

    if ($validation->passed()) {
        $user = new User();
        $login = $user->login(Input::get('username'), Input::get('password'));
        if ($login) {
            Redirect::to('form.php');
        }else {
            echo 'Sorry, login failure';
        }
    }else {
        foreach ($validation->errors() as $error) {
            echo $error, '<br>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LABE UGANDA | REPORT PORTAL</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img alt="image" class="logo-name" src="img/logo.png" />
                <!-- <h1 class="logo-name">IN+</h1> -->

            </div>
            <h3>Welcome to the HLC System</h3>
            <p>
                Perfectly designed and precisely prepared admin portal for HLC Status Assessment and Web Reporting.
            </p>
            <p>Login in: For administrative activities.</p>
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="email" name= "username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name= "password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <p class="text-muted text-center"><small>Forgot password?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.php">Reset Password</a>
            </form>
            <p class="m-t"> <small>All Rights Reserved For Labe Ug &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

