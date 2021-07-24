<?php  
    session_start();
    if(!(isset($_SESSION['userdata']))) {
       header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];
    $status = NULL;
    if($_SESSION['userdata']['status'] == 0) {
        $status = '<b style="color:red">Not voted</b>';
    }
    else {
        $status = '<b style="color:green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Dashboard</title>
    <style>
        #backbtn {
            float: left;
            border-radius: 5px;
            padding: 8px;
            background-color: #B2FFFF;
            font-size: large;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 25px;
        }
        #logoutbtn {
            border-radius: 5px;
            padding: 8px;
            float: right;
            background-color: #B2FFFF;
            font-size: large;
            cursor: pointer; 
            margin-top: 20px;
            margin-right: 25px;
        }
        #votedbtn {
            background-color: green;
            color: white;
            border-radius: 5px;
            padding: 8px;
            font-size: large;
            cursor: pointer; 
            margin-right: 25px;
        }
        #votebtn {
            border-radius: 5px;
            padding: 8px;
            background-color: #B2FFFF;
            font-size: large;
            cursor: pointer; 
            margin-right: 25px;
        }
        #profile {
            background-color: white;
            border: 2px solid black;
            width: 35%;
            padding: 30px;
            float: left;
        }
        img{
            border-radius: 100%;
            border: 2px solid black;
        }
        #display {
            padding: 15px;
        }
       #group {
            background-color: white;
            border: 2px solid black;
            width: 60%;
            padding: 30px;
            float: right;
       }
    </style>
</head>
<body>
    <center>
        <div id="headerSection">
        <a href="../"><button id = "backbtn">  Back</button></a>
        <a href="logout.php"><button id = "logoutbtn">Logout</button></a>
            <h1>Online Voting System</h1>
            <hr>
        </div>
    </center>
    <div id="display">
        <div id="profile">
            <center>
                <img src="../uploads/<?php echo $userdata['photo']?>" width="125px" height="125px"><br><br><br>
            </center>
            <b>Name: </b><?php echo $userdata['name'] ?> <br><br>
            <b>Mobile number: </b><?php echo $userdata['mobile_number'] ?><br><br>
            <b>Address: </b><?php echo $userdata['address'] ?><br><br>
            <b>Status: </b><?php echo $status ?><br><br>  
        </div>

        <div id="group">
            <?php  
                if($_SESSION['groupdata']) {
                    for($i=0; $i<count($groupdata); $i++) {
                        ?>
                        <div>
                            <img src="../uploads/<?php echo $groupdata[$i]['photo'] ?>" width="100px" height="100px" style="float: right;">
                            <b>Group name: </b> <?php echo $groupdata[$i]['name'] ?> <br><br>
                            <b>Votes: </b> <?php echo $groupdata[$i]['votes'] ?> <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name = "gvotes" value="<?php echo $groupdata[$i]['votes']?>">
                                <input type="hidden" name="gid" value = "<?php echo $groupdata[$i]['id']?>">
                                <?php
                                    if($_SESSION['userdata']['status'] == 0) {
                                ?>
                                        <input type="submit" name="votebtn" value="vote" id="votebtn">
                                    <?php
                                    }
                                    else {
                                    ?>
                                        <input disabled type="submit" name="votedbtn" value="voted" id="votedbtn">                                    
                                        <?php
                                    }
                                ?>
                            </form>
                        <br><hr>
                        </div>
                        <?php
                    }
                }
            ?>      
        </div>
    </div>
</body>
</html>