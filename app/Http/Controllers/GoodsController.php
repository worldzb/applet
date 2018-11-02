<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsToFodder;

class GoodsController extends Controller
{
    /**
     * 
     */
    public function addGoods(Request $r){
        
        $arrGet=$r->all();
        $goods=new Goods();
        $goods->g_type=$arrGet['g_type'];
        $goods->g_title=$arrGet['g_title'];
        $goods->g_price_now=$arrGet['g_price_now'];
        $goods->g_price_old=$arrGet['g_price_old'];
        $goods->g_sales=$arrGet['g_sales'];
        $goods->g_desc='t';
        if($goods->save()){
            //$goods->id;
            foreach($arrGet['g_header'] as $key=>$value ){
                $gtf=new GoodsToFodder();
                $gtf->type="header";
                $gtf->goods_id=$goods->id;
                $gtf->fodders_id=$value['id'];
                $gtf->save();
            }
            foreach($arrGet['g_desc'] as $key=>$value ){
                $gtf=new GoodsToFodder();
                $gtf->type="desc";
                $gtf->goods_id=$goods->id;
                $gtf->fodders_id=$value['id'];
                $gtf->save();
            }
        }
    }

    public function getGoods(Request $r,$id){
        $goods=new Goods();
        $goods=Goods::where('id','=',$id)->get();
        foreach($goods as $key=>$item ){
            $goods[$key]['g_header']=$item->getHeader();
            $goods[$key]['g_desc']=$item->getDesc();
        }
        return $goods;
    }

    public function getGoodsList(Request $r){
        $goods=new Goods();
        $goods=Goods::where('id','=',$id)->get();
        foreach($goods as $key=>$item ){
            $goods[$key]['g_header']=$item->getHeader();
            $goods[$key]['g_desc']=$item->getDesc();
        }
        return $goods;
    }

}
