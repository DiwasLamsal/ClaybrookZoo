<?php
$template = '../app/templates/admin/AdminTemplate.php';
$contents = [
  'title'=>$title,
  'content'=>$content
];
$content = loadTemplate($template, $contents);

$this->view($content);


?>
