<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="container-fluid">
              <div class="jumbotron" style="background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h2>Are you sure you want to delete group?</h2>
                        <form action="?act=delete_group" method="post">
                            <div class="containe">		
                              <input type="hidden" name="gid" value="<?php echo $_GET['gid'];?>" />
    						  <input type="submit" class="btn btn-default" value="Yes"> 
    						  <a href="?page=my_group&gid=<?php echo $_GET['gid'];?>" class="btn btn-info" role="button">No</a>
    					    </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <br><br>
              </div> 
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>  
    
</div>