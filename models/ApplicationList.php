<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%application_list}}".
 *
 * @property integer $id
 * @property string $brand
 * @property integer $cc
 * @property string $model
 * @property string $ref_no
 * @property string $abe1
 * @property string $year
 * @property string $type
 * @property string $product_code
 * @property string $abe_shock
 * @property integer $length
 * @property string $top
 * @property string $bottom
 * @property string $spring
 * @property integer $piston
 * @property integer $shaft
 * @property string $preload
 * @property string $rebound
 * @property string $compression
 * @property string $length_adjst
 * @property string $hydraulic
 * @property string $emulsion
 * @property string $piggy_back
 * @property string $on_host
 * @property string $free_piston
 * @property string $dtg
 * @property string $vehicle_type
 */
class ApplicationList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%application_list}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cc', 'length', 'piston', 'shaft'], 'integer'],
            [['brand', 'model', 'product_code', 'vehicle_type'], 'string', 'max' => 50],
            [['ref_no', 'top', 'bottom', 'spring'], 'string', 'max' => 30],
            [['abe1', 'year', 'type', 'abe_shock', 'compression', 'length_adjst'], 'string', 'max' => 5],
            [['preload', 'rebound', 'hydraulic', 'emulsion', 'piggy_back', 'on_host', 'free_piston', 'dtg'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand' => Yii::t('app', 'Brand'),
            'cc' => Yii::t('app', 'Cc'),
            'model' => Yii::t('app', 'Model'),
            'ref_no' => Yii::t('app', 'เลขตัวถัง'),
            'abe1' => Yii::t('app', 'ABE ของ มอเตอร์ไซค์'),
            'year' => Yii::t('app', 'Year'),
            'type' => Yii::t('app', 'Type'),
            'product_code' => Yii::t('app', 'Product Code'),
            'abe_shock' => Yii::t('app', 'ABE ของโช้ค'),
            'length' => Yii::t('app', 'Length'),
            'top' => Yii::t('app', 'Top'),
            'bottom' => Yii::t('app', 'Bottom'),
            'spring' => Yii::t('app', 'Spring'),
            'piston' => Yii::t('app', 'Piston'),
            'shaft' => Yii::t('app', 'Shaft'),
            'preload' => Yii::t('app', 'Preload'),
            'rebound' => Yii::t('app', 'Rebound'),
            'compression' => Yii::t('app', 'Compression'),
            'length_adjst' => Yii::t('app', 'Length Adjst'),
            'hydraulic' => Yii::t('app', 'Hydraulic'),
            'emulsion' => Yii::t('app', 'Emulsion'),
            'piggy_back' => Yii::t('app', 'Piggy Back'),
            'on_host' => Yii::t('app', 'On Host'),
            'free_piston' => Yii::t('app', 'Free Piston'),
            'dtg' => Yii::t('app', 'Dtg'),
            'vehicle_type' => Yii::t('app', 'Vehicle Type'),
        ];
    }
}
