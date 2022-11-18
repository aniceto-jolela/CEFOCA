<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include_once "sidebar.php" ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <?php
            $totInscricoes=0;$totCursos=0;$totVagas=0;$totNotificacoes=0;
            
            $query = "SELECT * FROM inscricoes ORDER BY id ASC";
            $ver = Inscricoes::findBySql(con(), $query);
            $query1 = "SELECT * FROM cursos ORDER BY id ASC";
            $ver1 = Cursos::findBySql(con(), $query1);
            $query2 = "SELECT * FROM notificacoes ORDER BY id ASC";
            $ver2 = Notificacoes::findBySql(con(), $query2);
          
            foreach ($ver as $i){++$totInscricoes;}
            foreach ($ver1 as $i1){++$totCursos;$totVagas+=$i1->getVagas();}
            foreach ($ver2 as $i2){++$totNotificacoes;}
          
          ?>
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?php echo $totInscricoes; ?></div>
                  <h3>Incrições</h3>
                  <p>----------------------------------------</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-indent"></i></div>
                  <div class="count"><?php echo $totCursos; ?></div>
                  <h3>Cursos</h3>
                  <p>----------------------------------------</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo $totVagas; ?></div>
                  <h3>Vagas</h3>
                  <p>----------------------------------------</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bar-chart"></i></div>
                  <div class="count"><?php echo $totNotificacoes;?></div>
                  <h3>Notificações</h3>
                  <p>----------------------------------------</p>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container" style="height:280px">
                      <!--ESTATISTICA-->
                        <div id="chart_plot_02" class="demo-placeholder"></div>
                        <!--END ESTATISTICA-->
                      </div>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-3 col-sm-12 ">
                      <div id="scroll-notificacao-home">
                        <div class="x_title">
                          <h2>NOTIFICAÇÕES</h2>
                          <div class="clearfix"></div>
                        </div>
                          
                        <ul class="list-unstyled top_profiles scroll-view">
                             <?php 
                            //Ver os cursos
                            $pquey = "SELECT * FROM notificacoes ORDER BY id DESC";
                            $pver = Notificacoes::findBySql(con(), $pquey);
                            
                            foreach ($pver as $i):
                                $vinscrito = Inscricoes::findById(con(), $i->getIdInscrito());
                                $Nome="";$Foto="";
                                
                                if(!empty($i->getIdInscrito())){
                                
                            ?>
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i>
                                    <img src="<?php echo $vinscrito->getFotografia(); ?>"  style="height:30px;margin-top: -24px;margin-left:-2px; ">
                                </i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#"><?php echo $vinscrito->getNome(); ?></a>
                              <p> <?php echo $i->getHorario(); ?> </p>
                              </p>
                            </div>
                          </li>
                            <?php }endforeach; ?>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div> 
        <!-- /page content -->

        <!-- footer content -->
         <?php include_once "footer.php" ?>
        <!-- /footer content -->
      </div>
    </div>
  </body>
</html>