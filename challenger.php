<?php 
    include_once(__DIR__.'\db\sqlFunction.php');
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }

    $username_session = $_SESSION['username'];
    $sql = 'SELECT * FROM users where username = "'.$username_session.'";';
    $userList_session = executeSelect($sql);
    $user_session = $userList_session[0];
    $role_session = $user_session['role_id'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Classroom</title>
</head>
<body>
    <a href="admin.php"><button class="btn btn-success">Home</button></a>
    <?php 
    if($role_session == 2) {
        echo '<td><a href="addChallenger.php"><button class="btn btn-success">Add challenger</button></a></td>';  
    }
    ?>
    <a href="profile.php"><button class="btn btn-success">Profile</button></a>
    <a href="logout.php"><button class="btn btn-warning">Log out</button></a>
    <h1>Challenger</h1>
    <?php  
    if($role_session == 2){
        $sql = "SELECT * FROM challenger";
            $chalList = executeSelect($sql);
            foreach($chalList as $chal){
                $down = "uploads/challenger/".$chal['path'];
                echo '<div class="mb-3" style="border-radius: 5px;">
                <h5 class="">'.$chal['title'].'
                </h5>
                <label for="des" class="form-label">HINT: </label>
                <br/>
                <textarea rows="5" cols="75" id="des" disabled>'.$chal['hint'].'</textarea>
                <br/>
                <hr/>
                </div>';
        }
    }
    else if($role_session == 1){
        $sql = "SELECT * FROM challenger";
            $chalList = executeSelect($sql);
            foreach($chalList as $chal){
                echo '<div class="mb-3" style="border-radius: 5px;">
                <h5 class="">'.$chal['title'].'
                </h5>
                <label for="des" class="form-label">HINT: </label>
                <br/>
                <textarea rows="5" cols="75" id="des" disabled>'.$chal['hint'].'</textarea>
                <br/>
                <a href="answer.php?id='.$chal['challenger_id'].'"><button class="btn btn-success">Answer</button></a>
                <hr/>
                </div>';
        }
    }
    ?>
</body>
</html>