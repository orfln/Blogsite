<?php
include"connect.php";

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
  add_report($name, $title, $tematyka, $content);
}
  
?>

<h2>Форма для подання повідомлення</h2>
<form method="post" action="add_report.php">  
  Name: <input type="text" name="name">
  <br><br>
  Title: <input type="text" name="title">
  <br><br>
  Report: <textarea name="content" rows="5" cols="40"></textarea>
  <br><br> 
  <input type="submit" name="submit" value="Submit">  
</form>

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


 
