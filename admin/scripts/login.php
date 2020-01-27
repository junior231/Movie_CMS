<?php 

function login($username, $password){
    //debug 
    // sprintf enables you to use %s
    $message = sprintf('you are tryin to login with username %s and password %s', $username, $password);

    return $message;
}