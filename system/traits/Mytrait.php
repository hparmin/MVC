<?php
namespace system\traits;
trait Mytrait{
    protected function route($location)
    {
        $protocol = strpos($_SERVER['SERVER_PROTOCOL'],'https') == true ? 'https' : 'http';
        header('location:'.$protocol."://".$_SERVER['HTTP_HOST'].'/mvc/'.$location);
    }
    protected function reback(){
        $reback  = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        if ($reback != null){
            header("location:$reback");
        }else{
            echo "صفحه قبلی وجود ندارد";
        }
    }

    protected function asset($file){
        global $site_url;
        $path = $site_url."public/".$file;
        echo $path;
    }

    protected function url($url){
        global $site_url;
        $location = $site_url.$url;
        echo $location;
    }

    protected function view($file,$var=null){
        if ($var){
            extract($var);
        }
        // وقتی از این متد استفاده میشه، برای آدرس دهی به جای اسلش از نقطه استفاده میکنیم:
        $file = str_replace('.','/',$file);
        $location = realpath(dirname(__FILE__)."/../../application/view/".$file.".php");
        if (file_exists($location)){
            require_once $location;
        }else{
            echo "فایل مورد نظر شما در پوشه ویو وجود ندارد.";
        }
    }

    protected function include($file,$var=null){
        if ($var){
            extract($var);
        }
        // وقتی از این متد استفاده میشه، برای آدرس دهی به جای اسلش از نقطه استفاده میکنیم:
        $file = str_replace('.','/',$file);
        $location = realpath(dirname(__FILE__)."/../../application/view/".$file.".php");
        if (file_exists($location)){
            require_once $location;
        }else{
            echo "فایل مورد نظر شما در پوشه ویو وجود ندارد.";
        }
    }


}
