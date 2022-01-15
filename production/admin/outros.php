<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

<!DOCTYPE html>
<html lang="pt-br">
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
                <h3>Consultar <small>cursos</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="form-group">
                        <div class="">
                            <a href="c_outro.php" class="btn btn-primary">Adicionar</a>
                            <div hidden="" class="btn btn-secondary source" id="eventoOutro" onclick="new PNotify({
                                  title: '',
                                  text: '<h2>Alterado com sucesso.</h2>',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <form method="post" id="mostrarD" class="deleta_id">
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
        <!-- /page content -->

        <!-- Large modal -->
                
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Dados do curso</h4>
                <button type="button" class="close" data-dismiss="modal" id="fechar"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="../servidor/e_outro.php" id="edita_UniaoCurso" >
                   <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="curso" id="curso" required="">
                                <?php 
                                    $pcurso = "SELECT * FROM cursos";
                                    $vcurso = Cursos::findBySql(con(), $pcurso);
                                    foreach ($vcurso as $i  ):

                                ?>
                                <option value="<?php echo $i->getId(); ?>"><?php echo $i->getNome(); ?></option>
                              <?php endforeach; ?>
                            </select>    
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Dias da Semana<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='optional' name="semana" id="semana" type="text" required="" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Horário<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="horario" id="horario" required="">
                                <?php 
                                    $phorario = "SELECT * FROM horarios";
                                    $vhorario = Horarios::findBySql(con(), $phorario);
                                    foreach ($vhorario as $i2  ):

                                ?>
                                <option value="<?php echo $i2->getId() ?>"><?php echo $i2->getInicio() ." - ".$i2->getFinal(); ?></option>
                              <?php endforeach; ?>
                            </select>    
                        </div>
                    </div>

                   <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="editarUniaoCurso('edita_UniaoCurso')">Editar</button>
                        <input type="hidden" name="ID" id="ID">
                        <input type="reset" id="limpar" style="display: none">
                    </div>
                </form>

              </div>

            </div>
          </div>
        </div>
        
    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->

    <!--JS-->
    <?php include_once "js/tables_js.php" ?>
    <?php include_once "js/evento_js.php" ?>
    <!--AJAX-->
    <script src="../servidor/ajax/c_outro.js"></script>
  </body>
</html>