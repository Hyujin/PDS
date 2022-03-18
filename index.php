<?php
include_once ('controllers/db_conn.php');
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
    <title>Altria Payslip Portal</title>
    <script type="text/css">
        p{
            font-size: 11px !important;
        }
        label{
            font-size: 11px;
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="altria.png" alt="altria_logo" height="45vw" class="ms-3 me-5">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php">Welcome, Joe Alwyn</a>
                    </li>
                </ul>
                <div class="dropdown me-5">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../res/meow.png" alt="meow" width="35" height="35" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Joe</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                        <li><a class="dropdown-item" href="#">Update Username</a></li>
                        <li><a class="dropdown-item" href="#">Change Password</a></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
  </div>
</nav>

<div class="container-fluid d-flex justify-content-start mt-5 ms-3 me-3 align-middle">
            <div class="float-start ms-5 w-25 p-2">
                <label for="fullname" class="label">Name: </label>
                <p class="text-secondary">My Name Here</p>

                <label for="fullname" class="label">Role: </label>
                <p class="text-secondary">My Role Here</p> 
            </div>

</div>
        <!--  Rate   -->

<div class="container-fluid d-flex justify-content-start mt-1 ms-3 me-3 align-middle">
            <div class="float-start ms-5 w-25 p-2">
                <label for="fullname" class="label">Daily Rate: </label>
                <p class="text-secondary">Php 800. 00</p>

                <label for="fullname" class="label">Hourly Rate: </label>
                <p class="text-secondary">Php 100. 00</p> 
            </div>

            <div class="float-end ms-5 w-25 p-2">
                <label for="fullname" class="label">Allowance Hourly Rate: </label>
                <p class="text-secondary">Php. 50. 00</p>

                <label for="fullname" class="label">Night Differential Rate: </label>
                <p class="text-secondary">Php 8. 00</p> 
            </div>
            
</div> 

        <!--  Manhour   -->

        <div class="container-fluid d-flex justify-content-start mt-1 ms-3 me-3 align-middle">
                <div class="float-start ms-5 w-25 p-2">
                    <label for="fullname" class="label">Total Worked Hours: </label>
                    <p class="text-secondary">80 Hrs</p>

                    <label for="fullname" class="label">Total ND hours: </label>
                    <p class="text-secondary">70 Hrs</p>

                    <label for="fullname" class="label">Reg Hol Hours: </label>
                    <p class="text-secondary">0 Hrs</p> 
                </div>

                <div class="float-start ms-5 w-25 p-2">

                    <label for="fullname" class="label">OT Hours: </label>
                    <p class="text-secondary">0 Hrs</p>

                    <label for="fullname" class="label">SPL Hol Hrs: </label>
                    <p class="text-secondary">0 Hrs</p> 

                    <label for="fullname" class="label">Prem Hours: </label>
                    <p class="text-secondary">0 Hrs</p> 
            
                </div>
        </div> 

                <!--  Manhour   -->

        <div class="container-fluid d-flex justify-content-start mt-1 ms-3 me-3 align-middle">
            <div class="float-start ms-5 w-25 p-2">
                <label for="fullname" class="label">Basic Hours Pay: </label>
                <p class="text-secondary">80 Hrs</p>

                <label for="fullname" class="label">Night Differential Pay: </label>
                <p class="text-secondary">70 Hrs</p>

                <label for="fullname" class="label">Allowance Pay: </label>
                <p class="text-secondary">0 Hrs</p>

                <label for="fullname" class="label">Dispute: </label>
                <p class="text-secondary">0 Hrs</p> 
            </div>

            <div class="float-end ms-5 w-25 p-2">
                <label for="fullname" class="label">Special Holiday Pay: </label>
                <p class="text-secondary">0 Hrs</p>

                <label for="fullname" class="label">Regular Holiday Pay: </label>
                <p class="text-secondary">0 Hrs</p> 

                <label for="fullname" class="label">Premium Pay: </label>
                <p class="text-secondary">0 Hrs</p>

                <label for="fullname" class="label">OT Pay: </label>
                <p class="text-secondary">0 Hrs</p> 
            </div>
        </div> 

                <!--  Deductions   -->

        <div class="container-fluid d-flex justify-content-start mt-1 ms-3 me-3 align-middle">
                <div class="float-start ms-5 w-25 p-2">
                    <label for="fullname" class="label">SSS: </label>
                    <p class="text-secondary">80 Hrs</p>

                    <label for="fullname" class="label">PHIC: </label>
                    <p class="text-secondary">70 Hrs</p>

                    <label for="fullname" class="label">PAG-IBIG: </label>
                    <p class="text-secondary">0 Hrs</p> 
                </div>

                <div class="float-start ms-5 w-25 p-2">

                    <label for="fullname" class="label">Others: </label>
                    <p class="text-secondary">0 Hrs</p>

                    <label for="fullname" class="label">CA: </label>
                    <p class="text-secondary">0 Hrs</p> 

                    <label for="fullname" class="label">Total Deductions: </label>
                    <p class="text-secondary">0 Hrs</p> 
            
                </div>
        </div>
                <!--  Final   -->

        <div class="container-fluid d-flex justify-content-start mt-5 ms-3 me-3 align-middle">
            <div class="float-start ms-5 w-25 p-2">
                <label for="fullname" class="label">Gross Pay: </label>
                <p class="text-secondary">Php. 18 000. 00</p>

                <label for="fullname" class="label">Net Pay: </label>
                <p class="text-secondary">Php 18 000. 00</p> 
            </div>

</div>

        </div> 

        <!--  Print Button   -->

        <!-- <button class="btn btn-small btn-success">PRINT</button> -->

</div>

<div class="footer" id="footer">
    <p class="ms-3 mt-2 text-center">Altria Payslip v0.2</p>
    <p class="ms-3 mt-2 text-center">Altria Call Center OPC
    3rd Floor Consuelo Bldg. JP Laurel Ave
    Agdao District Davao City Philipines, 8000</p>
</div>

</body>
</html>