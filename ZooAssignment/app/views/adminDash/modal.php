
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?php echo $type;?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>All data will be erased and there will be no way to retrieve them.</p>
              <p>Click Delete to confirm.</p>

            </div>
            <div class="modal-footer justify-content-between">
                <?php if($link!=false){?>
                <a href="<?php echo $link;?>">
                  <button class="btn btn-danger">Delete</button>
                </a>
                <?php }
                else { ?>
                  <b style="color: red;"><?php echo $message;?></b>
                <?php } ?>
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
