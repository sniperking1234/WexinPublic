<?php
/* @chen
 * �����ݿ��ֱ�Ӳ�������װΪ��������
 * SelectQuery($query)����ѡ�����Ĳ��������ز�ѯ������飨��ά��
 * CommonQuery($query)������ɾ�����Ĳ������ɹ�����1��ʧ�ܷ���0
 */
function SelectQuery($query)
{
    //���������ļ�
    include '../config.php';
    if($debug)
    {
        echo $query;
        echo "<br>";
    }
    //�������ݿ�����
    $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
    mysqli_select_db($conn, $mysql_database);
    $result = mysqli_query($conn, $query);
    $array = array();
    while($row=mysqli_fetch_row($result))
    {
        $array[] = $row;
    }
    //�ͷ���Դ,�ر�����
    mysqli_free_result($result);
    mysqli_close($conn);
    
    //���ؽ��
    return $array;
}

function CommonQuery($query)
{
    //���������ļ�
    include '../config.php';
    if($debug)
    {
        echo $query;
        echo "<br>";
    }
    //�������ݿ�����
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