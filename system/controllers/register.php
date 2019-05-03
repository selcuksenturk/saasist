<?php
$social_sign_in = require 'system/config/social_sign_in.php';
$email = _post('email');
view('frontend/register',[
    '_active_menu' => 'Register',
    'email' => $email,
    'social_sign_in' => $social_sign_in
]);