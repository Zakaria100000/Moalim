<?php

class Session
{

    /**
     * return @void
     */
    static public function set($type,$message)
    {
        setcookie($type,$message,time() + 10,"/");
    }

    static public function logout(){
        session_destroy();
    }

}
?>