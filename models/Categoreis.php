<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoreis".
 *
 * @property integer $id
 * @property string $name
 * @property integer $confrimed
 *
 * @property Products[] $products
 */
class Categoreis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoreis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'confrimed'], 'required'],
            [['confrimed'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'name' => Yii::t('app', 'Name'),
            'confrimed' => Yii::t('app', 'Confrimed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }
}
