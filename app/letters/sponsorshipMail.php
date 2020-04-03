<?php
  $animal = getAnimalById($sponsorship['said'])->fetch();
  $sponsor = getSponsorById($sponsorship['ssid'])->fetch();
?>

<style>
@media print {
@page { margin: 0; }
body { margin: 1.6cm; }
}
</style>

<br>
<b>Date: </b><?php echo date('d-m-Y');?>
<br>
<br>
  <?php echo $sponsor['saddress'];?>
<br>
<br>
Greetings, <br>
This is Claybrook Zoo. The <?php echo '<a href = "/ZooAssignment/public/Animals/browse/'.$animal['aid'].'">'.$animal['aname'].'</a>';?>
 you sponsor is under good care.

<p>
  We write this as a reminder that the sponsorship package you bought for the animal is about to expire. The sponsorship
  lasts until <?php echo $sponsorship['senddate'];?>, and we wanted to know whether you are willing to continue sponsoring
  the animal. Please reply to this email to let us know about your sponsorship plans to extend the sponsorship.
</p>
<p>
  Please note that if we do not hear from you by <b>November-15</b>, we will have to assume that you are no more interested
  in continuing the sponsorship. If that happens, we will have to search for a new sponsor for the animal and will list it
  as available for sponsorship.
</p>

<br>
Yours Sincerely, <br>

<?php
if(session_status() == PHP_SESSION_NONE)session_start();
echo $_SESSION['loggedin']['ufullname'];?>. <br><br>

<p style ="text-align: center;">
  <a href = "/ZooAssignment/public/">Claybrook Zoo</a></p>


<?php
  if(isset($print)){
?>
  <script>
    window.print();
  </script>
<?php
  }
?>
