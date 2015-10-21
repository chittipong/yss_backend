<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * This is the model class for table "{{%yss_brand}}".
 *
 * @property integer $brand_id
 * @property string $brand
 * @property string $logo
 */
class Brand extends \yii\db\ActiveRecord
{
    public $file;
    public $brandDir="../../images/brand_logo/";               //Set brand images floder
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'logo'], 'required'],
            [['brand', 'logo'], 'string', 'max' => 50],
            
            //Upload image------------
            [['file'],'safe'],
            [['file'],'file','extensions'=>'jpg,png,gif']  //file type
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => Yii::t('app', 'รหัส'),
            'brand' => Yii::t('app', 'ชื่อแบรนด์'),
            'file' => Yii::t('app', 'โลโก้'),
        ];
    }
    
    //Product image Path---------------
    public function getImageUrl(){
        return Url::to($this->brandDir.$this->logo);        //Output: yss_new2/web/
        //return Url::to('../images/products/'.$this->image);                     //Output: ../images/product/
        
    }
}
