<?php

namespace atwork\Auth\Register;

class RegisterValidator
{

    public function validateUserData($username, $password, $email, $firstname, $lastname, $dateofbirth)
    {

        if (isset($username)) {
            UserData::setUsername($username);
        } else {
            echo "</br>Username Error: " . $username . "</br>";
        }

        if (isset($password)) {
            UserData::setPassword($password);
        } else {
            echo "</br>Password Error: " . $password . "</br>";
        }

        if (isset($email)) {
            UserData::setEmail($email);
        } else {
            echo "</br>Email Error: " . $email . "</br>";
        }

        if (isset($firstname)) {
            UserData::setFirstname($firstname);
        } else {
            echo "</br>Firstname Error: " . $firstname . "</br>";
        }

        if (isset($lastname)) {
            UserData::setLastname($lastname);
        } else {
            echo "</br>Lastname Error: " . $lastname . "</br>";
        }

        if (isset($dateofbirth)) {
            UserData::setDateofbirth($dateofbirth);
        } else {
            echo "</br>Date of birthz Error: " . $dateofbirth . "</br>";
        }

    }
}

?>