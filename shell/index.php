<?php 
    $path_to_file = 'shell.html';
    foreach(glob('*.html') as $filename){    
        $file_contents = file_get_contents($path_to_file);
        $file_put_content = file_get_contents($filename);
        $file_contents = str_replace("[".$filename."]",$file_put_content,$file_contents);
        file_put_contents($path_to_file,$file_contents);
    }

    header("Location: download.php");
?>