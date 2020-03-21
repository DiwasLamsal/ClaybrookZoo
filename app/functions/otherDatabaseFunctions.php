<?php

function getAreaById($id){
    $areaClass = new DatabaseTable('areas');
    $area = $areaClass->find('aid', $id);
    return $area;
}



?>
