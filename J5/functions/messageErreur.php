<?php

function messageErreur($messages): string
{
    $t= '<div>';
    if(is_array($messages)){
        foreach($messages as $message){
            $t .= '<p class="text-danger h6">' . $message . '</p>';
        }
    } else {
        $t .= '';
    }

    return $t . '</div>';
}