<?php

namespace backend\models;

use Yii;
use common\models\User;
use frontend\models\AuthAssignment;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Usercreate extends \yii\db\ActiveRecord
{
    public $permission;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'email','status'], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['permission','string'],
            [['email'], 'unique'],
            ['email','email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'permission' =>'Permission',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function signup()
    { 
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status = $this->status;
        $user->generateAuthKey();
        $user->save();

        $data = Yii::$app->request->post();
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole($this->permission);
        $auth->assign($authorRole, $user->getId());
        
        return $user;
        //return $user->save() ? $user : null;
    }
    public function updateUser($id){
        $data = Yii::$app->request->post();
        
        $user = User::findOne($id);
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        //$user->setPassword($this->password);
        $user->generateAuthKey();
        
        $user->save();

        
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole($this->permission);

        $auth->revokeAll($user->getId());
        $auth->assign($authorRole, $user->getId());
        
        return $user;
    }
}
