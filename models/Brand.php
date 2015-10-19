<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%yss_brand}}".
 *
 * @property integer $brand_id
 * @property string $brand
 * @property string $logo
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'logo'], 'required'],
            [['brand', 'logo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => Yii::t('app', 'รหัส'),
            'brand' => Yii::t('app', 'ชื่อแบรนด์'),
            'logo' => Yii::t('app', 'โลโก้'),
        ];
    }
}
