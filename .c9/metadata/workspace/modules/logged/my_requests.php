{"filter":false,"title":"my_requests.php","tooltip":"/modules/logged/my_requests.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":40,"column":63},"end":{"row":40,"column":64},"action":"insert","lines":["y"],"id":181}],[{"start":{"row":40,"column":64},"end":{"row":40,"column":65},"action":"insert","lines":["m"],"id":182}],[{"start":{"row":40,"column":65},"end":{"row":40,"column":66},"action":"insert","lines":["b"],"id":183}],[{"start":{"row":40,"column":66},"end":{"row":40,"column":67},"action":"insert","lines":["a"],"id":184}],[{"start":{"row":40,"column":67},"end":{"row":40,"column":68},"action":"insert","lines":["t"],"id":185}],[{"start":{"row":0,"column":0},"end":{"row":57,"column":8},"action":"remove","lines":["<table class=\"table\">","  <thead>","    <tr>","      <td><br>","          <div class=\"row\">","              <div class=\"col-md-4\">","                <img class=\"img-responsive img-thumbnail\" src=\"images/1.png\" width=\"100%\"><br>","              </div>","              <div class=\"col-md-8\">","                  <table class=\"table\">","                            <thead>","                              <tr>","                                <th><h4><a href=\"#\">Mukhammedkarim Damir</a></h4></th>","                              </tr>","                            </thead>","                            <tbody>","                              <tr>","                                <td>Sent date: 10.06.15</td>","                              </tr>","                            </tbody>","                  </table><br>","                    <div class=\"containe\">","    \t\t\t\t  <button class=\"btn btn-default\">Cancel request</button>","    \t\t\t    </div>","              </div>","          </div><br>","      </td>","    </tr>","  </thead>","  <tbody>","    <tr>","      <td><br>","          <div class=\"row\">","              <div class=\"col-md-4\">","                <img class=\"img-responsive img-thumbnail\" src=\"images/1.png\" width=\"100%\"><br>","              </div>","              <div class=\"col-md-8\">","                  <table class=\"table\">","                            <thead>","                              <tr>","                                <th><h4><a href=\"#\">Zhaksylyk Symbat</a></h4></th>","                              </tr>","                            </thead>","                            <tbody>","                              <tr>","                                <td>Sent date: 10.06.15</td>","                              </tr>","                            </tbody>","                  </table><br>","                  <div class=\"containe\">","    \t\t\t\t  <button class=\"btn btn-default\">Cancel request</button>","    \t\t\t  </div>","              </div>","          </div>","      </td>","    </tr>","  </tbody>","</table>"],"id":189},{"start":{"row":0,"column":0},"end":{"row":95,"column":0},"action":"insert","lines":["<table class=\"table\">","<?php","","        $query_req=mysql_query(\"SELECT r.*, u.name, u.surname, u.avatar","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t FROM requests r","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t LEFT OUTER JOIN users u ON u.id = r.u_id","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t WHERE r.f_id=\".$_SESSION['user_id'].\" AND r.state=1 AND u.state = 1\");","","       ","        ","        if(mysql_num_rows($query_req)){","","\t\t\t\t\t\t\t\t\t\t\twhile($req = mysql_fetch_array($query_req)){","\t\t\t\t\t\t\t\t\t\t\t ","\t\t\t\t\t\t\t\t\t\t\t ","\t\t?>","          ","                      <thead  id=\"req<?php echo $req['u_id'];?>\">","                        <tr>","                          <td><br>","                              <div class=\"row\">","                                  <div class=\"col-md-4\">","                                    <img class=\"img-responsive img-thumbnail\" src=\"images/<?php echo $req['avatar'];?>\" width=\"100%\"><br>","                                  </div>","                                  <div class=\"col-md-8\">","                                      <table class=\"table\">","                                                <thead>","                                                  <tr>","                                                  <th><h4><a href=\"?page=profile&uid=<?php echo $req['u_id'];?>\"><?php echo $req['name'].\" \".$req['surname'];?></a></h4></th>","                                                  </tr>","                                                </thead>","                                                <tbody>","                                                  <tr>","                                                    <td>Sent date: <?php echo $req['sent_date'];?></td>","                                                  </tr>","                                                </tbody>","                                      </table><br>","                                        <div class=\"containe\">","                                          ","                                          <button id=\"accept\" class=\"btn btn-default\" onclick=\"accept_req(<?php echo $req['u_id'];?>)\">Accept request</button>","                                          <button id=\"deny\" class=\"btn btn-default\" onclick=\"deny_req(<?php echo $req['u_id'];?>)\">Deny request</button>","        ","                                \t\t\t  </div>","                                  </div>","                              </div><br>","                          </td>","                        </tr>","                      </thead>","                      "," <script type=\"text/javascript\">","  ","  function accept_req(f_id){","    ","    $.post(\"ajax/controller.php?act=accept_req\",{","      ","        fid: f_id","        ","      },","      function(data){","        ","        ","      }","    );","    ","    document.getElementById(\"req<?php echo $req['u_id'];?>\").style.display = \"none\";","    ","  }","   function deny_req(f_id){","    ","    $.post(\"ajax/controller.php?act=deny_req\",{","      ","        fid: f_id","        ","      },","      function(data){","        ","        ","      }","    );","    ","    document.getElementById(\"req<?php echo $req['u_id'];?>\").style.display = \"none\";","    ","  }","  ","  ","</script>","<?php","\t\t\t\t\t\t\t\t\t\t\t}","\t\t\t\t\t\t\t\t\t\t\t","            }\t\t\t\t","","?>  ","","</table>","",""]}],[{"start":{"row":6,"column":25},"end":{"row":6,"column":26},"action":"remove","lines":["f"],"id":191}],[{"start":{"row":6,"column":25},"end":{"row":6,"column":26},"action":"insert","lines":["u"],"id":192}],[{"start":{"row":39,"column":158},"end":{"row":40,"column":152},"action":"remove","lines":["","                                          <button id=\"deny\" class=\"btn btn-default\" onclick=\"deny_req(<?php echo $req['u_id'];?>)\">Deny request</button>"],"id":193}],[{"start":{"row":39,"column":135},"end":{"row":39,"column":141},"action":"remove","lines":["Accept"],"id":194},{"start":{"row":39,"column":135},"end":{"row":39,"column":136},"action":"insert","lines":["C"]}],[{"start":{"row":39,"column":136},"end":{"row":39,"column":137},"action":"insert","lines":["a"],"id":195}],[{"start":{"row":39,"column":137},"end":{"row":39,"column":138},"action":"insert","lines":["n"],"id":196}],[{"start":{"row":39,"column":138},"end":{"row":39,"column":139},"action":"insert","lines":["c"],"id":197}],[{"start":{"row":39,"column":139},"end":{"row":39,"column":140},"action":"insert","lines":["e"],"id":198}],[{"start":{"row":39,"column":140},"end":{"row":39,"column":141},"action":"insert","lines":["l"],"id":199}],[{"start":{"row":39,"column":95},"end":{"row":39,"column":101},"action":"remove","lines":["accept"],"id":200},{"start":{"row":39,"column":95},"end":{"row":39,"column":96},"action":"insert","lines":["c"]}],[{"start":{"row":39,"column":96},"end":{"row":39,"column":97},"action":"insert","lines":["a"],"id":201}],[{"start":{"row":39,"column":97},"end":{"row":39,"column":98},"action":"insert","lines":["n"],"id":202}],[{"start":{"row":39,"column":98},"end":{"row":39,"column":99},"action":"insert","lines":["c"],"id":203}],[{"start":{"row":39,"column":99},"end":{"row":39,"column":100},"action":"insert","lines":["e"],"id":204}],[{"start":{"row":39,"column":100},"end":{"row":39,"column":101},"action":"insert","lines":["l"],"id":205}],[{"start":{"row":39,"column":54},"end":{"row":39,"column":60},"action":"remove","lines":["accept"],"id":206},{"start":{"row":39,"column":54},"end":{"row":39,"column":55},"action":"insert","lines":["c"]}],[{"start":{"row":39,"column":55},"end":{"row":39,"column":56},"action":"insert","lines":["a"],"id":207}],[{"start":{"row":39,"column":56},"end":{"row":39,"column":57},"action":"insert","lines":["n"],"id":208}],[{"start":{"row":39,"column":57},"end":{"row":39,"column":58},"action":"insert","lines":["c"],"id":209}],[{"start":{"row":39,"column":58},"end":{"row":39,"column":59},"action":"insert","lines":["e"],"id":210}],[{"start":{"row":39,"column":59},"end":{"row":39,"column":60},"action":"insert","lines":["l"],"id":211}],[{"start":{"row":65,"column":3},"end":{"row":81,"column":3},"action":"remove","lines":["","   function deny_req(f_id){","    ","    $.post(\"ajax/controller.php?act=deny_req\",{","      ","        fid: f_id","        ","      },","      function(data){","        ","        ","      }","    );","    ","    document.getElementById(\"req<?php echo $req['u_id'];?>\").style.display = \"none\";","    ","  }"],"id":212}],[{"start":{"row":50,"column":11},"end":{"row":50,"column":17},"action":"remove","lines":["accept"],"id":213},{"start":{"row":50,"column":11},"end":{"row":50,"column":12},"action":"insert","lines":["c"]}],[{"start":{"row":50,"column":12},"end":{"row":50,"column":13},"action":"insert","lines":["a"],"id":214}],[{"start":{"row":50,"column":13},"end":{"row":50,"column":14},"action":"insert","lines":["n"],"id":215}],[{"start":{"row":50,"column":14},"end":{"row":50,"column":15},"action":"insert","lines":["c"],"id":216}],[{"start":{"row":50,"column":15},"end":{"row":50,"column":16},"action":"insert","lines":["e"],"id":217}],[{"start":{"row":50,"column":16},"end":{"row":50,"column":17},"action":"insert","lines":["l"],"id":218}],[{"start":{"row":52,"column":36},"end":{"row":52,"column":42},"action":"remove","lines":["accept"],"id":219},{"start":{"row":52,"column":36},"end":{"row":52,"column":37},"action":"insert","lines":["c"]}],[{"start":{"row":52,"column":37},"end":{"row":52,"column":38},"action":"insert","lines":["a"],"id":220}],[{"start":{"row":52,"column":38},"end":{"row":52,"column":39},"action":"insert","lines":["n"],"id":221}],[{"start":{"row":52,"column":39},"end":{"row":52,"column":40},"action":"insert","lines":["c"],"id":222}],[{"start":{"row":52,"column":40},"end":{"row":52,"column":41},"action":"insert","lines":["e"],"id":223}],[{"start":{"row":52,"column":41},"end":{"row":52,"column":42},"action":"insert","lines":["l"],"id":224}],[{"start":{"row":52,"column":4},"end":{"row":61,"column":6},"action":"remove","lines":["$.post(\"ajax/controller.php?act=cancel_req\",{","      ","        fid: f_id","        ","      },","      function(data){","        ","        ","      }","    );"],"id":225},{"start":{"row":52,"column":4},"end":{"row":61,"column":6},"action":"insert","lines":["$.post(\"ajax/controller.php?act=cancel_req\",{","      ","        fid: f_id","        ","      },","      function(data){","        ","        ","      }","    );"]}],[{"start":{"row":50,"column":0},"end":{"row":50,"column":28},"action":"remove","lines":["  function cancel_req(f_id){"],"id":226},{"start":{"row":50,"column":0},"end":{"row":50,"column":28},"action":"insert","lines":["  function cancel_req(f_id){"]}],[{"start":{"row":6,"column":84},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":227},{"start":{"row":7,"column":0},"end":{"row":7,"column":17},"action":"insert","lines":["\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t "]}],[{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"insert","lines":["O"],"id":228}],[{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"insert","lines":["R"],"id":229}],[{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"insert","lines":["D"],"id":230}],[{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["E"],"id":231}],[{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"insert","lines":["R"],"id":232}],[{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"insert","lines":[" "],"id":233}],[{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"insert","lines":["B"],"id":234}],[{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"insert","lines":["Y"],"id":235}],[{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"insert","lines":[" "],"id":236}],[{"start":{"row":7,"column":26},"end":{"row":7,"column":27},"action":"insert","lines":["r"],"id":237}],[{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"insert","lines":["."],"id":238}],[{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"insert","lines":["s"],"id":239}],[{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"insert","lines":["e"],"id":240}],[{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"insert","lines":["n"],"id":241}],[{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"insert","lines":["t"],"id":242}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["+"],"id":243}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"remove","lines":["+"],"id":244}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["_"],"id":245}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":["d"],"id":246}],[{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["a"],"id":247}],[{"start":{"row":7,"column":35},"end":{"row":7,"column":36},"action":"insert","lines":["t"],"id":248}],[{"start":{"row":7,"column":36},"end":{"row":7,"column":37},"action":"insert","lines":["e"],"id":249}],[{"start":{"row":7,"column":37},"end":{"row":7,"column":38},"action":"insert","lines":[" "],"id":250}],[{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"insert","lines":["D"],"id":251}],[{"start":{"row":7,"column":39},"end":{"row":7,"column":40},"action":"insert","lines":["E"],"id":252}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"insert","lines":["C"],"id":253}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"insert","lines":["S"],"id":254}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"remove","lines":["S"],"id":255}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"remove","lines":["C"],"id":256}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"insert","lines":["S"],"id":257}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"insert","lines":["C"],"id":258}],[{"start":{"row":6,"column":84},"end":{"row":7,"column":42},"action":"remove","lines":["","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t ORDER BY r.sent_date DESC"],"id":259}],[{"start":{"row":5,"column":53},"end":{"row":5,"column":54},"action":"remove","lines":["u"],"id":260}],[{"start":{"row":5,"column":53},"end":{"row":5,"column":54},"action":"insert","lines":["f"],"id":261}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"remove","lines":["u"],"id":262}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"insert","lines":["f"],"id":263}],[{"start":{"row":39,"column":123},"end":{"row":39,"column":124},"action":"remove","lines":["u"],"id":264}],[{"start":{"row":39,"column":123},"end":{"row":39,"column":124},"action":"insert","lines":["f"],"id":265}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"remove","lines":["f"],"id":266}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"insert","lines":["u"],"id":267}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"remove","lines":["u"],"id":268}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"insert","lines":["f"],"id":269}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"remove","lines":["f"],"id":270}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"insert","lines":["u"],"id":271}],[{"start":{"row":63,"column":49},"end":{"row":63,"column":50},"action":"remove","lines":["u"],"id":272}],[{"start":{"row":63,"column":49},"end":{"row":63,"column":50},"action":"insert","lines":["f"],"id":273}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"remove","lines":["u"],"id":274}],[{"start":{"row":17,"column":54},"end":{"row":17,"column":55},"action":"insert","lines":["f"],"id":275}],[{"start":{"row":17,"column":23},"end":{"row":17,"column":24},"action":"remove","lines":["t"],"id":276}],[{"start":{"row":17,"column":23},"end":{"row":17,"column":24},"action":"insert","lines":["t"],"id":277}],[{"start":{"row":28,"column":102},"end":{"row":28,"column":103},"action":"remove","lines":["u"],"id":278}],[{"start":{"row":28,"column":102},"end":{"row":28,"column":103},"action":"insert","lines":["f"],"id":279}],[{"start":{"row":63,"column":32},"end":{"row":63,"column":58},"action":"remove","lines":["<?php echo $req['f_id'];?>"],"id":280}],[{"start":{"row":63,"column":33},"end":{"row":63,"column":34},"action":"insert","lines":["+"],"id":281}],[{"start":{"row":63,"column":34},"end":{"row":63,"column":35},"action":"insert","lines":["f"],"id":282}],[{"start":{"row":63,"column":35},"end":{"row":63,"column":36},"action":"insert","lines":["_"],"id":283}],[{"start":{"row":63,"column":36},"end":{"row":63,"column":37},"action":"insert","lines":["i"],"id":284}],[{"start":{"row":63,"column":37},"end":{"row":63,"column":38},"action":"insert","lines":["d"],"id":285}]]},"ace":{"folds":[],"scrolltop":600,"scrollleft":0,"selection":{"start":{"row":63,"column":56},"end":{"row":63,"column":56},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":26,"state":"start","mode":"ace/mode/php"}},"timestamp":1434866543607,"hash":"968aaee4a372061ab675d772dca8dca78108453a"}