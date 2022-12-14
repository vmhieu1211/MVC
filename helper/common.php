<?php
if(!function_exists('getUsername'))
{
    function getUsername()
    {
        $user = $_SESSION['username'] ?? null;
        return $user;
    }
}

if(!function_exists('redirect'))
        {
            function redirect($c,$m,$param = [])
            {
                $p = '';
                if(!empty($param))
                {
                     foreach($param as $key => $item)
                     {
                         $p .= empty($p) ? "{$key}={$item}" :"&{$key}={$item}";
                     }
                }
                $linkRedirect = empty($p) ? ADMIN_APP_PATH."?c={$c}&m={$m}" : ADMIN_APP_PATH."?c={$c}&m={$m}&{$p}";
                header("Location:".$linkRedirect);
            }
        }
// nhung ham tien ich duoc su dung bat ky noi dau(se cho autoload)
if(!function_exists('asset')){
    function asset($pathFile, $isAdmin = false)
    {
        //goi duong dan file ngoai view
        //xu ly load moi thu trong thu muc public
        if($pathFile !== null){
            if($isAdmin) {
                if(file_exists(PATH_PUBLIC_ADMIN . $pathFile)){
                    return PATH_PUBLIC_ADMIN . $pathFile;
                }
            }
            else {
                if(file_exists(PATH_PUBLIC. $pathFile)){
                    return PATH_PUBLIC . $pathFile;
                }
            }
        }
    }
}
if(!function_exists('route')){
    //render link url routing
    function route($c,$m,$params = [])
    {
        $p ='';
        foreach($params as $key => $item){
            $p .= (empty($p)) ? "{$key}={$item} ": "&{$key}={$item}";
        }
        //index.php?c=home&m=index&age=20&name=teo
        // ['age' => 20,'name' => 'teo']
        return empty($p) ?  APP_PATH."?c={$c}&m={$m}" : APP_PATH."?c={$c}&m={$m}&{$p}";
    }

}
