<?php
    session_start();
    include("connect.php");

    $mobileNumber = $_POST['mobileNumber'];
    $password = $_POST['password'];
    $role = $_POST['select'];

    $check = mysqli_query($connect, "SELECT * FROM user_info WHERE mobile_number = '$mobileNumber' AND password = '$password' AND role = '$role' ");

    
    if(mysqli_num_rows($check)>0) {
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user_info WHERE role = 2");
        $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupdata'] = $groupdata;
        
        echo '
        <script>
            window.location = "../routes/dashboard.php";
        </script>
        ';
    }
    else {
        echo '
        <script>
            alert("Invalid credentials");
            window.location = "../";
        </script>
        ';
    }
