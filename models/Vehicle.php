<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_vehicle}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_vehicle}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 255]
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
            'remark' => Yii::t('app', 'Remark'),
        ];
    }
}
