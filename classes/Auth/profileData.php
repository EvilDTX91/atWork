<?php
namespace atwork\Auth;

class ProfileData
{
    public function setProfileData($profileData): void
    {

        if(isset($profileData))
        {
            while($row = $profileData->fetch_assoc()) {
                echo "hellooooooo";
                echo $row['userid'] . "</br>";
                $_SESSION['userid'] = $row['userid'];
                echo $row['username'] . "</br>";
                $_SESSION['username'] = $row['username'];
                echo $row['password'] . "</br>";
                $_SESSION['password'] = $row['password'];
                echo $row['email'] . "</br>";
                $_SESSION['email'] = $row['email'];
                echo $row['lastname'] . "</br>";
                $_SESSION['lastname'] = $row['lastname'];
                echo $row['firstname'] . "</br>";
                $_SESSION['firstname'] = $row['firstname'];
                echo $row['dateofbirth'] . "</br>";
                $_SESSION['dateofbirth'] = $row['dateofbirth'];
                echo $row['registerdate'] . "</br>";
                $_SESSION['registerdate'] = $row['registerdate'];
                echo $row['lasthere'] . "</br>";
                $_SESSION['lasthere'] = $row['lasthere'];
                echo $row['userlevel'] . "</br>";
                $_SESSION['userlevel'] = $row['userlevel'];
                echo $_SERVER['REMOTE_ADDR'] . "</br>";
                echo session_id() . "</br>";
                $_SESSION['loggedIn'] = true;
            }
        }

    }
}