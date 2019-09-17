<?php 




 $message = '';
 $error = '';


   
    
    

    


    if (isset($_POST['submit'])){

        $Fname = $_POST['fname'];
        $Uname = $_POST['uname'];
        $Email = $_POST['email'];
        $Pword = $_POST['pword'];
        $Cpword = $_POST['c_pword'];
        $details = array();

        if (empty($Fname) || empty($Uname)  || empty($Email)  || empty($Pword)  || empty($Cpword)){

            $error = "<h4 class='container alert alert-danger' style='width: 250px; font-size: 15px;'>This field cannot be empty</h4>";

        } else {
            $details = array(
                'Full name' => $Fname,
                'Username' => $Uname,
                'Email' => $Email
            );

            if ($Pword != $Cpword){
                $error = "<h4 class='container alert alert-danger' style='width: 450px; font-size: 15px;'>Passwords do not match, verify again</h4>";
            } else {
                $details['Password'] = "$Pword";
                $details['Password2'] = "$Cpword";

                if (file_exists('data.json')){

                    $get_content = file_get_contents('data.json');
                    $decode_data = json_decode($get_content, true);

                    $decode_data[] = $details;
                    
                    

                } else {
                    $error = "<h4 class='container alert alert-danger' style='width: 250px; font-size: 15px;'>File doesn't exist</h4>";
                }

                $json_obj = json_encode($decode_data);

                if (file_put_contents('data.json', $json_obj)){
                    $message = "<h4 class='container alert alert-danger' style='width: 400px; font-size: 15px;'>Registration Complete!</h4>";
                    session_start();
                    $_SESSION['login_user'] = $Uname;
			        header("Location: success.php");
                }

                
            }

        }
    }




    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Sign up</title>
</head>
<body>

    <div class="container" style="margin-top: 10%;">
 
        <form action="" method = "POST">

            <?php 
                if (isset($error)){
                    echo $error;
                }
            
            
            
            
            
            ?>



            <div class="form-group">
                <label for="uname">Full Name</label>
                <input name="fname"  placeholder="Enter Full Name" type="text" class="form-control" style="width: 250px;" >
            </div> 

            <div class="form-group">
                <label for="uname">Username</label>
                <input name="uname"  placeholder="Enter Username" type="text" class="form-control" style="width: 250px;" >
            </div> 

            <div class="form-group">
                <label for="uname">Email</label>
                <input name="email"  placeholder="Enter Email" type="email" class="form-control" style="width: 250px;">
            </div>            

            <div class="form-group">
                <label for="pword">Password</label>
                <input name="pword" placeholder="Enter Password" type="password" class="form-control" style="width: 250px;">
            </div>

            <div class="form-group">
                <label for="pword">Confirm Password</label>
                <input name="c_pword" placeholder="Confirm Password" type="password" class="form-control" style="width: 250px;">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Sign Up">

            
            <?php 
                if (isset($message)){

                    echo $message;
                }
            
            
            
            
            
            ?>




        </form>


    </div>




    
    
</body>
</html>