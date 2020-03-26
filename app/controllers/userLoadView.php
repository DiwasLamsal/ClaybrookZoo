<?php

$template = "../app/templates/Breadcrumbs.php";
$breadcrumb=loadTemplate($template, ['breadcrumbContent'=>$breadcrumbContent,
'bodyTitle'=>$bodyTitle]);

$fileName = '../app/templates/UserTemplate.php';
$content = loadTemplate($fileName, ['title'=>$title,
'content'=>$content, 'selected'=>$selected,
'breadcrumb'=>$breadcrumb]);
$this->view($content);


?>
