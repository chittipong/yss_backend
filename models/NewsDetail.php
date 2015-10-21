<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['title', 'detail'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 5]
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
    
    public function getLangList(){
        $list=Lang::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'abb', 'lang_name');
    }
}
