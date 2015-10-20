<?php

namespace app\models;

use Yii;

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
            [['title', 'detail'], 'string', 'max' => 45],
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
            'lang' => Yii::t('app', 'ลำดับ'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(YssNews::className(), ['id' => 'news_id']);
    }
}
