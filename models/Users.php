<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $lname
 * @property string $uname
 * @property string $pass
 * @property string $tel
 * @property string $email
 * @property string $department
 * @property string $role
 * @property string $remark
 * @property string $date_create
 * @property string $date_update
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['name', 'lname', 'uname', 'pass', 'tel', 'email', 'department', 'role'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'name' => Yii::t('app', 'ชื่อ'),
            'lname' => Yii::t('app', 'นามสกุล'),
            'uname' => Yii::t('app', 'ชื่อเข้าใช้งาน'),
            'pass' => Yii::t('app', 'รหัสผ่าน'),
            'tel' => Yii::t('app', 'โทร'),
            'email' => Yii::t('app', 'อีเมล์'),
            'department' => Yii::t('app', 'แผนก'),
            'role' => Yii::t('app', 'สิทธิ์'),
            'remark' => Yii::t('app', 'หมายเหตุ'),
            'date_create' => Yii::t('app', 'วันที่สร้าง'),
            'date_update' => Yii::t('app', 'วันที่แก้ไข'),
        ];
    }
}
