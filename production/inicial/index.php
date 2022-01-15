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

            <?php 
                //Ver os Cards
                $query = "SELECT * FROM card ORDER BY id ASC";
                $ver = Card::findBySql(con(), $query);
                $id2 = 0;
                $foto1 = '../root/images/card/card.png';
                $foto2 = '../root/images/card/card.png';
                $foto3 = '../root/images/card/card.png';
                $foto4 = '../root/images/card/card.png';
                foreach ($ver as $ft){
                    if($id2==1){$foto1=$ft->getImagem();}
                    if($id2==2){$foto2=$ft->getImagem();}
                    if($id2==3){$foto3=$ft->getImagem();}
                    if($id2==4){$foto4=$ft->getImagem();}++$id2;
                }
                //id - Contador
                $id = 0;
                foreach ($ver as $i):

            ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                      <h2><?php echo $i->getTitulo(); ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 ">
                      <div class="product-image">
                          <img src="<?php echo $i->getImagem(); ?>" alt="..." />
                      </div>
                      <div class="product_gallery">
                          <?php if($id==0): ?>
                        <a>
                          <img src="<?php echo $foto1; ?>" alt="..." />
                        </a>
                        <a>
                          <img src="<?php echo $foto2; ?>" alt="..." />
                        </a>
                        <a>
                          <img src="<?php echo $foto3; ?>" alt="..." />
                        </a>
                        <a>
                          <img src="<?php echo $foto4; ?>" alt="..." />
                        </a>
                          <?php endif; ?>
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                      <h1 class="prod_title">
                        <?php echo $i->getSubtitulo(); ?>
                      </h1>

                      <h2>
                        <?php echo $i->getDescricao(); ?>
                      </h2>
                        <?php
                            if($id==0):
                                $query = "SELECT * FROM endereco ORDER BY id ASC";
                                $ver2 = Endereco::findBySql(con(), $query);
                                foreach ($ver2 as $i2):
                        ?>
                      <h3 class="prod_title">Endereço:</h3>
                      <h2><?php echo $i2->getDescricao(); ?></h2>
                      <h4><i class="fa fa-phone-square"></i> contactos: <?php echo $i2->getTelefone(); ?></h4>
                      <h4><i class="fa fa-facebook-square"> <?php echo $i2->getFacebook(); ?></i></h4>
                      <h4><i class="fa fa-envelope"> <?php echo $i2->getEmail(); ?></i></h4>
                      <br/>
                      <?php endforeach; endif; ?>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <?php ++$id; endforeach; ?>
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