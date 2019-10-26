<?php

namespace atwork\auth;

class Logout{

    public function userLogOut($usernamelogout){$this->Logout($usernamelogout);}

    private function Logout($usernamelogout)
    {
        $userlogout = new Session();
        $userlogout->logoutSession($usernamelogout);
        $_SESSION['loggedIn'] = false;
        session_destroy();
    }
}