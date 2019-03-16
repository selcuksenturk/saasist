<?php
$email = _post('email');
view('frontend/register',[
    '_active_menu' => 'Register',
    'email' => $email
]);