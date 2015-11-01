<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "{{%test}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $uname
 * @property string $tel
 * @property string $email
 * @property string $pic
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'uname', 'tel', 'email', 'pic'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'uname' => Yii::t('app', 'Uname'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'pic' => Yii::t('app', 'Pic'),
        ];
    }
}
