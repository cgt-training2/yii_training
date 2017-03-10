<?php
namespace app\models;

use Yii;
use yii\base\Model;
/**
* 
*/
class EntryForm extends Model
{
	
	public $name;
    public $email;
    public $mobileno;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['mobileno','required','message' =>'please enter mobile no'],
            ['email', 'email'],
            ['name','trim'],
            ['name','default']
			
        ];
    }
}
?>