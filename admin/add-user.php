<?php
if(isset($_POST['save'])){
    include 'config.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "select * from user where username='{$username}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result)>0){
        echo 'Username Already Exists';
    }else{
        $sql1 = "insert into user(first_name,last_name,username, password, role) values ('{$fname}','{$lname}','{$username}', '{$password}', '{$role}')";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

        if($result1){
            header("Location: {$hostname}/admin/users.php");
        }
    }
}
?>

<div>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    
    <label>First Name</label>
    <input type="text" name="fname" placeholder="First Name"/><br><br>

    <label>Last Name</label>
    <input type="text" name="lname" placeholder="Last Name"/><br><br>

    <label>Username</label>
    <input type="text" name="username" placeholder="username"/><br><br>

    <label>password</label>
    <input type="text" name="password" placeholder="password"/><br><br>

    <label>Role</label>
    <select name="role">
        <option value="0">User</option>
        <option value="1">Admin</option>
    </select>
    <br><br>
    <input type="submit" name="save" value="Submit"/>
</form>
</div>