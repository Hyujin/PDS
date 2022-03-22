<?php
session_start();
if(!isset($_SESSION['changepass'])){
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Altria Payslip</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center p-5">
        <div class="card card-container" style="width: 18rem;">
        <div class="card-body">
        <form action="../controllers/update.php" method="POST">
            <p>Hi <?php echo $_SESSION['username'] ?> !</p>
            <p>Please update your password to secure your account</p>
            <label for="">New Password</label>
            <input type="password" name="pass1" class="form-control" id="pass1">
            <br>
            <label for="">Re-Enter Password</label>
            <input type="password" name="pass2" class="form-control" id="pass2">

            <button class="btn btn-sm btn-primary mt-3 form-control">Update and go to my Payslip</button>
        </form>
        </div>
        </div>
    </div>
    
</div>
</body>
</html>