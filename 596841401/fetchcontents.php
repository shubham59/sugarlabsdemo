<?php
include('db_conx.php');

if(isset($_POST['article_id'])){
	$offset = $_POST['offset'];

$article_id = $_POST['article_id'];
$sql_get_content = "select * from articles where article_id = '$article_id'";
$execute_query = mysqli_query($db_conx,$sql_get_content);
$row = mysqli_fetch_row($execute_query);
$content = $row[7];


$content_length = strlen($content);



$arr = str_split($content,$offset*2);

if($offset*2>$content_length){
$flag = "<flag=true>";
	echo $arr[0].$flag;
}else{

//$readmore = "<span id='".$article_id."readmore_fetched_content'></span>";
$to_be_cleaned = $arr[0];

$content = preg_replace('/<[^>]*$/', '', $to_be_cleaned);

//$readmore_link = '<span id="'.$article_id.'more"><a id="'.$article_id.'_'.$content_length.'_'.$raw_content_length.'"  onclick="readmore(this.id)"  href="#">....(more)</a></span>';



echo $content;}

}


?>