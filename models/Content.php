<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Page;
use yii\helpers\Url;
/**
 * This is the model class for table "{{%yss_content}}".
 *
 * @property integer $id
 * @property integer $page
 * @property string $position
 * @property string $title
 * @property string $detail
 * @property string $pic
 * @property string $lang
 * @property string $date_create
 * @property string $date_update
 */
class Content extends \yii\db\ActiveRecord
{
    
    public $file;
    public $contentDir="../../images/contents/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page','sort_order'], 'integer'],
            [['position', 'date_create', 'date_update'], 'string', 'max' => 45],
            [['title', 'detail', 'pic','pic_title'], 'string'],
            [['lang'], 'string', 'max' => 5],
            
             //For upload pic---------
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
            'page' => Yii::t('app', 'หน้า'),
            'position' => Yii::t('app', 'ตำแหน่ง'),
            'title' => Yii::t('app', 'หัวข้อ (Title)'),
            'detail' => Yii::t('app', 'รายละเอียด (Detail)'),
            'file' => Yii::t('app', 'รูปภาพ'),
            'pic_title' => Yii::t('app', 'คำบรรยายใต้ภาพ'),
            'lang' => Yii::t('app', 'ภาษา'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่มีการแก้ไข'),
        ];
    }
    
    //Get language List-------------
        public function getLangList(){
            $list=Lang::find()->orderBy('sort_order')->all();
            return ArrayHelper::map($list, 'abb', 'lang_name');
        }

     //Get image Path---------------
        public function getImageUrl(){
            return Url::to($this->contentDir.$this->pic);        //Output: yss_new2/web/
        }
        
     //Get Page List---------------
        public function getPageList(){
            $list=  Page::find()->orderBy('id')->all();
            return ArrayHelper::map($list,'id', 'title');
        }
        
     //Get Section List------------
        public function getSectionList(){
            $list=['section1'=>'Section 1','section2'=>'Section 2','section3'=>'Section 3','section4'=>'Section 4','section5'=>'Section 5'];
            return $list;
        }

}
