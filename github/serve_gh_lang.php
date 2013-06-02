<?php
include('../dbaccess.php');
$sql = 'SELECT lang_name, count FROM github_languages WHERE user_id = 1 ORDER BY count DESC';
$res = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_assoc($res)) {
    array_push($arr, array('lang_name'=>$row['lang_name'],'count'=>$row['count']));
//    array_push($arr, array());
//    echo $row['img_url'];
}
header('Content-type: application/json');
echo json_encode(((object)array("langs"=>$arr)));
?>