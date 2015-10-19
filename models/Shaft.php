<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_shaft}}".
 *
 * @property integer $id
 * @property integer $size
 * @property string $title
 * @property string $remark
 */
class Shaft extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_shaft}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
            [['title', 'remark'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'size' => Yii::t('app', 'ขนาด (มิลลิเมตร)'),
            'title' => Yii::t('app', 'ขนาดแกนโช้ค'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }
}
