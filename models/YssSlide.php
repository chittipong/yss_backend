<?php

namespace app\models;

use Yii;
use app\models\Page;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

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
    public $file;
    public $slideDir="../../images/slides/";
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
            [['slide_name', 'page','header', 'title'], 'string', 'max' => 225],
            [['pic', 'link'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 3],
            
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
            'slide_name' => Yii::t('app', 'ชื่อสไลด์ (ภาษาอังกฤษเท่านั้น)'),
            'page' => Yii::t('app', 'หน้า'),
            'file' => Yii::t('app', 'รูปภาพ'),
            'header'=>Yii::t('app','Header'),
            'title' => Yii::t('app', 'คำบรรยาย'),
            'link' => Yii::t('app', 'ลิงค์'),
            'lang' => Yii::t('app', 'ภาษา'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่แก้ไข'),
        ];
    }
    
    //Get image Path---------------
        public function getImageUrl(){
            return Url::to($this->slideDir.$this->pic);        //Output: yss_new2/web/
        }
        
     //Get Page List---------------
        public function getPageList(){
            $list=  Page::find()->orderBy('id')->all();
            return ArrayHelper::map($list,'id', 'specific_name');
        }
        
       //Get Language List------------
        public function getLangList(){
            $list=Lang::find()->orderBy('sort_order')->all();
            return ArrayHelper::map($list, 'abb', 'lang_name');
        }
}
