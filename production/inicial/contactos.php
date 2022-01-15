
<?php
    include_once '../servidor/conectar.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
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

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CEFOCA</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 ">
                      <div class="product-image">
                        <img src="../root/images/contacto.jpg" alt="..." />
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                      <h1 class="prod_title">CONTACTOS:</h1>

                      <?php 
                        //Ver os usuarios
                        $query = "SELECT * FROM endereco ORDER BY id ASC";
                        $ver = Endereco::findBySql(con(), $query);
                        foreach ($ver as $i):

                        ?>
                            <h2><?php echo $i->getDescricao(); ?></h2>
                            <h2><i class="fa fa-phone-square"></i> contactos: <?php echo $i->getTelefone(); ?></h2>
                            <h2><i class="fa fa-facebook-square"> <?php echo $i->getFacebook(); ?></i></h2>
                            <h2><i class="fa fa-envelope"> <?php echo $i->getEmail(); ?> </i></h2>
                       <?php endforeach; ?>
                      
                      <div class="ln_solid"></div>
                      
                      <form class="" action="../servidor/c_mensagem.php" id="mensagem" method="post" >
                          <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">menssagem</label>
                              <div class="col-md-6 col-sm-6">
                                  <textarea required="required" name='descricao' id="sms"></textarea>
                              </div>
                          </div>
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' id="enviar" class="btn btn-primary" onclick="cadastrarMensagem('mensagem')">Enviar</button>
                                    <img id="progresso">
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          


        </div>
        <!-- /page content -->
        <!-- AJAX-->
        <script src="../servidor/ajax/c_mensagem.js"></script>
         <!-- footer content -->
         <?php include_once "footer.php"; ?>
        <!-- /footer content -->
      </div>
    </div>
  </body>
</html>