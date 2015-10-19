<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%yss_product}}".
 *
 * @property integer $product_id
 * @property integer $brand_id
 * @property integer $model_id
 * @property string $product_group
 * @property string $product_type
 * @property integer $abeflag
 * @property integer $hyd
 * @property integer $emu
 * @property integer $res
 * @property string $code
 * @property string $type
 * @property string $top
 * @property string $bot
 * @property string $image
 * @property string $contenttype
 * @property string $image_name
 * @property string $Thumbnails
 * @property integer $closeflag
 * @property string $spring
 * @property string $length
 * @property string $piston
 * @property string $shaft
 * @property string $preload
 * @property string $rebound
 * @property string $compression
 * @property string $length_adjuster
 * @property string $hydraulic
 * @property string $emulsion
 * @property string $piggy_back
 * @property string $on_hose
 * @property string $free_piston
 * @property string $dtg
 * @property string $create_by
 * @property string $update_by
 * @property string $date_create
 * @property string $date_update
 * @property string $price
 * @property string $discount
 *
 * @property ProductGallery[] $productGalleries
 * @property YssDownload[] $yssDownloads
 * @property YssProductDetail[] $yssProductDetails
 */
class Product extends ActiveRecord
{
    public $file;
    
    //public $productDir="uploads/products/";                //Set product images floder
    public $productDir="../../images/products/";             //Set product images floder
    
    public $title;
    public $detail;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'model_id', 'product_group', 'product_type', 'code', 'type', 'length', 'piston', 'shaft', 'length_adjuster', 'hydraulic', 'emulsion', 'piggy_back', 'on_hose', 'free_piston', 'dtg'], 'required'],
            [['brand_id', 'model_id', 'abeflag', 'closeflag'], 'integer'],
            [['image'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['product_group', 'product_type'], 'string', 'max' => 1],
            [['code'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 2],
            [['top', 'bot'], 'string', 'max' => 255],
            [['contenttype'], 'string', 'max' => 40],
            [['image_name'], 'string', 'max' => 50],
            [['Thumbnails'], 'string', 'max' => 100],
            [['spring', 'length', 'piston', 'shaft', 'preload', 'rebound', 'compression', 'length_adjuster', 'hydraulic', 'emulsion', 'piggy_back', 'on_hose', 'free_piston', 'dtg'], 'string', 'max' => 20],
            [['create_by', 'update_by', 'price', 'discount'], 'string', 'max' => 45],
            
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
            'product_id' => 'รหัสสินค้า',
            'brand_id' => 'แบรนด์',
            'model_id' => 'โมเดล',
            'product_group' => 'Product Group',
            'product_type' => 'Product Type',
            'abeflag' => 'Abeflag',
            'hyd' => 'Hyd',
            'emu' => 'Emu',
            'res' => 'Res',
            'code' => 'Product Code',
            'type' => 'Type',
            'top' => 'Top',
            'bot' => 'Botom',
            'file' => 'ภาพสินค้า',
            'contenttype' => 'Contenttype',
            'image_name' => 'Image Name',
            'Thumbnails' => 'Thumbnails',
            'closeflag' => 'Closeflag',
            'spring' => 'Spring',
            'length' => 'ความยาวโช้ค',
            'piston' => 'ขนาดลูกสูบ(Piston)',
            'shaft' => 'ขนาดแกนโช้ค(Shaft)',
            'preload' => 'ปรับ Preload',
            'rebound' => 'Rebound',
            'compression' => 'Compression',
            'length_adjuster' => 'Length Adjuster',
            'hydraulic' => 'Hydraulic',
            'emulsion' => 'Emulsion',
            'piggy_back' => 'Piggy Back',
            'on_hose' => 'On Hose',
            'free_piston' => 'Free Piston',
            'dtg' => 'Dtg',
            'create_by' => 'เพิ่มข้อมูลโดย',
            'update_by' => 'แก้ไขโดย',
            'date_create' => 'วันที่สร้าง',
            'date_update' => 'วันที่แก้ไข',
            'price' => 'ราคา',
            'title'=>'Title',
            'detail'=>'รายละเอียด',
            'discount' => 'ราคาลด',
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
        return $this->hasOne(Brand::className(), ['brand_id' => 'brand_id']);
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
    
    
    //Product image Path---------------
    public function getImageUrl(){
        return Url::to($this->productDir.$this->image);        //Output: yss_new2/web/
        //return Url::to('../images/products/'.$this->image);                     //Output: ../images/product/
        
    }
    

}
