<?php
require 'vendor/autoload.php';

function SaveEncrypted($username, $password)
{

    // ... encriptar usuario:
    $protected_key_encoded['user'] = PHPassLib\Hash\BCrypt::hash($username, array ('rounds' => 16));
    $protected_key_encoded['password'] = PHPassLib\Hash\BCrypt::hash($password, array ('rounds' => 16));

    return($protected_key_encoded);
}