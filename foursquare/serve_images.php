<?php
include('../dbaccess.php');
$sql = 'SELECT badge_name, img_url FROM foursquare_badges WHERE user_id = 1';
$res = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_assoc($res)) {
    array_push($arr, array('name'=>$row['badge_name'],'url'=>$row['img_url']));
//    array_push($arr, array());
//    echo $row['img_url'];
}
header('Content-type: application/json');
echo json_encode(((object)array("images"=>$arr)));
?>