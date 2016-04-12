<?php
/*
 * @chen
 * 一些常用的方法,包含以下方法
 * SplitBySemicolon($originalString)  通过分号分割字符串，并返回分割之后的数组
 * 
 */

/*通过分号分割字符串，并返回分割之后的数组*/
function SplitBySemicolon($originalString)
{
    $splitCollection = explode(';',$originalString);
    return $splitCollection;
}
