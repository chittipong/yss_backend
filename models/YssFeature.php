<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_feature}}".
 *
 * @property integer $id
 * @property string $feature
 * @property string $title
 * @property string $description_th
 * @property string $description_en
 * @property string $remark
 */
class YssFeature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_feature}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_th', 'description_en', 'remark'], 'string'],
            [['feature'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'feature' => Yii::t('app', 'ฟีเจอร์'),
            'title' => Yii::t('app', 'ไตเติล'),
            'description_th' => Yii::t('app', 'รายละเอียด (ไทย)'),
            'description_en' => Yii::t('app', 'รายละเอียด (อังกฤษ)'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
        ];
    }
}
