<!-- Modal -->
<div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit profile</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" role="form" action="?act=edit_group" method="post">
    			  <div class="form-group">
    			    <label class="control-label col-sm-3" for="name">Name:</label>
    			    <div class="col-sm-9"> 
    			      <input type="text" name="name" class="form-control" id="name" value="<?php echo $group['name'];?>">
    			    </div>
    			  </div>
    			  <div class="form-group">
    			    <label class="control-label col-sm-3" for="name">Description:</label>
    			    <div class="col-sm-9"> 
        			      <textarea class="form-control" name="desc_text" rows="5" id="description"> <?php echo $group['description'];?></textarea>
    			    </div>
    			  </div><br>
    			  <input type="hidden" name="gid"  value="<?php echo $group['id'];?>" />
      </div>
      <div class="modal-footer">
          <a href="?page=delete_group&gid=<?php echo $group['id'];?>" class="btn btn-link">Delete group</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save changes"></button>
      </div>
    	</form>
    </div>
  </div>
</div>