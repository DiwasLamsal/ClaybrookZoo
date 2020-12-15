<?php

function getSponsorshipPrice($level){
  $sponsorship = [
    'A'=>2500,
    'B'=>2000,
    'C'=>1500,
    'D'=>1000,
    'E'=>500
  ];
  return $sponsorship[$level];
}



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

// https://stackoverflow.com/questions/3776682/php-calculate-age - answered Sep 23 '10 at 9:07 Sudhir Bastakoti
function getAgeFromDate1($dob){
    $dob = strtotime($dob);
    $dob=date('m/d/Y', $dob);
    //explode the date to get month, day and year
    $dob = explode("/", $dob);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md")
      ? ((date("Y") - $dob[2]) - 1)
      : (date("Y") - $dob[2]));
    return $age;
}

function getAgeFromDate($dob){
    $dob = strtotime($dob);
    $dob=date('Y-m-d', $dob);
    $dob = new DateTime($dob);
    $diff = $dob->diff(new DateTime());
    $years = $diff->format('%y');
    $months = $diff->format('%m');
    if($years==0) return $months.' months';
    return $years.' years, '.$months.' months.';
}



?>
