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
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Classroom</title>
</head>
<body>
<div>

    <a href="profile.php"><button>Profile</button></a>
    <a href="logout.php"><button>Log out</button></a>
    <h1>Home</h1>                       
    <li><a href="listUser.php">User list</a></li>
    <li><a href="classroom.php">Assignment</a></li>
    <li "><a href="challenger.php">Challenge</a></li>

</div>
</body>
</html>