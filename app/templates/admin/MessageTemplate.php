
<?php
$m="";
  switch ($message) {
    case 'addsuccess':
      $m="Successfully Added Record";
      break;
    case 'editsuccess':
      $m="Successfully Edited Record";
      break;
    case 'editimagesuccess':
      $m="Successfully Edited Image";
      break;
    case 'deletesuccess':
      $m="Successfully Deleted Record";
      break;
    case 'archivesuccess':
      $m="Successfully Archived Record";
      break;
    case 'featuresuccess':
      $m="Successfully Featured Animal";
      break;
    case 'nosuchanimal':
      $m="No Such Animal was Found";
      break;
    case 'nosucharea':
      $m="No Such Area was Found";
      break;
    case 'nosuchlocation':
      $m="No Such Location was Found";
      break;
    case 'nosuchevent':
      $m="No Such Event was Found";
      break;
    case 'nosuchsponsor':
      $m="No Such Sponsor was Found";
      break;
    case 'nosuchsponsorship':
      $m="No Such Sponsorship was Found";
      break;
    case 'nosuchsponsorship':
      $m="No Such Sponsorship was Found";
      break;
    case 'nosuchuser':
      $m="No Such User was Found";
      break;
    case 'nosuchwatchlist':
      $m="No Such Watchlist Record was Found";
      break;
    default:
      // code...
      break;
  }

if($m!=""){
?>

<div class = "text-right">
  <p>
    <?php echo $m;?>
  </p><br>
</div>

<?php } ?>
