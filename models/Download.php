<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_download}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $detail
 * @property string $file_type
 * @property string $category
 * @property string $lang
 * @property integer $sort_order
 *
 * @property YssLang $lang0
 * @property YssProduct $product
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_download}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'sort_order'], 'integer'],
            [['category'], 'string'],
            [['title'], 'string', 'max' => 45],
            [['detail'], 'string', 'max' => 100],
            [['file_type'], 'string', 'max' => 20],
            [['lang'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'product_id' => Yii::t('app', 'รหัสสินค้า'),
            'title' => Yii::t('app', 'คำบรรยาย'),
            'detail' => Yii::t('app', 'รายละเอียด'),
            'file_type' => Yii::t('app', 'doc,pdf,zip,image'),
            'category' => Yii::t('app', 'ประเภท'),
            'lang' => Yii::t('app', 'ภาษา'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(YssLang::className(), ['abb' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(YssProduct::className(), ['product_id' => 'product_id']);
    }
}
