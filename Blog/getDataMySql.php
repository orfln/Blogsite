<?php

include"connect.php";

//$indykator=$_GET[tema];
//$id=$_GET[id];
//echo $indykator;
//if ($indykator=='0') {$sql = "SELECT ID, NAME, CONTENT, TEMATYKA, DATE FROM REPORTS";}
//else

$sql = "SELECT ID, CONTENT FROM COMMENTS ORDER BY ID DESC LIMIT 1";

$lastid = (int) isset($_GET['param']) ? $_GET['param'] : 0;
$lastid= (int) $lastid;

    $result = $con->query($sql);



    if ($row=$result->fetch_assoc()) 
      {
	// виводимо дані кожного рядка таблиці
    
	      //$currentmodif = strtotime($row["LAST_COMMENT_DATE"]);
	$currentid = (int) $row["ID"];
	if ($lastid==0) {$lastid=$currentid;}
	$content = $row["CONTENT"];
	//echo $currentmodif;
      }

while ($currentid <= $lastid) 

  {
    usleep(10000);
    clearstatcache();
     
    $result = $con->query($sql);
    $row=$result->fetch_assoc();
    
	//$currentmodif = strtotime($row["LAST_COMMENT_DATE"]);
    $currentid = (int) $row["ID"];
    $content = $row["CONTENT"];
	
	//$currentid = $lastid;
  }
  

$response = array();
$response['msg'] = "New comment: \n\n".$content;
//$id.$content;
$response['param'] = $currentid;
//(string) $currentid;
//$currentid;
//strtotime('d-m-Y H:i:s');
echo json_encode($response);

$con->close();

?>
