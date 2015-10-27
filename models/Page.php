<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%yss_page}}".
 *
 * @property integer $id
 * @property string $specific_name
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $lang
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['specific_name', 'title'], 'string', 'max' => 50],
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
            'specific_name' => Yii::t('app', 'Specific Name'),
            'title' => Yii::t('app', 'title เพื่อแสดงในแทบไตเติลบาร์'),
            'description' => Yii::t('app', 'Description สำหรับ Meta tag'),
            'keyword' => Yii::t('app', 'Keyword สำหรับ Meta tag'),
            'lang' => Yii::t('app', 'ภาษา'),
        ];
    }
    
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['abb' => 'lang']);
    }
    
    public function getLangList(){
        $list=Lang::find()->orderBy('sort_order')->all();
        return ArrayHelper::map($list, 'abb', 'lang_name');
    }
}
