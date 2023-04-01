<?php
session_start();

if (isset($_POST['username']) &&
    isset($_POST['password'])){

    include '../db.conn.php';

    $password = $_POST['password'];
    $username = $_POST['username'];

    if(empty($username)){
		$em = "Username is required";

        header("Location: ../../index.php?error=$em");
    }else if(empty($password)){
		$em = "Password is required";
		
        header("Location: ../../index.php?error=$em");
	}else {
		$sql  = "SELECT * FROM users WHERE username=?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$username]);

		if($stmt->rowCount() === 1){
			$user = $stmt->fetch();

			if($user['username'] === $username) {
				if(password_verify($password, $user['password'])) {
					$_SESSION['username'] = $user['username'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['user_id'] = $user['user_id'];

					header("Location: ../../home.php");
				}else {
					$em = "incorect Username or password";

					header("Location: ../../index.php?error=$em");
				}
			}else {
				$em = "incorect Username or password";

				header("Location: ../../index.php?error=$em");
			}
		}
    }
}else {
	header("Location: ../../index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chater - Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/logo.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<video src="img/backgroundbody.mov" muted loop autoplay class="blackgroundbodyvideo"></video>
<div class="p-2 w-400 rounded shadow">
	<div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
		<div class="alert alert-warning" role="alert">
		<i class="fa fa-user-times d-block fs-big"></i>
			<h4 class="display-4">Error</h4>
		<p class="fs-xs m-2">This user is not found.</p>
		</div>
		<a href="../../logout.php" class="btn btn-dark">back</a>
	</div>
</div>
</body>
</html>