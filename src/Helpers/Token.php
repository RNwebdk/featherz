<?php

namespace Acme\Helpers;

class Token {

    public static function generate(){
        return Session::put('_token', md5(uniqid()));
    }

    public static function check($token){
        if(Session::exists('_token') && $token === Session::get('_token') ){
            Session::delete('_token');
            return true;
        }
        return false;
    }

}