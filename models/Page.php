<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_page}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property integer $sort_order
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort_order'], 'integer'],
            [['name', 'title'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Specific Name'),
            'title' => Yii::t('app', 'title'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
        ];
    }
}
