<?php
include"connect.php";

$indykator=$_GET[tema];
$id=$_GET[id];
echo $indykator;
if ($indykator=='0') {$sql = "SELECT * FROM REPORTS";}
else
{$sql = "SELECT * FROM REPORTS WHERE ID=$id";};


$result = $con->query($sql);

//$myresult=mysql_fetch_array($result);

if ($result->num_rows > 0) {
// виводимо дані кожного рядка таблиці

//echo "<textarea rows=\"30\" cols=\"70\" >";
while($row = $result->fetch_assoc()) {
  
  echo "<font size=\"5em\">"."id: " . $row["ID"]. " - Name: " . $row["NAME"].'&nbsp'.'&nbsp'.'&nbsp'. 
      "Title: ".$row["TITLE"]."<br>"."<br>"."Comments: ".$row["COMNUM"]."<br>"."<br>".$row["CONTENT"].
      "<br>". "<br>"."Date: " . $row["DATE"].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'."</font>".
      "<a href=\"writecomment.php?id=".$id."\">Додати коментар</a>"."<br>"."<br>"."<br>";
    }
} else {
echo "0 results";
}

// Comments output
$sql_com = "SELECT NAME, CONTENT, DATE FROM COMMENTS WHERE REPORT_ID=$id ORDER BY DATE DESC";
$result_com = $con->query($sql_com);

echo "<br>"."Коментарі:"."<br>"."<br>";

if ($result_com->num_rows > 0) {
// виводимо дані кожного рядка таблиці
while($row_com = $result_com->fetch_assoc()) {
    echo "Name: ".$row_com["NAME"]. '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'."Date: ".$row_com["DATE"]."<br>"."<br>".
	  $row_com["CONTENT"]."<br>"."<br>"."<br>";
    }}
 else {echo "0 results";}



//   //echo "</textarea>";
$con->close();
?> 
<!DOCTYPE html PUBLIC "-//W3S//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Welcome to Comet</title>

    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" 
      type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">

      var param = 0;

      function waitForMsg(){
	$.ajax({
	  type: "GET",
	  url: "getDataMySql.php?param=" + param,
	  async: true,
	  cache: false,

	  success: function(data){
	    var json = eval('(' + data + ')');
	    if(json['msg'] != "") {
	    alert(json['msg']);
	    location.reload(true);
	    //alert(json['param']);
	    }
	    param = json['param'];
	    setTimeout('waitForMsg()',1000);
	    },
	  error: function(XMLHttpRequest, textstatus, errorThrown){
	      alert("error___: " + textstatus + " (" + errorThrown + ")");
	      setTimeout('waitForMsg()',15000);
	  }
	});
    }

    $(document).ready(function(){
	waitForMsg();
    });
    
    </script>
  </head>
  <html>
    <body>
      
      <?php echo $myresult ['textpage']; ?>
      
    </body>
  </html>
