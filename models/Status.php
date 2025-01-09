<?php

namespace app\models;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $title
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public static function getStatus($title)
    {
        return self::findOne(['title' => $title])->id;
    }

    public static function getStatuses()
    {
        return (new Query())->select('title')->from(self::tableName())->indexBy('id')->column();
    }
}
