<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "download".
 *
 * @property integer $id
 * @property integer $download_cat_id
 * @property integer $product_id
 * @property string $title
 * @property string $detail
 * @property string $file_folder
 * @property string $file_name
 * @property string $file_size
 * @property string $status
 * @property string $lang
 */
class Download extends \yii\db\ActiveRecord
{
    public $file;
    
    //public $productDir="uploads/products/";                       
    public $downloadDir="../../downloads/";                         //Set download  floder
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['download_cat_id', 'product_id'], 'integer'],
            [['detail'], 'string'],
            [['title', 'file_folder', 'file_name', 'file_size'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 2],
            [['lang'], 'string', 'max' => 20],
            [['author'], 'string'],
            
            //FOR UPLOAD FILE--------------
            [['file'],'safe'],
            [['file'],'file','extensions'=>'pdf,doc,docx,xls,xlsx']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'download_cat_id' => Yii::t('app', 'Category'),
            'product_id' => Yii::t('app', 'Product ID'),
            'title' => Yii::t('app', 'Title'),
            'detail' => Yii::t('app', 'Detail'),
            'file_folder' => Yii::t('app', 'File Folder'),
            'file' => Yii::t('app', 'File'),
            'file_size' => Yii::t('app', 'File Size'),
            'status' => Yii::t('app', 'Status'),
            'lang' => Yii::t('app', 'ภาษา'),
            'author'=>Yii::t('app', 'Author'),
            'date_create' => 'Date Create',
            'date_update' => 'Date Update'
        ];
    }
    
    
    public function getCat(){
        return $this->hasOne(DownloadCategory::className(),['id'=>'download_cat_id'] );
    }
    
    public function getLang(){
        return $this->hasOne(Lang::className(),['abb'=>'lang_name']);
    }
    
    public function getCatList(){
        $list=  DownloadCategory::find()->orderBy('id')->all();
        return ArrayHelper::map($list, 'id', 'name');
    }
    
    public function getLangList(){
        $list=Lang::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'abb', 'lang_name');
    }
}
