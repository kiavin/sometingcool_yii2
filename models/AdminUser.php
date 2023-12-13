<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "Admin_user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 */
class AdminUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 100],
            [['AuthKey'], 'string', 'max' => 25],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'AuthKey',
        ];
    }

    public function getAdminUser()
    {
        return $this->hasOne(AdminUser::className(), ['id' => 'id']);
    }

    public function signup()
    {
        if($this->validate()){
            $user = new AdminUser();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
}
public static function findByUsername($username)
{
    return self::findOne(['username'=>$username]);


}
public function validatePassword($password)
{
    return $this->password === $password;
}
public function getId()
{
    return $this->id;

}

public function validateAuthKey($authKey)
{
    return $this->authKey === $authKey;

}

public static function findIdentityByAccessToken($token, $type = null)
{
    return static::findOne(['access_token' => $token]);
}

public static function findIdentity($id)
{
    return static::findOne(['id' => $id]);

}


public function generateAuthKey()
{
    $this->setAttribute('AuthKey', Yii::$app->security->generateRandomString());
}

public function getAuthKey()
{
    return $this->getAttribute('AuthKey');
}

}