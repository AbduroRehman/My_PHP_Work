<?php

$filename = "example.txt";

$file_w = fopen($filename , "a+");
fwrite($file_w , "A paragraph is a self-contained unit of writing, consisting of one or more sentences that develop a single, central idea or topic. It acts as a building block of prose, typically comprising a topic sentence, supporting sentences, and a concludingh");
fclose($file_w);

$file = fopen($filename , "r+");
$length = filesize($filename);

echo fread($file,$length);

fclose($file);

?>

<a href="<?php echo $filename;?>" download>Download</a>

