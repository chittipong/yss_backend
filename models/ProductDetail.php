<?php

namespace app\models;

use Yii;
use app\models\Lang;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%yss_product_detail}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $detail
 * @property string $lang
 * @property string $keyword
 *
 * @property YssLang $lang0
 * @property YssProduct $product
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    
    public $file;
    public $detailDir="../../images/products/large/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_product_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id','sort_order'], 'integer'],
            [['keyword','main'], 'string'],
            [['title', 'detail'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 5],
            [['pic'], 'string', 'max' => 60],
            
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
            'product_id' => Yii::t('app', 'รหัสสินค้า'),
            'title' => Yii::t('app', 'หัวข้อ'),
            'detail' => Yii::t('app', 'รายละเอียด'),
            'lang' => Yii::t('app', 'ภาษา'),
            'keyword' => Yii::t('app', 'คีย์เวิร์ด'),
            'main'=>Yii::t('app','Default'),
            'sort_order'=>Yii::t('app','ลำดับ'),
            'file'=>Yii::t('app','รูปภาพ')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['abb' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
    
    public function getLangList(){
        $list=  Lang::find()->orderBy('id')->all();
        return \yii\helpers\ArrayHelper::map($list, 'abb', 'lang_name');
    }
    
    //Product Detail image Path---------------
    public function getImageUrl(){
        return Url::to($this->detailDir.$this->pic);       
    }
}
