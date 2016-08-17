<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="container-fluid">
              <div class="jumbotron" style="background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                      <center>
                        <h3>Welcome to Comet-A</h3>
                      </center>  
                    </div>
                </div>
                <br><br>
                <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                    <?php
                      if(isset($_GET["error"]) && $_GET["error"]==1){
                    ?>
                      <div class="alert alert-danger" role="danger">Incorrect login or password</div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <form role="form" action="?act=auth" method="post">
                          <div class="form-group">
                            <label>Login:</label>
                            <input type="text" class="form-control" id="login" name="login">
                          </div>
                          <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                          </div>
                          <div class="containe">							  	
    						  <input type="submit" class="btn btn-info" value="Log in"> 
    						  <button type="button" class="btn btn-link disabled" style="color:black"> or </button>
    						  <a href="?page=reg" class="btn btn-default" role="button">Sign up</a>
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