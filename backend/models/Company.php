<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $Company_id
 * @property string $Company_name
 * @property string $Company_email
 * @property string $Company_address
 * @property string $Company_profile
 * @property string $Company_created
 * @property string $Company_status
 *
 * @property Branch[] $branches
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Company_name', 'Company_email', 'Company_address', 'Company_profile', 'Company_created'], 'required'],
            [['Company_created'], 'safe'],
            [['Company_status'], 'string'],
            [['Company_name', 'Company_email', 'Company_address', 'Company_profile'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Company_id' => 'Company ID',
            'Company_name' => 'Company Name',
            'Company_email' => 'Company Email',
            'Company_address' => 'Company Address',
            'Company_profile' => 'Company Profile',
            'Company_created' => 'Company Created',
            'Company_status' => 'Company Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['company_fk_id' => 'Company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_fk_id' => 'Company_id']);
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}
