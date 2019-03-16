<?php

// check user is already signed in

Admin::isLogged();

view('frontend/signin',[
    '_active_menu' => 'Signin'
]);