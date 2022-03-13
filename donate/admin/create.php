<?php

require_once ('../db/db.php');

if (isset($_POST['btn_submit'])){
    
    $user_key = mysqli_real_escape_string($mainDbString,$_POST['key']);
    $user_username = mysqli_real_escape_string($mainDbString,$_POST['username']);
    $user_password = mysqli_real_escape_string($mainDbString,$_POST['password']);


    if($user_key === 'Skw@ben@'){
        // Hash password then and store in DB
        $harsed_password = password_hash($user_password,PASSWORD_DEFAULT);

        $insert_user = mysqli_query($mainDbString,"INSERT INTO `users_tbl` (`user_id`, `user_username`, `user_password`, `user_timestamp`) VALUES (NULL, '$user_username', '$harsed_password', current_timestamp())")or die(mysqli_error($mainDbString));

        if($insert_user){
            echo '<script>alert("User created successfully")</script>';
        }else{
            echo '<script>alert("Error creating user")</script>';
        }
    }else{
        echo '<script>alert("Invalid Key Entered")</script>';
    }

}


?>


<html>

<head>
<title>Create User</title>
</head>


<body>
<h2>Create a new user</h2>
<form method="post"> 
<input type="text" name="username" placeholder="Username"/>
<input type="password" name="password" placeholder="Password"/>
<input type="text" name="key" placeholder="Key"/>
<button type="submit" name="btn_submit">Submit</button>
</form>

</body>

</html>