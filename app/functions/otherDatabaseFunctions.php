<?php

function getAreaById($id){
    $areaClass = new DatabaseTable('areas');
    $area = $areaClass->find('aid', $id);
    return $area;
}

function getLocationById($id){
    $locationClass = new DatabaseTable('locations');
    $location = $locationClass->find('lid', $id);
    return $location;
}

function getAnimalById($id){
    $animalClass = new DatabaseTable('animals');
    $animal = $animalClass->find('aid', $id);
    return $animal;
}

function checkAreaContainsLocations($aid){
  $locationClass = new DatabaseTable('locations');
  $location = $locationClass->find('larea', $aid);
  if($location->rowCount()>0)
    return true;
  return false;
}

function checkLocationContainsAnimals($lid){
  $animalClass = new DatabaseTable('animals');
  $animal = $animalClass->find('alid', $lid);
  if($animal->rowCount()>0)
    return true;
  return false;
}


function getCoverImage($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  if($obj->rowCount()>0)
    return $obj->fetch()['aifilename'];
  return false;
}

function getCoverImageId($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  if($obj->rowCount()>0)
    return $obj->fetch()['aiid'];
  return false;
}

function removeCurrentCoverImage($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  $ob=$obj->fetch()['aifilename'];
  if($obj->rowCount()>0)
  if(file_exists($ob)){unlink($ob);return true;}
  return false;
}

function getAllImage($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  if($obj->rowCount()>0)
    return $obj->fetch()['aifilename'];
  return false;
}

function getAllImages($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  if($obj->rowCount()>0)
    return $obj;
  return false;
}

function getImagesByType($aid, $type){
  global $pdo;
  $stmt = $pdo->prepare('SELECT aifilename FROM animal_images ai
                           WHERE ai.aianimal = "'.$aid.'" AND ai.aifiletype = "'.$type.'"');
  $stmt->execute();
  if($stmt->rowCount()>0)
    return $stmt->fetch()['aifilename'];
  return false;
}


function getAnimalCategoryName($aid){
  $animal=getAnimalById($aid)->fetch();
  if($animal['acategory']=="Reptile or Amphibian")
    return 'reptile_amphibian';
  else
    return strtolower($animal['acategory']);
}


function getAnimalCategoryTable($aid){
  $animal=getAnimalById($aid)->fetch();
  if($animal['acategory']=="Reptile or Amphibian")
    return 'reptile_amphibians';
  else
    return strtolower($animal['acategory']).'s';
}

function getAnimalCategoryCode($aid){
  $animal=getAnimalById($aid)->fetch();
  if($animal['acategory']=="Reptile or Amphibian")
    return 'raaid';
  else
    return strtolower(substr($animal['acategory'], 0, 1)).'aid';
}

function getAnimalCategoryPK($aid){
  $animal=getAnimalById($aid)->fetch();
  if($animal['acategory']=="Reptile or Amphibian")
    return 'raid';
  else
    return strtolower(substr($animal['acategory'], 0, 1)).'id';
}

function getCount($tbl){
  $objClass = new DatabaseTable($tbl);
  $obj = $objClass->findAll();
  return $obj->rowCount();
}

function deleteAllImages($aid){
  $imageClass=new DatabaseTable('animal_images');
  $images=$imageClass->find('aianimal',$aid)['aifilename'];
  foreach($images as $value){
    if(file_exists($value))
      unlink($value);
  }
  return $imageClass->delete('aianimal',$aid);
}

function deleteCategoryData($val){
  $catClass = new DatabaseTable(getAnimalCategoryTable($val));
  $catClass->delete(getAnimalCategoryCode($val), $val);
}

function deleteSponsorData($val){
  $sponsorClass=new DatabaseTable('sponsorships');
  return $sponsorClass->delete('said',$aid);
}

?>
