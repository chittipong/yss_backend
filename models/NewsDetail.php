<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%yss_news_detail}}".
 *
 * @property integer $id
 * @property integer $news_id
 * @property string $title
 * @property string $detail
 * @property integer $sort_order
 * @property string $lang
 *
 * @property YssNews $news
 */
class NewsDetail extends \yii\db\ActiveRecord
{
    public $file;
    public $newsDetailDir="../../images/news/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_news_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id'], 'required'],
            [['news_id', 'sort_order'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['main','pic','detail'],'string'],
            [['lang'], 'string', 'max' => 5],
            
            //UPLOAD FILE---------------
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
            'news_id' => Yii::t('app', 'รหัสข่าว'),
            'title' => Yii::t('app', 'หัวข้อ'),
            'detail' => Yii::t('app', 'รายละเอียด'),
            'main'=>Yii::t('app','Default'),
            'file'=>Yii::t('app','pic'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'lang' => Yii::t('app', 'ภาษา'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
    
    public function getNewsDetail(){
        return $this->hasMany(NewsDetail::className(),['news_id'=>'news_id']);
    }
    
    //Get Language List------------
    public function getLangList(){
        $list=Lang::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'abb', 'lang_name');
    }
    
    //GET image Path---------------
    public function getImageUrl(){
        return Url::to($this->newsDetailDir.$this->pic);        //Output: yss_new2/web/
    }
}
