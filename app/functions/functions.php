<?php

function loadTemplate($fileName, $templateVars) {
  extract($templateVars);
  ob_start();
  require $fileName;
  $contents = ob_get_clean();
  return $contents;
}

function generateAnimalCode($animal){
  // CAT = Category, SP = Species, YY = Year Added, RND = Random Number, L = Level   CATSPYYRNDL  MAMGO20253C
  $yy = date("y");
  // https://stackoverflow.com/questions/8215979/php-random-x-digit-number - Marcus
  $digits = 3;

  // Do not let duplicated code
  $animalClass = new DatabaseTable('animals');
  do{
    $rand = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $code = strtoupper(substr($animal['acategory'],0,3).substr($animal['aspecies'], 0, 2)).$yy.$rand.$animal['alevel'];
  }while(($animalClass->find('aid', $code)->fetch())!=false);
  return $code;
}

// https://stackoverflow.com/questions/2303372/create-a-folder-if-it-doesnt-already-exist - AndiDog
function createAnimalImageFolder($code) {
  $path = "./resources/images/animals/".$code;
  return is_dir($path) || mkdir($path, 0777);
}



function getGeneratedPassword($firstname, $lastname, $date){
  // Ram Krishna Shrestha 1990-05-15   FL-YYYY-MM-DD  RS-1990-05-15
  $pass = substr($firstname,0,1).substr($lastname, 0, 1).'-'.$date;
  return $pass;
}

// https://stackoverflow.com/questions/9612061/random-background-color-from-array-php

function generateRandomColor(){
  $colors = array('purple', 'black', 'brown', 'green', 'grey', 'CadetBlue', 'Chocolate',
                              'CornflowerBlue', 'Crimson', 'darkgoldenrod', 'DarkOliveGreen', 'DarkRed', 'DarkSlateBlue',
                               'DarkSlateGray', 'Navy', 'Olive',  'SeaGreen',  'Sienna',  'Teal', 'OliveDrab');
  return $colors[array_rand($colors)];
}



function checkDateStatus($sdate, $edate){
  $today = date("Y-m-d");
  if($edate<$today){
    return "Ended";
  }
  else if($sdate<$today && $edate>$today){
    return "Ongoing";
  }
  else{
    return "Not Started";
  }
}





?>
