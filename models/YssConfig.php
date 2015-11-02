<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_config}}".
 *
 * @property integer $id
 * @property string $company_th
 * @property string $company_en
 * @property string $tel1
 * @property string $tel2
 * @property string $tel3
 * @property string $fax1
 * @property string $fax2
 * @property string $default_mail
 * @property string $admin_mail
 * @property string $support_mail
 * @property string $sale_mail
 * @property string $contact_mail
 * @property string $info_mail
 * @property string $address_th
 * @property string $address_en
 * @property string $district_th
 * @property string $district_en
 * @property string $province_th
 * @property string $province_en
 * @property integer $zipcode
 * @property string $date_create
 * @property string $date_update
 * @property string $update_by
 */
class YssConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'zipcode'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['company_th', 'company_en', 'tel1', 'tel2', 'tel3', 'fax1', 'fax2', 'default_mail', 'admin_mail', 'support_mail', 'sale_mail', 'contact_mail', 'info_mail', 'address_th', 'address_en', 'district_th', 'district_en', 'province_th', 'province_en', 'update_by','work_hour_th','work_hour_en','country_th','country_en'], 'string'],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_th' => Yii::t('app', 'Company Th'),
            'company_en' => Yii::t('app', 'Company En'),
            'tel1' => Yii::t('app', 'Tel1'),
            'tel2' => Yii::t('app', 'Tel2'),
            'tel3' => Yii::t('app', 'Tel3'),
            'fax1' => Yii::t('app', 'Fax1'),
            'fax2' => Yii::t('app', 'Fax2'),
            'default_mail' => Yii::t('app', 'Default Mail'),
            'admin_mail' => Yii::t('app', 'Admin Mail'),
            'support_mail' => Yii::t('app', 'Support Mail'),
            'sale_mail' => Yii::t('app', 'Sale Mail'),
            'contact_mail' => Yii::t('app', 'Contact Mail'),
            'info_mail' => Yii::t('app', 'Info Mail'),
            'address_th' => Yii::t('app', 'Address Th'),
            'address_en' => Yii::t('app', 'Address En'),
            'district_th' => Yii::t('app', 'District Th'),
            'district_en' => Yii::t('app', 'District En'),
            'province_th' => Yii::t('app', 'Province Th'),
            'province_en' => Yii::t('app', 'Province En'),
            'work_hour_th' => Yii::t('app', 'Work Hour Th'),
            'work_hour_en' => Yii::t('app', 'Work Hour En'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'country_th' => Yii::t('app', 'Country Thai'),
            'country_en' => Yii::t('app', 'Country Eng'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
            'update_by' => Yii::t('app', 'Update By'),
        ];
    }
}
