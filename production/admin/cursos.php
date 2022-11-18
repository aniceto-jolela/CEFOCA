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
                            <a href="c_cursos.php" class="btn btn-primary">Adicionar</a>
                             <ul class="nav navbar-right panel_toolbox">
                                 <a href="../servidor/pdf_cursos.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
                              </ul>
                            <div hidden="" class="btn btn-secondary source" id="eventoCurso" onclick="new PNotify({
                                  title: '',
                                  text: '<h2>Alterado com sucesso.</h2>',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</div>
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

                  <form method="post" action="../servidor/e_curso.php" id="edita_curso">
                    <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6">
                              <input class="form-control" type="text" name="curso" autocomplete="off" id="curso" required="" />
                          </div>
                    </div>
                      <div class="field item form-group">
                       <label class="col-form-label col-md-3 col-sm-3  label-align">Duração<span class="required">*</span></label>
                       <div class="col-md-6 col-sm-6">
                           <input class="form-control" type="text" name="duracao" autocomplete="off" required="required" id="duracao" />
                       </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Preço<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="number" name="preco" autocomplete="off" min="1" required="required" id="preco" />
                        </div>
                    </div>
                      <div class="field item form-group">
                       <label class="col-form-label col-md-3 col-sm-3  label-align">Vagas<span class="required">*</span></label>
                       <div class="col-md-6 col-sm-6">
                           <input class="form-control" type="number" min="1" name="vagas" autocomplete="off" required="required" id="vagas" />
                       </div>
                    </div>

                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" onclick="editarCurso('edita_curso')">Editar</button>
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
    <script src="../servidor/ajax/c_curso.js"></script>
  </body>
</html>