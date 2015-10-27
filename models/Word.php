<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_word}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $TH
 * @property string $EN
 * @property string $L3
 * @property string $L4
 * @property string $L5
 * @property string $L6
 * @property string $L7
 * @property string $L8
 */
class Word extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_word}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'TH', 'EN', 'L3', 'L4', 'L5', 'L6', 'L7', 'L8'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Specific Name'),
            'TH' => Yii::t('app', 'TH'),
            'EN' => Yii::t('app', 'En'),
            'L3' => Yii::t('app', 'ภาษาที่ 3'),
            'L4' => Yii::t('app', 'ภาษาที่ 4'),
            'L5' => Yii::t('app', 'ภาษาที่ 5'),
            'L6' => Yii::t('app', 'ภาษาที่ 6'),
            'L7' => Yii::t('app', 'ภาษาที่ 7'),
            'L8' => Yii::t('app', 'ภาษาที่ 8'),
        ];
    }
}
