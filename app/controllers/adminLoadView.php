<?php
$template = "../app/templates/admin/Breadcrumbs.php";
$breadcrumb=loadTemplate($template, ['breadcrumbContent'=>$breadcrumbContent,
'bodyTitle'=>$bodyTitle]);

$template = '../app/templates/admin/AdminTemplate.php';
$contents = [
  'title'=>$title,
  'content'=>$content,
  'breadcrumb'=>$breadcrumb
];
$content = loadTemplate($template, $contents);

$this->view($content);


?>
