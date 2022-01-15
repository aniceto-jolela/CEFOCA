<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once "sidebar.php" ?>
    <?php include_once "css/tables_css.php" ?>
      <?php include_once "css/evento_css.php" ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <h3>Consultar <small>inscritos</small></h3>
                  </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                           <div class="x_title">
                            <div class="form-group">
                                <div class="" >
                                    <label class="col-form-label col-md-1 col-sm-1  label-align" style="font-weight: 800">CURSO :</label>
                                    <div class="col-md-3 col-sm-3 ">
                                        <select class="form-control" id="cbCurso" onchange="mostrarInscritosPdf()">
                                            <option value="0">Todos</option>
                                            <?php 
                                                $pcurso = "SELECT * FROM cursos";
                                                $vcurso = Cursos::findBySql(con(), $pcurso);
                                                foreach ($vcurso as $i  ):
                                            ?>
                                            <option value="<?php echo $i->getId(); ?>"><?php echo $i->getNome(); ?></option>
                                          <?php endforeach; ?>
                                        </select>    
                                    </div>
                                    <div class="col-md-2 col-sm-2 ">
                                        <select class="form-control" id="cbEstado" onchange="mostrarInscritosPdf()">
                                            <option value="0">Todos</option>
                                            <option value="1">Apurado</option>
                                            <option value="2">Não apurado</option>
                                        </select>    
                                    </div>

                                    <a id="pdf_f" target="_blanck"><i class="fa fa-print pull-right  fa-2x"></i></a>

                                    <div hidden="" class="btn btn-secondary source" id="eventoInsc" onclick="new PNotify({
                                      title: '',
                                      text: '<h2>Passou do limite de vagas disponíves.</h2>',
                                      type: 'error',
                                      styling: 'bootstrap3'
                                    });"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                      <div class="x_content">
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <form method="post" id="mostrarDInscr" class="deleta_id">
                                        <div id="v_dados"></div>
                                    </form>
                                </div>
                                </div>
                            </div>
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
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->

    <!--JS-->
    <?php include_once "js/tables_js.php" ?>
    <?php include_once "js/evento_js.php" ?>
    <!--AJAX-->
    <script src="../servidor/ajax/c_inscricao.js"></script>
  </body>
</html>