<?php

    require_once "class/user.class.php";

    $user = new User();

    if(isset($_POST['btnlogin'])){

        $error = [];

        if(isset($_POST['email']) && !empty($_POST['email'])){
            $user->set('email',$_POST['email']);

        } else{
            $error['email'] = '<p style="color:red">Email is required!</p>';
        }

        if(isset($_POST['password']) && !empty($_POST['password'])){
            $user->set('password',$_POST['password']);

        } else{
            $error['password'] = '<p style="color:red">Email is required!</p>';
        }

        if(count($error) == 0){
            $status = $user->adminLogin();
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Hamro News</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cpanel login in</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <?php if(isset($error['email'])){ echo $error['email']; } ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="password" class="form-control" placeholder="Password">
                                    <?php if(isset($error['password'])){ echo $error['password']; } ?>
                                </div>
                                <input type="submit" name="btnlogin" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                        <?php if(isset( $status)){ echo $status ; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/sb-admin.js"></script>
</body>
</html>
