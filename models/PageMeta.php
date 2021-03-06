<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%yss_page_metatag}}".
 *
 * @property integer $id
 * @property integer $page_id
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $lang
 */
class PageMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_page_metatag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id'], 'string'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['keyword'], 'string', 'max' => 250],
            [['lang'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page ID'),
            'title' => Yii::t('app', 'title เพื่อแสดงในแทบไตเติลบาร์'),
            'description' => Yii::t('app', 'Description สำหรับ Meta tag'),
            'keyword' => Yii::t('app', 'Keyword สำหรับ Meta tag'),
            'lang' => Yii::t('app', 'ภาษา'),
        ];
    }
    
    //Get Page List---------------
        public function getPageList(){
            $list=  Page::find()->orderBy('id')->all();
            return ArrayHelper::map($list,'name', 'title');
        }
    //Get lang list---------------
        public function getLangList(){
            $list=Lang::find()->orderBy('sort_order')->all();
            return ArrayHelper::map($list, 'abb', 'lang_name');
        }
        
        public function getPage(){
            return $this->hasOne(Page::className(), ['name' => 'page_id']);
        }
}
