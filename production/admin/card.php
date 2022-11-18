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
                <h3>Consultar <small>card</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="form-group">
                        <div class="">
                            <a href="c_card.php" class="btn btn-primary">Adicionar</a>
                            <div hidden="" class="btn btn-secondary source" id="eventoCard" onclick="new PNotify({
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
                    <h4 class="modal-title" id="myModalLabel">Dados do card</h4>
                    <button type="button" class="close" data-dismiss="modal" id="fechar"><span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="../servidor/e_card.php" id="edita_card" enctype="multipart/form-data">

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Titulo<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='optional' autocomplete="off" name="titulo" id="titulo" type="text" required="" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Sub-titulo<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='optional' autocomplete="off" name="sub" id="sub" type="text" required="" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Imagem </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="file" class="form-control" class='optional' name="file" id="file" accept=".jpg,.jpeg,.png" />
                        </div>
                        
                    </div>
                          <div style="text-align: center;color: red;" id="eventoImg"></div>
                          
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Descrição<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <textarea required="required" name='descricao' id="descricao"></textarea>
                        </div>                                        
                    </div>

                          
                    <div class="modal-footer">
                        <button type='submit' class="btn btn-primary" onclick="editarFormCard('edita_card')"> Editar</button>
                        <input type="hidden" name="ID" id="ID">
                        <input type="hidden" id="file2" name="file2">
                    </div>
                </form>

                  </div>
                  

                </div>
              </div>
            </div>
        <!-- EndLarge modal -->
        
        
    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->
    <!--JS-->
    <?php include_once "js/tables_js.php" ?>
    <?php include_once "js/evento_js.php" ?>
    <!-- Area do AJAX -->
    <script src="../servidor/ajax/c_card.js"></script>
  </body>
</html>