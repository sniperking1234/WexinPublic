<?php
//验证用户名

//验证id
function id_validate($idNum)
{
    $pattern = "/^(([0-9]{15})|([0-9]{18})|([0-9]{17}x))$/";
    if ( preg_match( $pattern, $idNum ) )
    {
        return true;
    }
    else
    {
        return false;
    }
}
//验证密码
function pass_validate($test)
{
   $rule ='/^[a-zA-Z\d_]{6,}$/';  
    preg_match_all($rule,$test,$result);  
    return $result; 
}
?>