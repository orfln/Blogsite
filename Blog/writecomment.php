<?php
include"connect.php";
// define variables and set to empty values
$name = $firstname = $login = $password = $gender = "";
/*
if ($_SERVER["REQUEST_METHOD"== "POST"])
   {
    $name = $_POST["name"];    
    $title = $_POST["title"];
    $tematyka = $_POST["tematyka"];
    $content = $_POST["content"];
  //$firstname = test_input($_POST["firstname"]);
  //$login = test_input($_POST["login"]);
  //$password = test_input($_POST["password"]);
  //$gender = test_input($_POST["gender"]);
  //add_report($name, $title, $tematyka, $content);
}
*/

  $r_id=get_id();
  $r_title=$GET[title];
  /*
  session_start();
  $_SESSION['report_id'] = $r_id;
  echo $r_id;
  */
  
  function get_id(){
  $r_id=$_GET[id];
  echo "ID: ";
  echo $r_id;
  echo "<br>";
  return $r_id;
  };
  
  ?>

<h2>Форма для подання коментаря</h2>

<!--<select class='input' type='text' name="id">-->



<form method="post" action="add_comment.php?r_id=<?php echo $r_id?>">  
  Name: <input type="text" name="name">
  <br><br>
  Comment: <textarea name="content" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

include"add_report.php";

<?php
//echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $title;
echo "<br>";
echo $tematyka;
echo "<br>";
echo $content;
//echo "<br>";
//echo $gender;
?>

</body>
</html>

 
