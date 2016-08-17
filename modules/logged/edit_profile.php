<!-- Modal -->
<?php

		$query_edit=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user_id']);
		
		if(mysql_num_rows($query_edit)>0){
			
			$user = mysql_fetch_array($query_edit);
			
		}

?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit profile</h4>
      </div>
     <form class="form-horizontal" role="form" action="?act=edit_profile" method="post">
      <div class="modal-body">
				      <div class="form-group">
					    <label class="control-label col-sm-3" for="pwd">Old password:</label>
					    <div class="col-sm-9"> 
					      <input type="password" name="pwd_old" class="form-control" id="pwd">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="pwd">Password:</label>
					    <div class="col-sm-9"> 
					      <input type="password" name="pwd" class="form-control" id="pwd">
					    </div>
					  </div>
					  <div class="form-group">
							    <label class="control-label col-sm-3" for="pwd_confirm">Confirm password:</label>
							    <div class="col-sm-9"> 
							      <input type="password" name="pwd_confirm" class="form-control" id="pwd_confirm">
							    </div>
							  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="name">Name:</label>
					    <div class="col-sm-9"> 
					      <input type="text" name="name" class="form-control" id="name" value="<?php echo $user['name'];?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="name">Surname:</label>
					    <div class="col-sm-9"> 
					      <input type="text" name="surname" class="form-control" id="surname" value="<?php echo $user['surname'];?>">
					    </div>
					  </div>
					  <div class="form-group">
							<label for="select" class="control-label col-sm-3">Age:</label>
							<div class="col-sm-9">
								<select class="form-control" id="select" name="age">
									<?php
		    							$age=7;
		    							while($age<=100){
		    								if((string)$user['age']==(string)$age){
		    										echo "<option selected>".$age."</option>";
		    								}else{
		    										echo "<option>".$age."</option>";
		    								}
		    								$age++;
		    							}
									?>
								</select>
							</div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="name">City:</label>
					    <div class="col-sm-9"> 
					      <input type="text" name="city" class="form-control" id="city" value="<?php echo $user['city'];?>">
					    </div>
					  </div><br>
      </div>
      <div class="modal-footer">
      	<a href="?page=delete_acc" class="btn btn-link">Delete account</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
					</form>
    </div>
  </div>
</div>