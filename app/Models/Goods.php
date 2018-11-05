<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    public function getHeader(){
        $header= $this->hasManyThrough(
            'App\Models\Fodder',//目标
            'App\Models\GoodsToFodder',//中间
            'goods_id',//中间外键
            'id',
            'id',
            'fodders_id'
        )->where('type','header')->get();
        return $header;
    }
    public function getHeaderFirst(){
        $header= $this->hasManyThrough(
            'App\Models\Fodder',//目标
            'App\Models\GoodsToFodder',//中间
            'goods_id',//中间外键
            'id',
            'id',
            'fodders_id'
        )->where('type','header')->first();
        return $header;
    }

    public function getDesc(){
        $desc= $this->hasManyThrough(
            'App\Models\Fodder',//目标
            'App\Models\GoodsToFodder',//中间
            'goods_id',//中间外键
            'id',
            'id',
            'fodders_id'
        )->where('type','desc')->get();

        return $desc;
    }
}
