<?php

if(isset($animal)){
  $image=getImagesByType($animal['aid'],'Cover')->fetch()['aifilename'];
?>


















<?php } else {?>
  <h1> Error! The Page You Were Looking For Was Not Found. 😥
<?php } ?>
