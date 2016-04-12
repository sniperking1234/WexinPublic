<?php
$mysql_server_name="localhost:3306"; //数据库服务器名称
$mysql_username="root"; // 连接数据库用户名
$mysql_password="123456"; // 连接数据库密码
$mysql_database="shujuwajue";   // 数据库的名字
$debug = 1;

$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
mysqli_select_db($conn, $mysql_database);

$query = "select distinct primaryAuthor, count(primaryAuthor) from author1 GROUP BY primaryAuthor";//查找不重复的主作者
$result = mysqli_query($conn, $query);//存到二维数组中
$array = array();
while($row=mysqli_fetch_row($result))
{
    $array[] = $row;
}
//释放资源,关闭连接
mysqli_free_result($result);

echo "finished first <br>";
foreach ($array as $single)
{
    $count = array();
    $primary = 0;
    $primary = $single[0];//取得主作者id
    $pConut = $single[1];
    echo "primary is $primary  and count is $pConut <br>";
   
    
    $query2 = "select * from author1 where primaryAuthor = $primary";//根据主作者id进行查找
    $result2 = mysqli_query($conn, $query2);
    $array2 = array();
    while($row=mysqli_fetch_row($result2))
    {
        $array2[] = $row;
    }
    mysqli_free_result($result2);
    foreach ($array2 as $single2)
    {
        for($i=0;$i<10;$i++) //取出副作者,并放入数组中
        {
            if($single2[$i+2]!=NULL)
            {   
                array_push($count,$single2[$i+2]);
            }
        }
    }

    $final = array_count_values($count);
    foreach ($final as $key=>$value)
    {
        if($value/$pConut>=0.5)
        {
            $per = $value/$pConut;
            echo "pAuthor is $key and count is $value and per is $per <br>";
        }
       
    }
    //print_r(array_count_values($count));
    echo "<br>";
}
