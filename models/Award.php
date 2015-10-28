<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%yss_award}}".
 *
 * @property integer $id
 * @property string $title_th
 * @property string $title_en
 * @property string $title_l3
 * @property string $title_l4
 * @property string $title_l5
 * @property string $title_l6
 * @property string $title_l7
 * @property string $title_l8
 * @property string $detail_th
 * @property string $detail_en
 * @property string $detail_l3
 * @property string $detail_l4
 * @property string $detail_l5
 * @property string $detail_l6
 * @property string $detail_l7
 * @property string $detail_l8
 * @property string $pic
 * @property string $date_create
 * @property string $date_update
 */
class Award extends \yii\db\ActiveRecord
{
    
    public $file;
    public $awardDir="../../images/awards/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_award}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail_th', 'detail_en', 'detail_l3', 'detail_l4', 'detail_l5', 'detail_l6', 'detail_l7', 'detail_l8'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['title_th', 'title_en', 'title_l3', 'title_l4', 'title_l5', 'title_l6', 'title_l7', 'title_l8'], 'string', 'max' => 100],
            [['pic'], 'string', 'max' => 50],
            [['sort_order'],'integer'],
            
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
            'id' => Yii::t('app', 'ID'),
            'title_th' => Yii::t('app', 'Title (ไทย)'),
            'title_en' => Yii::t('app', 'Title (EN)'),
            'title_l3' => Yii::t('app', 'Title (ภาษาที่ 3)'),
            'title_l4' => Yii::t('app', 'Title (ภาษาที่ 4)'),
            'title_l5' => Yii::t('app', 'Title (ภาษาที่ 5)'),
            'title_l6' => Yii::t('app', 'Title (ภาษาที่ 6)'),
            'title_l7' => Yii::t('app', 'Title (ภาษาที่ 7)'),
            'title_l8' => Yii::t('app', 'Title (ภาษาที่ 8)'),
            'detail_th' => Yii::t('app', 'รายละเอียด(ไทย)'),
            'detail_en' => Yii::t('app', 'รายละเอียด(EN)'),
            'detail_l3' => Yii::t('app', 'รายละเอียด(ภาษาที่ 3)'),
            'detail_l4' => Yii::t('app', 'รายละเอียด(ภาษาที่ 4)'),
            'detail_l5' => Yii::t('app', 'รายละเอียด(ภาษาที่ 5)'),
            'detail_l6' => Yii::t('app', 'รายละเอียด(ภาษาที่ 6)'),
            'detail_l7' => Yii::t('app', 'รายละเอียด(ภาษาที่ 7)'),
            'detail_l8' => Yii::t('app', 'รายละเอียด(ภาษาที่ 8)'),
            'file' => Yii::t('app', 'รูป'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่อัพเดต'),
        ];
    }
    
   //Get image Path---------------
    public function getImageUrl(){
        return Url::to($this->awardDir.$this->pic);        //Output: yss_new2/web/
    }
}
