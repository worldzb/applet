<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Qiniu as ToolQiniu;
use App\Models\Fodder;

class QiniuController extends Controller
{
    //
    public $QN=null;

    public function __construct(){
        $this->QN=new ToolQiniu();
    }

    /**
     * 获取七牛云token
     */
    public function getToken()
    {
        return $this->QN->getToken();
    }

    /**
     * 获取文件信息
     */
    public function getFileInfo()
    {
        dd($this->QN->getFileInfo());
    }
    
    /**
     * 图片上传成功后的写入数据库操作
     */
    public function picUpload(Request $r){
        $fodder=new Fodder();
        //dd($r->all());
        $fodder->f_hash=$r->all()['hash'];
        $fodder->f_key=$r->all()['key'];
        $fodder->f_type="PIC";
        if($fodder->save()){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * 获取素材列表
     * 返回一个 分页数据
     */
    public function getFodderList(){
        $fodder=new Fodder();
        $res=$fodder->where('id','>',0)
                ->orderBy('id','desc')
                ->paginate(50);;
        return $res;
    }

    /**
     * 检查 指定的key的文件是否存在
     */
    public function checkPic(Request $r){
        return Fodder::where('f_key',$r->all()['key'])->first()?:0;
    }

    /**
     * 删除素材
     */
    public function deleteFodder(Request $r,$id){

    }

}
