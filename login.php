

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login 

    </title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body id="loginBody">
    <div class="container">
        <div class="loginHeader">
            <h1>Foolball Management</h1>
            <h3> Login</h3>
        </div>
        <div class="loginBody">
            <form action="login.php" data-action="<?php echo 'localhost/18120401_Football/controller/user/handleLogin' ?>" method="POST">
                <div class="loginInputsContainer">
                    <label for="">Username</label>
                    <input placeholder="Username" name="username" type="text">
                </div>
                <div class="loginInputsContainer">
                    <label for="">Password</label>
                    <input placeholder="Password" name="password" type="password">
                </div>
            <div class="LoginButtonContainer">
                <button>LOGIN</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>

