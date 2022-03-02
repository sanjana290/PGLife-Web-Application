//[Code for login_submit.php]
<?php
    session_start();

    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="pglife";
    
    $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$conn){
        echo "connection failed: ".mysqli_connect_error();
        exit;
        } 


    $email = $_POST['email'];
    $password = $_POST['password'];

    //checking the data
    $sql= "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
       
    if ($row) {

        echo "Hello " . $row['full_name'] . "<br/>";

    $_SESSION['user_id']= $row['id'];
    $_SESSION['name'] = $row['full_name'];


    //setcookie("user_id", $row['id'], time()+3600);
    //setcookie("name", $row['full_name'], time()+3600);
    
        ?>
        <a href="dashboard.php"> CLick Here </a>;
        <?
    } else {
        echo "Login Failed<br/>";
    }

    mysqli_close($conn);
?>