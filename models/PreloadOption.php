<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_option}}".
 *
 * @property string $id
 * @property string $option_name
 * @property string $detail
 * @property integer $sort_order
 */
class PreloadOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['sort_order'], 'integer'],
            [['id', 'option_name'], 'string', 'max' => 2],
            [['detail'], 'string', 'max' => 60],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'option_name' => Yii::t('app', 'Option Name'),
            'detail' => Yii::t('app', 'Detail'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }
}
