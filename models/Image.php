<?php

namespace app\models;

// use Yii;
use yii\base\Model;


class Image extends Model
{
    const PATH = '/img/';


    /**
     * @return array the validation rules.
     */
    public static function getImage()
    {
        return [
            [self::PATH . '1.jpg', 'Статуя на кладбище', 'Богословское кладбище'],
            [self::PATH . '2.jpg', 'Могила Виктора Цоя', 'Богословское кладбище'],
            [self::PATH . '3.jpg', 'Могила Михаила Горшенева', 'Богословское кладбище']
        ];
    }

    public static function getCollageImage()
    {
        return [
            self::PATH . '4.jpg', self::PATH . '5.jpg', self::PATH . '6.jpg'
        ];
    }
}
