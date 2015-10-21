<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%importers_category}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $sort_order
 * @property string $status
 * @property string $lang
 */
class ImporterCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%importers_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 2],
            [['lang'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'status' => Yii::t('app', 'Status'),
            'lang' => Yii::t('app', 'Lang'),
        ];
    }
    
}
