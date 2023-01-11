<?php

function auth($session): bool
{
    if(!isset($session['user_connected'])){
        return false;
    } else {
        return $_SESSION['user_connected'];
    }
}
