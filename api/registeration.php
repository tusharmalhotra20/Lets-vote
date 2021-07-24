<?php
    include("connect.php");

    $name = $_POST['user_name'];
    $mobile = $_POST['user_mobileNumber'];
    $password = $_POST['user_password'];
    $cpassword = $_POST['user_confirmPassword'];
    $address = $_POST['user_address'];
    $image = $_FILES['user_photo']['name'];
    $tmp_name = $_FILES['user_photo']['tmp_name'];
    $role = $_POST['user_role'];

    if($password == $cpassword) {
        move_uploaded_file($tmp_name, "../uploads/$image");

        $insert = mysqli_query($connect, "INSERT INTO user_info 
        (name, mobile_number, password, address, photo, role, status, votes) 
        VALUES ('$name','$mobile','$password','$address','$image','$role','0','0')");

        if($insert) {
            echo '
            <script>
                alert("Registration successful!");
                window.location = "../index.html" ;
            </script>
            ';
        }
        else {
            echo '
            <script>
                alert("Some error occured!");
                window.location = "../routes/registration.html" ;
            </script>
            ';
        }
    }
    else {
        echo '
        <script>
            alert("password and confirm password does not match!");
            window.location = "../routes/registration.html";
        </script>
        ';
    }
