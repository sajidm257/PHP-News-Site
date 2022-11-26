<?php

?>

<div >
    <h1 align="center">All Users</h1>
<?php
include 'config.php';

$sql = "SELECT * FROM user ORDER BY user_id DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <table border="1" style="margin:auto ;">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <tr>
            <td> <?php echo $row['user_id']; ?> </td>
            <td> <?php echo $row['first_name'] .' '. $row['last_name'] ; ?> </td>
            <td> <?php echo $row['username']; ?> </td>
            <td> <?php 
            if($row['role']==0){
                echo "User";
            }else{
                echo "Admin";
            }
            ?> </td>
            <td> <a href="update-user.php?id=<?php echo $row['user_id']; ?>">Edit</a> </td>
            <td> <a href="delete-user.php?id=<?php echo $row['user_id']; ?>">Delete</a> </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</div>