<?php
include('../dbaccess.php');
$sql = 'SELECT swear_count, racism_count, misspelling_count, anger_count FROM facebook_score WHERE user_id = 1 ';
$res = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_assoc($res)) {
    array_push($arr, array(
        'swear_count'=>$row['swear_count'],
        'racism_count'=>$row['racism_count'],
        'misspelling_count'=>$row['misspelling_count'],
        'anger_count'=>$row['anger_count']));
//    array_push($arr, array());
//    echo $row['img_url'];
}
header('Content-type: application/json');
echo json_encode(((object)array("data"=>$arr)));
?>
