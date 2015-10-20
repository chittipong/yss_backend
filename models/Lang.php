<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_lang}}".
 *
 * @property integer $id
 * @property string $abb
 * @property string $lang_name
 * @property string $remark
 * @property string $default
 * @property integer $sort_order
 *
 * @property YssDownload[] $yssDownloads
 * @property YssProductDetail[] $yssProductDetails
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_lang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order'], 'integer'],
            [['abb'], 'string', 'max' => 10],
            [['lang_name'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 50],
            [['default'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'abb' => Yii::t('app', 'ตัวย่อ'),
            'lang_name' => Yii::t('app', 'ชื่อเต็มภาษา'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
            'default' => Yii::t('app', 'Default'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(YssDownload::className(), ['lang' => 'abb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(YssProductDetail::className(), ['lang' => 'abb']);
    }
}
