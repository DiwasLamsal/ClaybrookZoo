<?php

$fileName = '../app/templates/UserTemplate.php';
$content = loadTemplate($fileName, ['title'=>$title, 'content'=>$content]);
$this->view($content);


?>
