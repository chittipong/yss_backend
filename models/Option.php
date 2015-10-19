<?php
namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Option extends yii\db\ActiveRecord{
    public static function tableName()
    {
        return 'yss_option';
    }
    
     public function rules()
    {
        return [
            [['option_name'], 'required'],
            [['option_name', 'detail'], 'string', 'max' => 50]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'option_name' => 'การปรับ Preload',
            'detail' => 'Preload Detail'
        ];
    }
}