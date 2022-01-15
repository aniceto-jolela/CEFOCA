<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once "sidebar.php" ?>
    <?php include_once "css/tables_css.php" ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Área de <small>mensagens</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                    <div class="form-group">
                        <div class="">
                             <ul class="nav navbar-right panel_toolbox">
                                 <a href="../servidor/pdf_mensagens.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
                              </ul>
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

    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->

    <!--JS-->
    <?php include_once "js/tables_js.php" ?>
    <!--AJAX -->
    <script src="../servidor/ajax/c_mensagem.js"></script>
  </body>
</html>