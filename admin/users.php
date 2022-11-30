<?php

?>

<div >
    <h1 align="center">All Users</h1>
    <a href="add-user.php">Add New User</a>
<?php
include 'config.php';
$limit=3;
// $page = $_GET['page'];
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
};
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT {$offset}, {$limit}";

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
    <?php } 
    
    $sql1 = "SELECT * FROM users";
    $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
    
    if(mysqli_num_rows($result)>0){
        $total_records=mysqli_num_rows($result1);
        
        $total_page = ceil($total_records / $limit);
        
        echo '<ul>';
        if($page>1){
        echo'<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
        };
        
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active="active";
            }else{$active="";}
            echo'<li class="'.$active.'"> <a href="users.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
        echo'<li><a href="users.php?page='.($page+1).'">Next</a></li>';
        };
        
        echo'</ul>';
    }
    ?>

    <!--<ul>-->
    <!--    <li><a href="#">1</a></li>-->
    <!--    <li><a href="#">2</a></li>-->
    <!--    <li><a href="#">3</a></li>-->
    </ul>
</div>