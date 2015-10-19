<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_gallery}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $pic
 * @property string $main
 * @property integer $sort_order
 *
 * @property YssProduct $product
 */
class ProductGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'sort_order'], 'integer'],
            [['title'], 'string', 'max' => 60],
            [['pic'], 'string', 'max' => 45],
            [['main'], 'string', 'max' => 1]
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
            'title' => Yii::t('app', 'Title'),
            'pic' => Yii::t('app', 'ชื่อรูปภาพ'),
            'main' => Yii::t('app', 'ภาพหลัก'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(YssProduct::className(), ['product_id' => 'product_id']);
    }
}
