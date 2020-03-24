<?php

$fileName = '../app/templates/UserTemplate.php';
$content = loadTemplate($fileName, ['title'=>$title, 'content'=>$content, 'selected'=>$selected, 'heading'=>$heading]);
$this->view($content);


?>
