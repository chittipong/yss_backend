<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%importers}}".
 *
 * @property integer $id
 * @property integer $import_cat_id
 * @property string $title
 * @property string $pic
 * @property string $detil
 * @property string $status
 * @property integer $sort_order
 * @property string $lang
 */
class Importers extends \yii\db\ActiveRecord
{
    public $file;
    public $importerDir="../../images/distributor/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%importers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['import_cat_id', 'sort_order'], 'integer'],
            [['detil'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['pic', 'lang'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 2],
            
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
            'import_cat_id' => Yii::t('app', 'Importer Zone'),
            'title' => Yii::t('app', 'Title'),
            'file' => Yii::t('app', 'Pic'),
            'detil' => Yii::t('app', 'Detil'),
            'status' => Yii::t('app', 'Status'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'lang' => Yii::t('app', 'Lang'),
        ];
    }
    
   /* public function getImportersCat(){
        return $this->hasOne(ImporterCat::className(),['id','title']);
    }*/
    
    public function getImportersCat(){
        return $this->hasOne(ImporterCat::className(),['id'=>'import_cat_id']);
    }
    
    public function getImportCatList(){
        $list=  ImporterCat::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'id', 'title');
    }
    
    public function getLangList(){
        $list=Lang::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'abb', 'lang_name');
    }
    
    //Product image Path---------------
    public function getImageUrl(){
        return Url::to($this->importerDir.$this->pic);     
    }
}
