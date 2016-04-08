<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $address
 * @property string $postcode
 * @property string $mobile
 * @property string $email
 * @property string $user
 * @property string $pass
 * @property integer $confrimed
 *
 * @property Orders[] $orders
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'address', 'postcode', 'mobile', 'email', 'user', 'pass', 'confrimed'], 'required'],
            [['address'], 'string'],
            [['confrimed'], 'integer'],
            [['fullname', 'email', 'user', 'pass'], 'string', 'max' => 255],
            [['postcode', 'mobile'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'fullname' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'postcode' => Yii::t('app', 'Postcode'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
            'user' => Yii::t('app', 'User'),
            'pass' => Yii::t('app', 'Pass'),
            'confrimed' => Yii::t('app', 'Confrimed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'id']);
    }
}
