<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_product_review}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $from
 * @property string $comment
 * @property string $ip
 * @property string $date_create
 */
class ProductReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product_review}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['comment'], 'string'],
            [['date_create'], 'safe'],
            [['from', 'ip'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'from' => Yii::t('app', 'From'),
            'comment' => Yii::t('app', 'Comment'),
            'ip' => Yii::t('app', 'Ip'),
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }
}
