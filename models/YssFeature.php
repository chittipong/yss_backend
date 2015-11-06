<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_feature}}".
 *
 * @property integer $id
 * @property string $feature
 * @property string $detail
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
            [['feature', 'detail', 'remark'], 'string', 'max' => 50]
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
            'detail' => Yii::t('app', 'รายละเอียด'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
        ];
    }
}
