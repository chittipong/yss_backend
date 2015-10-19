<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_product_type}}".
 *
 * @property integer $id
 * @property string $type
 * @property string $detail
 * @property string $remark
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['type'], 'string', 'max' => 10],
            [['detail'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'type' => Yii::t('app', 'Product Type'),
            'detail' => Yii::t('app', 'Product Type'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
        ];
    }
    
    public function getProducts(){
        return $this->hasMany(Product::className(), ['product_type' => 'type']);
    }
}
