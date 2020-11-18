<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string'],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],
        ];
    }

    // Create User and login
    public function register()
    {
        if ($this->validate()) {
            return User::create($this->username, $this->password)->login();
        }
    }
}
