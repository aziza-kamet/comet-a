<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add post</h4>
      </div>
      <form class="form-horizontal" role="form" action="?act=add_wall_u" method="post" enctype="multipart/form-data">
        <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-sm-3" for="name"></label>
                <div class="col-sm-9">
        			    <div class="checkbox" style="float:left">
                    <label style="float:right;"><input id="img" type="checkbox" name="checkbox_img" value="img" onclick="show()">add image</label>
                  </div>
                </div>
      			  </div>
      			  <div class="form-group" id="hidden" style="display:none">
      			    <label class="control-label col-sm-3" for="name">Upload image:</label>
      			    <div class="col-sm-9"> 
      			      <span class="btn btn-default btn-file">
      			        Browse... <input class="btn" type="file" name = "image">
      			      </span>   
      			    </div>
      			  </div>
      			  <div class="form-group">
      			    <label class="control-label col-sm-3" for="name">Description:</label>
      			    <div class="col-sm-9"> 
          			    <textarea class="form-control" name="wall_text" rows="5" id="description" placeholder="Enter short description of group"></textarea>
      			    </div>
      			  </div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Add post">
          <input type="hidden" name="uid" value="<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>">
        </div>
   		</form>
    </div>
  </div>
</div>

<script type="text/javascript">
 
   function show(){
     
     if(document.getElementById("img").checked){
       
       document.getElementById("hidden").style.display = "inherit";
       
     }else{
       
       document.getElementById("hidden").style.display = "none";
       
     }
     
   }
 
</script>