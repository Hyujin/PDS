<?php
session_start();
if(!isset($_SESSION['emp_id'])){
    header('location: auth/login.php');

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>Altria Payslip Portal</title>
    <style type="text/css">
        body{
            background-color: red:
        }
        p{
            font-size: 11pt !important;
        }
        label{
            font-size: 11pt;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-print-none">
  <div class="container-fluid">
  <img src="altria.png" alt="altria_logo" height="45vw" class="ms-3 me-5">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php">Welcome, <?php echo $_SESSION['fullname'] ?></a>
                    </li>
                </ul>
                <div class="dropdown me-5">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="res/meow.png" alt="meow" width="35" height="35" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username'];?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                    <li><a class="dropdown-item" href="#">Update Username</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li><a class="dropdown-item" href="controllers/logout.php">Sign out</a></li>
                </ul>
            </div>
            </div>
  </div>
</nav>

<!-- Payslip Grid system -->

<div class="container">

        <div class="row mt-3">
            <div class="col-10">
                <h6>Altria Payslip Portal</h6>
            </div>
            <div class="col-2 d-print-none">
                <a href="index.php" class="btn-btn-sm"><i class="fa-solid fa-arrow-rotate-right">refresh</i></a>
            </div>
        </div>
        <div class="row">
            <p class="text-secondary">
                Payroll Date: <?php echo $_SESSION['payroll_batch'] ?>
                
            </p>
        </div>

        <div class="row border-bottom">
            <label for="Employee" class="mb-1">Employee</label>
            <div class="col-3">
                <label for="fullname" class="label ms-3">Name: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['fullname'] ?></p>
            </div>
            <div class="col-3">
                <label for="fullname" class="label ms-3">Role: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['role'] ?></p> 
            </div>
            <div class="col-6"></div>
        </div>

        <div class="row mt-1 border-bottom">
        <label for="Rate" class="mb-1">Rate</label>
            <div class="col">
                <label for="fullname" class="label ms-3">Daily Rate: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['daily_rate']  ?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Hourly Rate: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['hrly_rate'] ?></p> 
            </div>

            <div class="col">
                <label for="fullname" class="label ms-3">Allowance Hourly Rate: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['allow_hr_rate']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Night Differential Rate: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['nd_rate']?></p> 
            </div>
        </div>

        <div class="row mt-1">
        <label for="Worked hours" class="mb-1">Worked Hours</label>
            <div class="col">
                <label for="fullname" class="label ms-3">Total Worked Hours: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['total_worked_hrs']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Total ND hours: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['total_nd_hrs']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Reg Hol Hours: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['reg_hol_hrs']?></p> 
            </div>
            <div class="col"></div>

        </div>
        <div class="row mt-1 border-bottom">
            <div class="col">
                <label for="fullname" class="label ms-3">OT Hours: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['ot_hrs']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">SPL Hol Hrs: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['spl_hol_hrs']?></p> 
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Prem Hours: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['prem_hrs'] ?></p> 
            </div>
            <div class="col"></div>
        </div>

        <div class="row mt-1">
        <label for="Pay" class="mb-1">Pay</label>
            <div class="col">
                <label for="fullname" class="label ms-3">Basic Hours Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['basic_hrs_pay'] ?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Night Differential Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['nds_pay']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Allowance Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['allow_pay']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Dispute: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['dispute']?></p>
            </div>
        </div>

        <div class="row mt-1 border-bottom">
            <div class="col">
                <label for="fullname" class="label ms-3">Special Holiday Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['spl_pay']?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Regular Holiday Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['reg_hol_pay']?></p> 
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Premium Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['prem_hol_pay'] ?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">OT Pay: </label>
                <p class="text-secondary ms-3"><?php echo  $_SESSION['ot_pay']  ?></p> 
            </div>
        </div>

        <div class="row mt-1">
        <label for="Deductions" class="mb-1">Deductions</label>
            <div class="col">
                <label for="fullname" class="label ms-3">SSS: </label>
                    <p class="text-secondary ms-3">80 Hrs</p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">PHIC: </label>
                    <p class="text-secondary ms-3">70 Hrs</p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">PAG-IBIG: </label>
                    <p class="text-secondary ms-3">0 Hrs</p>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-1 border-bottom">
            <div class="col">
                <label for="fullname" class="label ms-3">Others: </label>
                    <p class="text-secondary ms-3">0 Hrs</p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">CA: </label>
                    <p class="text-secondary ms-3">0 Hrs</p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Total Deductions: </label>
                    <p class="text-secondary ms-3">0 Hrs</p>
            </div>
            <div class="col"></div>
        </div>

        <div class="row mt-1 border-bottom">
        <label for="Final" class="mb-1">Total Pay</label>
            <div class="col">
                <label for="fullname" class="label ms-3">Gross Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['gross_pay'] ?></p>
            </div>
            <div class="col">
                <label for="fullname" class="label ms-3">Net Pay: </label>
                <p class="text-secondary ms-3"><?php echo $_SESSION['net_pay']?></p> 
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>

        <div class="row mt-2" id="print-btn">
            <div class="col-10"></div>
            <div class="col-2">
                <button class="btn btn-sm btn-primary d-print-none" onclick="window.print();return false;">PRINT</button>
            </div>
        </div>

</div>




<!-- End Payslip Grid system -->

<div class="footer pt-1 mt-4" id="footer">
    <p class="ms-3 mt-2 text-center">Altria Payslip v0.2</p>
    <p class="ms-3 mt-2 text-center">Altria Call Center OPC
    3rd Floor Consuelo Bldg. JP Laurel Ave
    Agdao District Davao City Philipines, 8000</p>
</div>

</body>
</html>