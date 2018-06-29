<?php
    require_once '/core/init.php';

    if (Input::exists()) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 54,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));

        if ($validation->passed()) {
            //register user
            $user = new User();
            $salt = Hash::salt(32);
            try{
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'name' => Input::get('name'),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'gp' => 1
                ));

                Session::flash('home', 'You have successful registered.');
                Redirect::to(404);
                // Redirect::to('login.php');
            } catch(Exception $e){
                die($e->getMessage());
            }

        } else {
            // output errors
            print_r($validation->errors());

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
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php Input::get('name'); ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="username" class="form-control" placeholder="Email" value="<?php Input::get('username'); ?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete ="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_again" class="form-control" placeholder="Password Again" autocomplete ="off">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>All Rights Reserved For Labe Ug &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>

