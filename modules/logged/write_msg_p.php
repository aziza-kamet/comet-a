
<!-- Modal -->
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Write message</h4>
      </div>
      <form class="form-horizontal" role="form" action="?act=write_msg" method="post">
          <div class="modal-body">
        			  <div class="form-group">
        			    <label class="control-label col-sm-3" for="name">To:</label>
        			    <div class="col-sm-9"> 
        			      <input type="text" name="name" class="form-control" id="name" value="<?php echo $profile['name']." ".$profile['surname'];?>" readonly>
        			    </div>
        			  </div>
        			  <div class="form-group">
        			    <label class="control-label col-sm-3" for="name">Text:</label>
        			    <div class="col-sm-9"> 
            			      <textarea class="form-control" name="text" rows="5" id="description"></textarea>
            			      <input type="hidden" name="fid" value="<?php echo $profile['id'];?>">
        			    </div>
        			  </div><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Send">
          </div>
      </form>
    </div>
  </div>
</div>
