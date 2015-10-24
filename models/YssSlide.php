<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_slide}}".
 *
 * @property integer $id
 * @property string $slide_name
 * @property string $page
 * @property string $pic
 * @property string $title
 * @property string $link
 * @property string $lang
 * @property integer $sort_order
 * @property string $date_create
 * @property string $date_update
 */
class YssSlide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_slide}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_name'], 'required'],
            [['sort_order'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['slide_name', 'page', 'title'], 'string', 'max' => 45],
            [['pic', 'link'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'slide_name' => Yii::t('app', 'ชื่อสไลด์ (ภาษาอังกฤษเท่านั้น)'),
            'page' => Yii::t('app', 'หน้า'),
            'pic' => Yii::t('app', 'รูปภาพ'),
            'title' => Yii::t('app', 'คำบรรยาย'),
            'link' => Yii::t('app', 'ลิงค์'),
            'lang' => Yii::t('app', 'ภาษา'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่แก้ไข'),
        ];
    }
}
