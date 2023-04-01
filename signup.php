<?php
    session_start();
    if(!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chater Web - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.ico">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <video src="img/backgroundbody.mov" muted loop autoplay class="blackgroundbodyvideo"></video>
    <div class="w-400 p-5 shadow rounded">
        <form method="post" action="app/http/signup.php" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="img/logo.ico" class="w-25 rounded-circle">
            <h4 class="display-4">
                Sign Up</h4>
            </div>

            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo htmlspecialchars($_GET['error']);?>
            </div>
            <?php }

                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                }else $name = '';
                
                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                }else $username = '';
            ?>

            <div class="mb-3">
                <label class="form-label"> 
                    Name</label>
                <input type="text" 
                        name="name"
                        value="<?=$name?>" 
                        class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label"> 
                    User name</label>
                <input type="text" 
                        name="username"
                        value="<?=$username?>" 
                        class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Password</label>
                <input type="password" 
                        name="password"
                        class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label"> 
                    Profile Picture</label>
                <input type="file"
                        name="profile"
                        class="form-control">
            </div>

            <button type="submit" 
                    class="btn btn-primary">
                    Sign Up</button>
            <a href="index.php">Login</a>
        </form>
    </div>
</body>
</html>
<?php
    }else{
        header("Location: index.php");
        exit;
    }
?>