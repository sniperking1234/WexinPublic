<?php
/* @chen
 * 对数据库的直接操作，封装为两个函数
 * SelectQuery($query)，对选择语句的操作，返回查询结果数组（二维）
 * CommonQuery($query)，对增删改语句的操作，成功返回1，失败返回0
 */
function SelectQuery($query)
{
    //包含配置文件
    include '../config.php';
    if($debug)
    {
        echo $query;
        echo "<br>";
    }
    //创建数据库连接
    $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
    mysqli_select_db($conn, $mysql_database);
    $result = mysqli_query($conn, $query);
    $array = array();
    while($row=mysqli_fetch_row($result))
    {
        $array[] = $row;
    }
    //释放资源,关闭连接
    mysqli_free_result($result);
    mysqli_close($conn);
    
    //返回结果
    return $array;
}

function CommonQuery($query)
{
    //包含配置文件
    include '../config.php';
    if($debug)
    {
        echo $query;
        echo "<br>";
    }
    //创建数据库连接
    $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
    mysqli_select_db($conn, $mysql_database);
    $result=mysqli_query($conn, $query);
    mysqli_close($conn);
    if($result)
    {
        return 1;
    }
    return 0;
}