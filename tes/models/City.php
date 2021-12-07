<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $province_id
 * @property string $name
 *
 * @property Customer[] $customers
 * @property Province $province
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'name'], 'required'],
            [['province_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }

    public static function getAllCity()
    {
        $city = City::find()->all();
        $city = ArrayHelper::map($city, 'id', 'name');
        return $city;
    }

    public static function getDistrict($id)
    {
        $city = City::find()->where('province_id', '=', $id);
        $city = ArrayHelper::map($city, 'id', 'name');
        return $city;
    }
}
