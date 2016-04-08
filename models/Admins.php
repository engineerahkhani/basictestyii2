<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $user
 * @property string $pass
 * @property integer $confrimed
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'user', 'pass', 'confrimed'], 'required'],
            [['confrimed'], 'integer'],
            [['fullname'], 'string', 'max' => 25],
            [['user', 'pass'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'fullname' => Yii::t('app', 'Fullname'),
            'user' => Yii::t('app', 'Username'),
            'pass' => Yii::t('app', 'Password'),
            'confrimed' => Yii::t('app', 'Confrimed'),
        ];
    }
}
