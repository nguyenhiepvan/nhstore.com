<?php 

$name = array('Zent',1,2.5);
var_dump($name);
$name[]=10;
echo"<pre>";
print_r($name);
echo"</pre>";
echo"<h3> $name[0] </h3>";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title><?= $name[0]?></title>
 </head>
 <body>
 
 </body>
 </html>