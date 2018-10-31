<?php
/*
 * This file is part of jinggangym <https://jinggangym.com/>* Copyright (C) 2006-2018.All rights reserved. 
 * @Author: worldzb 
 * @Date: 2018-10-31 11:32:36 
 * @Last Modified by: worldzb
 * @Last Modified time: 2018-10-31 15:28:55
 */ 
namespace App\Helper;

use Qiniu\Auth;
use Qiniu\Processing\PersistentFop;
use Qiniu\Storage\BucketManager;

class Qiniu{

    public $accessKey = '';
    public $secretKey = '';

    public $bucket="applet";
    public $auth='';

    public function __construct()
    {
        $this->accessKey=config('app.QINIU_ACCESSKEY');
        $this->secretKey=config('app.QINIU_SECRETKEY');
        $this->auth=new Auth($this->accessKey, $this->secretKey);
    }

    public function getToken(){
        return $this->auth->uploadToken($this->bucket);
    }

    public function getFileInfo(){
        $key="FjOM564mQ-S2d0puJjUJ4aIuwQgL";
        $config = new \Qiniu\Config();
        $bucketManager = new \Qiniu\Storage\BucketManager($this->auth, $config);
        list($fileInfo, $err) = $bucketManager->stat($this->bucket, $key);
        if ($err) {
            return $err;
        } else {
            return $fileInfo;
        }
    }

}



