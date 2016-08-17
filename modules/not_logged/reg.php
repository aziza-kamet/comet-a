<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="container-fluid" >
              <div class="jumbotron" style="background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8" style="text-align:center; color:#737373;">
                        <h3>Please, fill the registration form</h3>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="?act=reg" method="post">
    					  <div class="form-group">
    					    <label class="control-label col-sm-4" for="email">E-mail:</label>
    					    <div class="col-sm-6">
    					      <input type="text" name="login" class="form-control" id="login" placeholder="Enter your e-mail">
    					    </div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="login_sm" ></span><span id="hidden"></span>
    					    </div>
    					  </div>
    					  <div class="form-group">
    					    <label class="control-label col-sm-4" for="pwd">Password:</label>
    					    <div class="col-sm-6"> 
    					      <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
    					    </div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="pwd_sm" ></span>
    					    </div>
    					  </div>
    					  <div class="form-group">
					    <label class="control-label col-sm-4" for="pwd_confirm">Confirm password:</label>
					    <div class="col-sm-6"> 
					      <input type="password" name="pwd_confirm" class="form-control" id="pwd_confirm" placeholder="Re-enter password">
					    </div>
					    <div class="col-sm-6">
                            <span style="color:red;" id="pwd_confirm_sm" ></span>
					    </div>
					    </div>
    					  <div class="form-group">
    					    <label class="control-label col-sm-4" for="name">Name:</label>
    					    <div class="col-sm-6">
    					      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
    					    </div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="name_sm" ></span>
    					    </div> 
    					  </div>
    					  <div class="form-group">
    					    <label class="control-label col-sm-4" for="name">Surname:</label>
    					    <div class="col-sm-6"> 
    					      <input type="text" name="surname" class="form-control" id="surname" placeholder="Enter your surname">
    					    </div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="surname_sm" ></span>
    					    </div>
    					  </div>
    					  <div class="form-group">
            					<label for="select" class="control-label col-sm-4">Age:</label>
            					<div class="col-sm-6">
            						<select class="form-control" id="select" name="age">
            							<?php
                							$age=13;
                							while($age<=100){
                								echo "<option>".$age."</option>";
                								$age++;
                							}
            							?>
            						</select>
            					</div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="age_sm" ></span>
    					    </div>
    					  </div>
    					  <div class="form-group">
    					    <label class="control-label col-sm-4" for="name">City:</label>
    					    <div class="col-sm-6"> 
    					      <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city">
    					    </div>
    					    <div class="col-sm-6">
                                <span style="color:red;" id="city_sm" ></span>
    					    </div>
    					  </div><br>
    					  <div class="form-group"> 
    					    <div class="col-sm-offset-4 col-sm-10">
    					      <input type="submit" class="btn btn-info" value="SUBMIT" onclick="check()">
    					      <a href="?page=auth" class="btn btn-default">BACK</a>
    					    </div>
    					  </div>
    					</form>
                    </div>

                </div><br><br>
              </div> 
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>  
</div>  