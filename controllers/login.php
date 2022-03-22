<?php
session_start();
include 'db_conn.php';


$post_username = $_POST['username'];
$post_password = $_POST['password'];

echo $post_username;
echo "  ";
echo $post_password;

if ( !isset($_POST['username'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
  }

if ($stmt = $db->prepare('SELECT username, password, init_pass, emp_id FROM users WHERE username = ?')) {

    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

   if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $pwd, $init_pwd, $emp_id );
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
                            $_SESSION['user'] = "true";
                            $_SESSION['emp_id'] = $emp_id;
                            $_SESSION['username'] = $post_username;
                            echo $username;
                        header('Location: ../changePass.php');
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
                            echo $username;
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