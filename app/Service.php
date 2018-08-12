<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Service extends Model
{
    use Geographical;

    protected static $kilometers = true;

    protected $fillable = [
        'title',
        'description',
        'address',
        'state',
        'zipcode',
        'latitude',
        'longitude'
    ];

    public static function getDistances()
    {
        return [
            0,
            1,
            2,
            5,
            10,
            20,
            50,
            100
        ];
    }

    public static function getMetric()
    {
        return (self::$kilometers) ? 'KM' : 'MI';
    }
}
