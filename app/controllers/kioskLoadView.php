<?php
$template = "../app/templates/KioskBreadcrumbs.php";
$breadcrumb=loadTemplate($template, ['breadcrumbContent'=>$breadcrumbContent,
'bodyTitle'=>$bodyTitle]);
$fileName = '../app/templates/KioskTemplate.php';
$content = loadTemplate($fileName, ['title'=>$title,
'content'=>$content, 'selected'=>$selected,
'breadcrumb'=>$breadcrumb]);
$this->view($content);
?>
