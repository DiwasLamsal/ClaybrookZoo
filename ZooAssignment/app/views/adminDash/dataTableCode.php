
<script src="/ZooAssignment/public/script/jquery-3.3.1.js"></script>
<script src="/ZooAssignment/public/script/jquery.dataTables.min.js"></script>
<script src="/ZooAssignment/public/script/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#listTable').DataTable({
      "scrollX": true
    });
    $('#listTable').css("max-width","100%;");
});
</script>
<style>
  #listTable{
    margin-bottom: 10px !important;
  }
</style>
