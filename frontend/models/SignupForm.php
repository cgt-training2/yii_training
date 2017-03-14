<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\AuthAssignment;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $permission;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['permission','string'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    { 
        if (!$this->validate()) {
            return null;
        }


        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        $data = Yii::$app->request->post();

        $newPermissions = new AuthAssignment;
        $newPermissions->item_name = $this->permission; // $data['SignupForm']['permission'];
        $newPermissions->user_id = (string)$user->id;
        $newPermissions->save();
        
       /* foreach($data['SignupForm']['permission'] as $value){
            $newPermissions = new AuthAssignment;
            $newPermissions->item_name = $value;
            $newPermissions->user_id = (string)$user->id;
            $newPermissions->save();
        }*/
        return $user;
        //return $user->save() ? $user : null;
    }
}
