<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_product_group}}".
 *
 * @property integer $id
 * @property string $group
 * @property string $detail
 * @property string $remark
 */
class ProductGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['group'], 'string', 'max' => 10],
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
            'group' => Yii::t('app', 'Group Abb.(ตัวย่อ)'),
            'detail' => Yii::t('app', 'Group Name'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
        ];
    }
    
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_group' => 'group']);
    }
}
