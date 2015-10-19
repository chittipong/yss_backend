<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_model}}".
 *
 * @property integer $model_id
 * @property integer $brand_id
 * @property string $model
 * @property integer $abeflag
 * @property string $year
 * @property string $start
 * @property string $end
 * @property string $len
 * @property string $cc
 * @property string $Manafacturer_Code
 * @property string $abe
 * @property integer $closeflag
 * @property string $imgpath
 */
class YssModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'brand_id', 'model', 'start', 'end', 'len', 'imgpath'], 'required'],
            [['model_id', 'brand_id', 'abeflag', 'closeflag'], 'integer'],
            [['model'], 'string', 'max' => 255],
            [['year', 'start', 'end', 'len'], 'string', 'max' => 10],
            [['cc', 'Manafacturer_Code', 'abe', 'imgpath'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model_id' => Yii::t('app', 'รหัส'),
            'brand_id' => Yii::t('app', 'แบรนด์'),
            'model' => Yii::t('app', 'โมเดล'),
            'abeflag' => Yii::t('app', 'Abeflag'),
            'year' => Yii::t('app', 'ปี'),
            'start' => Yii::t('app', 'Start'),
            'end' => Yii::t('app', 'End'),
            'len' => Yii::t('app', 'Len'),
            'cc' => Yii::t('app', 'ซีซี'),
            'Manafacturer_Code' => Yii::t('app', 'Manafacturer  Code'),
            'abe' => Yii::t('app', 'Abe'),
            'closeflag' => Yii::t('app', 'Closeflag'),
            'imgpath' => Yii::t('app', 'Imgpath'),
        ];
    }
}
