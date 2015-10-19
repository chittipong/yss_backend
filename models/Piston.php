<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yss_piston".
 *
 * @property integer $id
 * @property integer $size
 * @property string $title
 * @property string $remark
 */
class Piston extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yss_piston';
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
            'id' => 'รหัส',
            'size' => 'ขนาด (มิลลิเมตร)',
            'title' => 'ขนาดลูกสูบ',
            'remark' => 'หมายเหตุ',
        ];
    }
}
