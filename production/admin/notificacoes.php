<!-- Verifica se o utilizador está logado -->
 <?php 
    include_once '../login/login_admin.php';
 
    //EDITA O ESTADO DA NOTIFICAÇÃO (estado = 1), notificação visualizada.
    $q = "SELECT * FROM notificacoes ORDER BY id ASC";
    $v = Notificacoes::findBySql(con(), $q);
    foreach ($v as $i){
        $notificacao_edit = con()->prepare("UPDATE notificacoes SET estado=1");
        $notificacao_edit->execute();
     }
?>
 

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include_once "sidebar.php"; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

       
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Notificações</h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Total : <span id="total"></span></h2>
                    <div class="x_content">
                  </div>
                  
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th>Name</th>
                          <th>Mensagem</th>
                          <th style="width: 20%">Horário</th>
                          <th>Foto</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                            //Ver os cursos
                            $query = "SELECT * FROM notificacoes ORDER BY id DESC";
                            $ver = Notificacoes::findBySql(con(), $query);
                            //id_botao - conta o index dos botões
                            $id_botao = 0;$id=0;
                            //id - conta o index do usuário
                            
                            foreach ($ver as $i):
                                $vinscrito = Inscricoes::findById(con(), $i->getIdInscrito());
                                $vmensagem = Mensagem::findById(con(), $i->getIdMensagem());
                                $Nome="";$Mensagem="";$Foto="";
                                
                                if(!empty($i->getIdInscrito())){
                                    $Nome=$vinscrito->getNome();$Foto=$vinscrito->getFotografia();
                                }else{$Nome="X";}
                                if(!empty($i->getIdMensagem())){
                                    $Mensagem=$vmensagem->getDescricao();
                                }else{$Mensagem="X";}
                                
                            ?>
                        <tr>
                          <td>#</td>
                          <td>
                              <a><?php echo $Nome; ?></a>
                          </td>
                          <td>
                              <a><?php echo $Mensagem; ?></a>
                          </td>
                          <td>
                              <small><?php echo $i->getHorario(); ?></small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                  <img src="<?php echo $Foto; ?>" class="avatar" alt="Avatar">
                              </li>
                            </ul>
                          </td>
                        </tr>
                        
                        <?php $id++; 
                            echo "<script>document.getElementById('total').innerHTML=$id;</script>";
                        endforeach; ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

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