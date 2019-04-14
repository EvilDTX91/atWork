<?php

namespace atwork\Auth\Register;

use atwork\Database\Connection;

class UserData
{
    private static $username;
    private static $password;
    private static $email;
    private static $firstname;
    private static $lastname;
    private static $dateofbirth;
    private $connection;

    public static function getUsername(): string
    {
        return self::$username;
    }
    public static function setUsername($username): void
    {
        self::$username = $username;
    }

    public static function getPassword(): string
    {
        return self::$password;
    }
    public static function setPassword($password): void
    {
        self::$password = $password;
    }

    public static function getEmail(): string
    {
        return self::$email;
    }
    public static function setEmail($email): void
    {
        self::$email = $email;
    }

    public static function getFirstname(): string
    {
        return self::$firstname;
    }
    public static function setFirstname($firstname): void
    {
        self::$firstname = $firstname;
    }

    public static function getLastname(): string
    {
        return self::$lastname;
    }
    public static function setLastname($lastname): void
    {
        self::$lastname = $lastname;
    }

    public static function getDateofbirth(): int
    {
        return self::$dateofbirth;
    }
    public static function setDateofbirth($dateofbirth): void
    {
        self::$dateofbirth = $dateofbirth;
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
    public function setConnection(Connection $connection): void
    {
        $this->connection = $connection;
    }

}
?>