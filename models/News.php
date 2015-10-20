<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%yss_news}}".
 *
 * @property integer $id
 * @property string $pic
 * @property string $author
 * @property integer $sort_order
 * @property string $date_create
 * @property string $date_update
 * @property string $type
 *
 * @property YssNewsDetail[] $yssNewsDetails
 */
class News extends \yii\db\ActiveRecord
{
    public $file;
    public $title;
    public $detail;
    public $lang;
    public $newsDir="../../images/news/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['type'], 'string'],
            [['pic', 'author'], 'string', 'max' => 45],
            
            //For upload pic
            [['file'],'safe'],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'file' => Yii::t('app', 'ภาพหลัก'),
            'author' => Yii::t('app', 'ผู้เขียน'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่อัพเดต'),
            'type' => Yii::t('app', 'ประเภท'),
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsDetails()
    {
        return $this->hasMany(YssNewsDetail::className(), ['news_id' => 'id']);
    }
    
    //Product image Path---------------
    public function getImageUrl(){
        return Url::to($this->newsDir.$this->pic);        //Output: yss_new2/web/
    }
}
