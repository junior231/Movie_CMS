<?php
    require_once '../load.php';
    confirm_logged_in();

    $users = getAllUsers();
        if(!$users){
            $message = 'Failed to get User List';
        }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $delete_result = deleteUser($user_id);

        if(!$delete_result){
            $message = 'Failed to delete user';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Delete User</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <table>
       <thead>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Delete</th>
        </tr>
       </thead>
       <?php while($user = $users->fetch(PDO::FETCH_ASSOC)):?>
       <tbody>
            <tr>
                <td><?php echo $user['user_id'];?></td>
                <td><?php echo $user['user_fname'];?></td>
                <td><?php echo $user['user_email'];?></td>
                <td><a href="admin_deleteuser.php?id=<?php echo $user['user_id'];?>">Test Delete</a></td>
            </tr>
        <?php endwhile;?>
       </tbody>
    </table>

</body>
</html>