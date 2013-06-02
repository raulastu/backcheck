<?php
include('../dbaccess.php');
$sql = 'SELECT n_repos, n_followers FROM github_report WHERE user_id = 1';
$res = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_assoc($res)) {
    array_push($arr, array('n_repos'=>$row['n_repos'],'n_followers'=>$row['n_followers']));
//    array_push($arr, array());
//    echo $row['img_url'];
}
header('Content-type: application/json');
echo json_encode(((object)array("data"=>$arr)));
?>