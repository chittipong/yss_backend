<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%yss_contact}}".
 *
 * @property integer $id
 * @property string $specific_name
 * @property string $title
 * @property string $address
 * @property string $district
 * @property string $province
 * @property integer $zipcode
 * @property string $phone1
 * @property string $phone2
 * @property string $phone3
 * @property string $fax1
 * @property string $fax2
 * @property string $fax3
 * @property string $default_mail
 * @property string $support_mail
 * @property string $sale_mail
 * @property string $description
 * @property string $lang
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_contact}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zipcode'], 'integer'],
            [['specific_name', 'district', 'province', 'phone1', 'phone2', 'phone3', 'fax1', 'fax2', 'fax3', 'default_mail', 'support_mail', 'sale_mail'], 'string', 'max' => 50],
            [['title','address','description'],'string'],
            [['lang'], 'string', 'max' => 2]
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
            'title' => Yii::t('app', 'ชื่อ'),
            'address' => Yii::t('app', 'ที่อยู่'),
            'district' => Yii::t('app', 'อำเภอ'),
            'province' => Yii::t('app', 'จังหวัด '),
            'zipcode' => Yii::t('app', 'รหัสไปรษณีย์'),
            'phone1' => Yii::t('app', 'เบอร์โทรศัพท์1'),
            'phone2' => Yii::t('app', 'เบอร์โทรศัพท์ 2'),
            'phone3' => Yii::t('app', 'เบอร์โทรศัพท์ 3'),
            'fax1' => Yii::t('app', 'เบอร์แฟ็กซ์ 1'),
            'fax2' => Yii::t('app', 'เบอร์แฟ็กซ์ 2'),
            'fax3' => Yii::t('app', 'เบอร์แฟ็กซ์ 3'),
            'default_mail' => Yii::t('app', 'Deault Mail'),
            'support_mail' => Yii::t('app', 'Support Mail'),
            'sale_mail' => Yii::t('app', 'Sale Mail'),
            'description' => Yii::t('app', 'รายละเอียดเพิ่มเติม'),
            'lang' => Yii::t('app', 'ภาษา'),
        ];
    }
    
    
        //Get language List-------------
        public function getLangList(){
            $list=Lang::find()->orderBy('sort_order')->all();
            return ArrayHelper::map($list, 'abb', 'lang_name');
        }

}
