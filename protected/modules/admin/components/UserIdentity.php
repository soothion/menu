<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $user;
    public function authenticate() {
        $this->errorCode = self::ERROR_PASSWORD_INVALID;
        $user = Admins::model()->findByAttributes(array('username' => CHtml::encode($this->username)));
        if ($user) {
            if ($user->password === md5($this->password)) {
                $this->errorCode = self::ERROR_NONE;
                $this->setUser($user);
            }
        }
        unset($user);
        return !$this->errorCode;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser(CActiveRecord $user) {
        $this->user = $user->attributes;
    }

}
