<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_product_detail}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $detail
 * @property string $lang
 * @property string $keyword
 *
 * @property YssLang $lang0
 * @property YssProduct $product
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['keyword'], 'string'],
            [['title', 'detail'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 5]
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
            'title' => Yii::t('app', 'หัวข้อ'),
            'detail' => Yii::t('app', 'รายละเอียด'),
            'lang' => Yii::t('app', 'ภาษา'),
            'keyword' => Yii::t('app', 'คีย์เวิร์ด'),
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
