<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%application_list}}".
 *
 * @property integer $id
 * @property string $brand
 * @property integer $cc
 * @property string $model
 * @property string $ref_no
 * @property string $abe1
 * @property string $year
 * @property string $type
 * @property string $product_code
 * @property string $abe_shock
 * @property integer $length
 * @property string $top
 * @property string $bottom
 * @property string $spring
 * @property integer $piston
 * @property integer $shaft
 * @property string $preload
 * @property string $rebound
 * @property string $compression
 * @property string $length_adjust
 * @property string $hydraulic
 * @property string $emulsion
 * @property string $piggy_back
 * @property string $on_hose
 * @property string $free_piston
 * @property string $dtg
 * @property string $vehicle_type
 * @property string $pic
 * @property string $date_create
 * @property string $date_update
 */
class AppList extends \yii\db\ActiveRecord
{
    public $file;
    
    //public $productDir="uploads/products/";                       //Set product images floder
    public $productDir="../../images/products/large/";               //Set product images floder
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%application_list}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cc', 'length', 'piston', 'shaft'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['brand', 'model', 'product_code', 'vehicle_type', 'pic'], 'string', 'max' => 50],
            [['ref_no', 'top', 'bottom', 'spring'], 'string', 'max' => 30],
            [['abe1', 'year', 'type', 'abe_shock', 'compression', 'length_adjust'], 'string', 'max' => 5],
            [['preload', 'rebound', 'hydraulic', 'emulsion', 'piggy_back', 'on_hose', 'free_piston', 'dtg'], 'string', 'max' => 1],
            
            //FOR UPLOAD FILE--------------
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
            'brand' => Yii::t('app', 'Brand'),
            'cc' => Yii::t('app', 'Cc'),
            'model' => Yii::t('app', 'Model'),
            'ref_no' => Yii::t('app', 'Ref_No.'),
            'abe1' => Yii::t('app', 'ABE ของ มอเตอร์ไซค์'),
            'year' => Yii::t('app', 'Year'),
            'type' => Yii::t('app', 'Type'),
            'product_code' => Yii::t('app', 'Product Code'),
            'abe_shock' => Yii::t('app', 'ABE ของโช้ค'),
            'length' => Yii::t('app', 'Length'),
            'top' => Yii::t('app', 'Top'),
            'bottom' => Yii::t('app', 'Bottom'),
            'spring' => Yii::t('app', 'Spring'),
            'piston' => Yii::t('app', 'Piston'),
            'shaft' => Yii::t('app', 'Shaft'),
            'preload' => Yii::t('app', 'Preload'),
            'rebound' => Yii::t('app', 'Rebound'),
            'compression' => Yii::t('app', 'Compression'),
            'length_adjust' => Yii::t('app', 'Length Adjust'),
            'hydraulic' => Yii::t('app', 'Hydraulic'),
            'emulsion' => Yii::t('app', 'Emulsion'),
            'piggy_back' => Yii::t('app', 'Piggy Back'),
            'on_hose' => Yii::t('app', 'On Hose'),
            'free_piston' => Yii::t('app', 'Free Piston'),
            'dtg' => Yii::t('app', 'Dtg'),
            'vehicle_type' => Yii::t('app', 'Vehicle Type'),
            'file' => Yii::t('app', 'Pic'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGalleries()
    {
        return $this->hasMany(ProductGallery::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(Download::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['brand' => 'brand_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(YssModel::className(), ['model_id' => 'model_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPgroup() //Pgroup = product_group
    {
        return $this->hasOne(ProductGroup::className(), ['group' => 'product_group']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPtype() //Ptype = product_type
    {
        return $this->hasOne(ProductType::className(), ['type' => 'product_type']);
    }
    
    public function getOption(){
        return $this->hasOne(Option::className(), ['option_name'=>'preload']);
    }
    
    //List Product Group----------------
    public function getPgroupList(){
        $list=  ProductGroup::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'group','detail');
    }
    
    //List Product Type-----------------
    public function getPtypeList(){
        $list= ProductType::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'type','detail');
    }
    
    //List Brand------------------------
    public function getBrandList(){
        $list=Brand::find()->orderBy('brand')->all();
        return ArrayHelper::map($list,'brand_id','brand');
    }
    
    //List Model------------------------
    public function getModelList(){ 
        $list=  YssModel::find()->orderBy('model_id')->all();
        return ArrayHelper::map($list,'model_id','model');
    }
    
    //List Shaft------------------------
    public function getShaftList(){
        $list=  Shaft::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'size','title');
    }
    
    //List Piston-----------------------
    public function getPistonList(){
        $list= Piston::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'size','title');
    }
    
    //List Option-----------------------
    public function getOptionList(){
        $list=  Option::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'id', 'detail');
    }
    
    //List Compression------------------
    public function getCompresList(){
        $list=['W' => 'W : Hight-Low Speed', 'C' => 'C : ปรับ 3 ระดับ', 'C(AB)' => 'C(AB) : ปรับ 30 ระดับ'];
        return $list;
    }
    
    //List Type------------------
    public function getTypeList(){
        $list=['TS' => 'TS', 'MS' => 'MS'];
        return $list;
    }
    
    public function getVehicle(){
        return $this->hasOne(Vehicle::className(), ['id'=>'vehicle_type']);
    }

    //List Vehicle---------------
    public function getVehicleList(){
        $list=  Vehicle::find()->orderBy('id')->all();
        return ArrayHelper::map($list, 'id', 'name');
    }
    
    
    //Product image Path---------------
    public function getImageUrl(){
        return Url::to($this->productDir.$this->pic);        //Output: yss_new2/web/
        //return Url::to('../images/products/'.$this->image);                     //Output: ../images/product/
        
    }
}
