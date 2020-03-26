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

function checkGlobalImageExists($aid){
  global $pdo;
  $stmt = $pdo->prepare('SELECT * FROM animal_images ai
                           WHERE ai.aianimal = "'.$aid.'" AND ai.aifiletype = "Global"');
  $stmt->execute();
  if($stmt->rowCount()>0)
    return true;
  return false;
}

function getGlobalImage($aid){
  global $pdo;
  $stmt = $pdo->prepare('SELECT * FROM animal_images ai
                           WHERE ai.aianimal = "'.$aid.'" AND ai.aifiletype = "Global"');
  $stmt->execute();
  if($stmt->rowCount()>0)
    return $stmt->fetch();
  return false;
}

function getCoverImage($aid){
  global $pdo;
  $stmt = $pdo->prepare('SELECT * FROM animal_images ai
                           WHERE ai.aianimal = "'.$aid.'" AND ai.aifiletype = "Cover"');
  $stmt->execute();
  if($stmt->rowCount()>0)
    return $stmt->fetch();
  return false;
}

function removeCurrentImageFiles($aid){
  $objClass = new DatabaseTable('animal_images');
  $ob = getCoverImage($aid);
  $obj = $objClass->find('aianimal', $aid);
  $path="/ZooAssignment/public/";
    while($ob=$obj->fetch()){
      if(file_exists($ob['aifilename'])){unlink($ob['aifilename']);}
      if(file_exists($path.$ob['aifilename'])){unlink($path.$ob['aifilename']);}
    }
  return false;
}

function deleteImagesByType($aid, $type){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->find('aianimal', $aid);
  $path="/ZooAssignment/public/";
  while($ob=$obj->fetch()){
    if($ob['aifiletype']!=$type)continue;
    if(file_exists($ob['aifilename'])){unlink($ob['aifilename']);}
    if(file_exists($path.$ob['aifilename'])){unlink($path.$ob['aifilename']);}
    $objClass->delete('aiid', $ob['aiid']);
  }
}

function removeCurrentCoverImageFile($aid){
  $objClass = new DatabaseTable('animal_images');
  $ob = getCoverImage($aid);
  $obj = $objClass->find('aianimal', $aid);
  $path="/ZooAssignment/public/";
    while($ob=$obj->fetch()){
      if($ob['aifiletype']!="Cover")continue;
      if(file_exists($ob['aifilename'])){unlink($ob['aifilename']);}
      if(file_exists($path.$ob['aifilename'])){unlink($path.$ob['aifilename']);}
    }
}

function removeCurrentGlobalImageFile($aid){
  $objClass = new DatabaseTable('animal_images');
  $ob = getGlobalImage($aid);
  $obj = $objClass->find('aianimal', $aid);
  $path="/ZooAssignment/public/";
    while($ob=$obj->fetch()){
      if($ob['aifiletype']!="Global")continue;
      if(file_exists($ob['aifilename'])){unlink($ob['aifilename']);}
      if(file_exists($path.$ob['aifilename'])){unlink($path.$ob['aifilename']);}
    }
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
  $stmt = $pdo->prepare('SELECT * FROM animal_images ai
                           WHERE ai.aianimal = "'.$aid.'" AND ai.aifiletype = "'.$type.'"');
  $stmt->execute();
  if($stmt->rowCount()>0)
    return $stmt;
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
  elseif($animal['acategory']=="Fish")
    return 'fish';
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

// https://dcblog.dev/delete-folders-from-server-using-php
function deleteDir($dirname) {
  $dir_handle=false;
  if (is_dir($dirname)){
    $dir_handle = opendir($dirname);
  }
  if (!$dir_handle){
    return false;
  }
  while($file = readdir($dir_handle)) {
    if ($file != "." && $file != "..") {
      if (!is_dir($dirname."/".$file))
        unlink($dirname."/".$file);
      else
        delete_directory($dirname.'/'.$file);
    }
  }
  closedir($dir_handle);
  rmdir($dirname);
  return true;
}

function deleteAllImages($aid){
  $objClass = new DatabaseTable('animal_images');
  $obj = $objClass->delete('aianimal', $aid);

  $path="/ZooAssignment/public/";
  $pathSecond="resources/images/animals/".$aid;
  deleteDir($path.$pathSecond);
  deleteDir($pathSecond);

}

function deleteCategoryData($val){
  $catClass = new DatabaseTable(getAnimalCategoryTable($val));
  $catClass->delete(getAnimalCategoryCode($val), $val);
}

function deleteSponsorData($val){
  $sponsorClass=new DatabaseTable('sponsorships');
  return $sponsorClass->delete('said',$val);
}

function removeCurrentFeaturedAnimal(){
  global $pdo;
  $stmt = $pdo->prepare('UPDATE animals SET afeatured = "No"
                           WHERE afeatured = "Yes";');
  $stmt->execute();
}


// https://stackoverflow.com/questions/26270237/php-mysql-search-with-multiple-criteria - gahse
function findSearchedAnimals($criteria){
    global $pdo;
    extract($criteria);

    $q = "SELECT * FROM animals a INNER JOIN locations l ON a.alid = l.lid WHERE astatus='Active' ";

    if(isset($location) && !empty($location)){
        $q .= " AND (a.alid = '$location')";
    }

    if(isset($area) && !empty($area)){
      $q .= " AND l.larea = '$area'";
    }

    if(isset($category) && !empty($category)){
      $category=str_replace("_", " ", $category);
      $q .= " AND a.acategory='$category'";
    }

    if(isset($name) && !empty($name)){
      $q .= " AND a.aname LIKE '%$name%'";
    }

    if(isset($sort) && !empty($sort)){
      $q .= " ORDER BY $sort DESC;";
    }
    // $q .= " ORDER BY a.adateofjoin DESC LIMIT $per_page , $start;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
    return $stmt;
}


function checkAnimalContainsSponsorship($id){
  $spClass = new DatabaseTable('sponsorships');
  $sp = $spClass->find('said', $id);
  if($sp->rowCount()>0)
    return true;
  return false;
}





?>
