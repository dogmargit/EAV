<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;
    public $_username;
    public $email;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate()
    {
        $user=Users::model()->findByAttributes(array('email'=>$this->email, 'password'=>$this->password));

        if(($user===null)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            // метод getId(см. ниже).
            $this->_id = $user->id;
            $this->setState('username', $user->username); 
            $this->setState('role', $user->role); 
            $this->errorCode = self::ERROR_NONE;
        }
       return !$this->errorCode;
   }
 
    public function getId()
    {
        return $this->_id;
    }

    public function getUsername()
    {
        return $this->_username;
    }
}