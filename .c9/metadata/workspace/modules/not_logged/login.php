{"changed":true,"filter":false,"title":"login.php","tooltip":"/modules/not_logged/login.php","ace":{"folds":[],"scrolltop":319,"scrollleft":0,"selection":{"start":{"row":39,"column":30},"end":{"row":39,"column":30},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":14,"state":"start","mode":"ace/mode/php"}},"hash":"827052b6494a5c065e75b70310e182ec3edf402a","value":"<div class=\"container-fluid\">\n    <div class=\"row\">\n        <div class=\"col-md-3\"></div>\n        <div class=\"col-md-6\" >\n            <div class=\"container-fluid\">\n              <div class=\"jumbotron\" style=\"background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;\">\n                <div class=\"row\">\n                    <div class=\"col-md-offset-1 col-md-10\">\n                      <center>\n                        <h3>Welcome to Comet-A</h3>\n                      </center>  \n                    </div>\n                </div>\n                <br><br>\n                <div class=\"row\">\n                  <div class=\"col-md-offset-3 col-md-6\">\n                    <?php\n                      if(isset($_GET[\"error\"]) && $_GET[\"error\"]==1){\n                    ?>\n                      <div class=\"alert alert-danger\" role=\"danger\">Incorrect login or password</div>\n                    <?php\n                      }\n                    ?>\n                  </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-md-offset-3 col-md-6\">\n                        <form role=\"form\" action=\"?act=auth\" method=\"post\">\n                          <div class=\"form-group\">\n                            <label>Login:</label>\n                            <input type=\"text\" class=\"form-control\" id=\"login\" name=\"login\">\n                          </div>\n                          <div class=\"form-group\">\n                            <label>Password:</label>\n                            <input type=\"password\" class=\"form-control\" id=\"pwd\" name=\"pwd\">\n                          </div>\n                          <div class=\"containe\">\t\t\t\t\t\t\t  \t\n    \t\t\t\t\t\t  <input type=\"submit\" class=\"btn btn-info\" value=\"Log in\"> \n    \t\t\t\t\t\t  <button type=\"button\" class=\"btn btn-link disabled\" style=\"color:black\"> or </button>\n    \t\t\t\t\t\t  <a href=\"?page=reg\" class=\"btn btn-default\" role=\"button\">Sign up</a>\n    \t\t\t\t\t  </div>\n                        </form>\n                    </div>\n                </div><br><br>\n              </div> \n            </div>\n        </div>\n        <div class=\"col-md-3\"></div>\n    </div>  \n    \n</div>","undoManager":{"mark":-1,"position":-1,"stack":[]},"timestamp":1462122563000}