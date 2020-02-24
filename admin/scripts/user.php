<?php
function createUser($fname, $email, $password, $username){
    $pdo = Database::getInstance()->getConnection();

    //Todo: finish query below so that it can a sql query 
    // to create a new user with provided data
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_email, user_name, user_pass, user_ip)';
    $create_user_query .=  ' VALUES (:fname, :email, :username, :pass, "no")';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':email'=>$email,
            ':pass'=>$password,
            ':username'=>$username,
             )
        );

    if($create_user_result){
        redirect_to('index.php');
    }else{
       //user does not exist
       $message = 'error message';
    }
    return $message;
}



