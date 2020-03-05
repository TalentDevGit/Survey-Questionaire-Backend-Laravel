<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'userdatas';
    protected $primarykey = 'venue_name';
    protected $fillable = [
        'venue_name',
        'seat_cnt',
        'section_cnt',
        'stu_seat_cnt',
        'is_holder',
        'is_wifi',
        'performance',
        'holder_cnt',
        'holder_pos',
        'arm_width',
        'arm_kind',
        'rate',
        'others',
        'name1',
        'number1',
        'email1',
        'name2',
        'number2',
        'email2',
        'val1_1',
        'val1_2',
        'val1_3',
        'val1_4',
        'val2_1',
        'val2_2',
        'val2_3',
        'val2_4',
        'val3_1',
        'val3_2',
        'val3_3',
        'val3_4',
        'val4_1',
        'val4_2',
        'val4_3',
        'val4_4',
        'seat_pic',
        'seat_chart',
    ];
}
