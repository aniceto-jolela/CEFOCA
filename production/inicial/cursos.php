<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- MENU & HEADER -->
    <?php include_once "sidebar.php"; ?>
    <!-- END  MENU & HEADER -->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Centro de Formação Cultural</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
             

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><code> CURSOS </code></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <?php include_once '../servidor/v_inicial_cursos.php'; ?>
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
      </div>
    </div>
  </body>
</html>
