<?php
session_start();
include 'db_conn.php';





////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getReg(){

// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "pds_db";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emp_id = $_SESSION['emp_id'];

$sql_user = ("SELECT users.id, employees.fullname, users.username, employees.role, users.emp_id, employees.id 
                FROM users
                INNER JOIN employees ON employees.id = users.emp_id
                WHERE users.emp_id = $emp_id LIMIT 1");
                $result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
  // output data of each row
  while($row = $result_user->fetch_assoc()) {
        $_SESSION['id']       = $row["emp_id"];
        $_SESSION['fullname'] = $row["fullname"];
        $_SESSION['username'] = $row["username"];
        $_SESSION['role']     = $row["role"];
  }
}

$sql_batch = ("SELECT MAX(batch_date) as batch_date FROM payroll_batch WHERE status = 1");
                $result_batch = $conn->query($sql_batch);

if ($result_batch->num_rows > 0) {
  // output data of each row
  while($row = $result_batch->fetch_assoc()) {
        $_SESSION['payroll_batch']           = $row["batch_date"];
  }
}

$sql_rate = ("SELECT * FROM reg_rate WHERE emp_id = $emp_id LIMIT 1");
                $result_rate = $conn->query($sql_rate);

if ($result_rate->num_rows > 0) {
  // output data of each row
  while($row = $result_rate->fetch_assoc()) {
        $_SESSION['daily_rate']           = $row["daily_rate"];
        $_SESSION['hrly_rate']            = $row["hrly_rate"];
        $_SESSION['allow_hr_rate']        = $row["allow_hr_rate"];
        $_SESSION['nd_rate']              = $row["nd_rate"];
  }
}

$sql_worked = ("SELECT * FROM reg_manhour WHERE emp_id = $emp_id LIMIT 1");
                $result_worked = $conn->query($sql_worked);
if ($result_worked->num_rows > 0) {
  // output data of each row
  while($row = $result_worked->fetch_assoc()) {
        $_SESSION['total_worked_hrs']       = $row["total_worked_hrs"];
        $_SESSION['total_nd_hrs']           = $row["total_nd_hrs"];
        $_SESSION['reg_hol_hrs']            = $row["reg_hol_hrs"];
        $_SESSION['ot_hrs']                 = $row["ot_hrs"];
        $_SESSION['spl_hol_hrs']            = $row["spl_hol_hrs"];
        $_SESSION['prem_hrs']               = $row["prem_hrs"];
  }
}


$sql_pay = ("SELECT * FROM reg_pay WHERE emp_id = $emp_id LIMIT 1");
                $result_pay = $conn->query($sql_pay);
if ($result_pay->num_rows > 0) {
  // output data of each row
  while($row = $result_pay->fetch_assoc()) {
        $_SESSION['basic_hrs_pay']          = $row["basic_hrs_pay"];
        $_SESSION['nds_pay']                = $row["nds_pay"];
        $_SESSION['allow_pay']              = $row["allow_pay"];
        $_SESSION['dispute']                = $row["dispute"];
        $_SESSION['spl_pay']                = $row["spl_pay"];
        $_SESSION['reg_hol_pay']            = $row["reg_hol_pay"];
        $_SESSION['prem_hol_pay']           = $row["prem_hol_pay"];
        $_SESSION['ot_pay']                 = $row["ot_pay"];
        $_SESSION['gross_pay']              = $row["gross_pay"];
        $_SESSION['net_pay']                = $row["net_pay"];
  }
}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 


$post_username = $_POST['username'];
$post_password = $_POST['password'];

echo $post_username;
echo "  ";
echo $post_password;

if ( !isset($_POST['username'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
  }

if ($stmt = $db->prepare('SELECT users.username, users.password, users.init_pass, users.emp_id, employees.emp_type
                          FROM users
                          INNER JOIN employees ON users.emp_id = employees.id
                          WHERE username = ?')) {

    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

   if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $pwd, $init_pwd, $emp_id, $emp_type);
        $stmt->fetch();

  
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($post_password == "Altria123") {
            
            echo "<br>";
            echo "change pass pls";
            if($post_username == $username){
                // Verification success! User has logged-in! 
                            //determine if user or admin
                            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['firstchangepass'] = TRUE;
                            $_SESSION['user'] = "true";
                            $_SESSION['emp_id'] = $emp_id;
                            $_SESSION['username'] = $post_username;
                            if($emp_type = "Regular"){
                              getReg();
                            }
                            else{
                              getSale();
                            }
                            
                       header('Location: ../auth/changePass.php');
                            $stmt->close();
                            }    
                        }
        
        else{
            if($post_username == $username){
                echo "<br>";
                echo "Pass is different so pls check the new pass";
                // Verification success! User has logged-in! 
                            //determine if user or admin
                            if($post_password == $pwd){
                            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['user'] = "true";
                            $_SESSION['emp_id'] = $emp_id;
                            $_SESSION['username'] = $post_username;
                            if($emp_type = "Regular"){
                              getReg();
                            }
                            else{
                              getSale();
                            }
                            header('Location: ../index.php');
                            $stmt->close();
                            }
                            else{
                                //password is incorrect. prompt user here

                                $_SESSION['errorMessage'] = "Incorrect username and password";
                                header('location: ../auth/login.php?err=Incorrect username and/or password!');
                            } 
                        }
                }
                }
                else {
                    // Incorrect password
                    echo 'Incorrect admin username and/or password!';
                    $_SESSION['errorMessage'] = "Incorrect username and password";
                    header('location: ../index.php?err=Incorrect username and/or password!');
                    $stmt->close();
                }
        }
        

else{
             echo 'No user found <br>';
            $_SESSION['errorMessage'] = "No user found. Please check your username and password";
          header('location: ../index.php?err=No result found!. Check your username and/or password!');
            $stmt->close();
}
?>