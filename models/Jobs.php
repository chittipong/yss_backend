<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yss_jobs}}".
 *
 * @property integer $id
 * @property string $job_position
 * @property string $job_description
 * @property string $sex
 * @property string $age
 * @property string $education
 * @property string $salary
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_tel
 * @property string $date_create
 * @property string $update_date
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yss_jobs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_position','qty','exp','job_description','sex', 'age', 'education', 'salary', 'contact_name', 'contact_email', 'contact_tel'],'required'],
            [['job_description','enable'],'string'],
            [['qty','sort_order'],'integer'],
            [['date_create', 'update_date'], 'safe'],
            [['job_position'], 'string', 'max' => 100],
            [['sex', 'age', 'education', 'salary', 'contact_name', 'contact_email', 'contact_tel'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'job_position' => Yii::t('app', 'ตำแหน่งงานที่รับสมัคร'),
            'qty'=> Yii::t('app','จำนวนที่รับ'),
            'exp'=>Yii::t('app','ประสบการณ์'),
            'job_description' => Yii::t('app', 'รายละเอียด'),
            'sex' => Yii::t('app', 'เพศ'),
            'age' => Yii::t('app', 'อายุ'),
            'education' => Yii::t('app', 'ระดับการศึกษา'),
            'salary' => Yii::t('app', 'ระดับเงินเดือน'),
            'contact_name' => Yii::t('app', 'ติดต่อ'),
            'contact_email' => Yii::t('app', 'อีเมล์'),
            'contact_tel' => Yii::t('app', 'เบอร์โทร'),
            'sort_order' => Yii::t('app', 'ลำดับ'),
            'enable' => Yii::t('app', 'แสดง'),
            'date_create' => Yii::t('app', 'Create date'),
            'update_date' => Yii::t('app', 'Update date'),
        ];
    }
}
