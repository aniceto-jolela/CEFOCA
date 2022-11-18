<?php
    //Conecta com a base de dados
    include_once '../servidor/conectar.php';

    $pesquisa = con()->query("SELECT * FROM notificacoes ORDER BY id ASC");
    $contador=0;
    foreach ($pesquisa as $d){if($d["estado"]==0){++$contador;}}
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CEFOCA | </title>

        <!-- Bootstrap -->
        <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../../build/css/custom.min.css" rel="stylesheet">

        <!-- Estilo -->
        <link href="css/estilo.css" rel="stylesheet">
    </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>CEFOCA</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['foto'] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['user'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-spinner"></i>Consultas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="inscricoes.php">Inscriçoes</a></li>
                      <li><a href="cursos.php">Cursos</a></li>
                      <li><a href="horarios.php"> Horários </a></li>
                      <li><a href="endereco.php">Endereço</a></li>
                      <li><a href="card.php"> Card </a></li>
                      <li><a href="outros.php"> Outros </a></li>
                      <li><a href="mensagens.php"> Mensagens </a></li>
                    </ul>
                  </li>
                  <li><a href="notificacoes.php"><i class="fa fa-bar-chart-o"></i> Notificações </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo $_SESSION['foto'] ?>" alt=""><?php echo $_SESSION['user'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  data-toggle="modal" data-target=".bs-example-modal-sm"> Usuário</a>
                      <a class="dropdown-item"  href="../login/sair.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="notificacoes.php" class="dropdown-toggle info-number"  aria-expanded="false">
                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-green"><?php echo $contador; ?></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- Moadal -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Dado do usuário</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">

                  <form id="edita_form" enctype="multipart/form-data" method="post">
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Usuário<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" class='optional' autocomplete="off" id="usuario" name="usuario" required type="text" /></div>
                  </div>
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Senha<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" class='optional' id="senha" name="senha" required data-validate-length-range="5" type="password" /></div>
                  </div>
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Imagem</label>
                      <div class="col-md-6 col-sm-6" >
                          <input type="file"  name="file" style="width:113px;overflow:hidden" accept=".jpg,.jpeg,.png"  />
                      </div>
                  </div>
                      <div style="text-align: center;color: red;" id="eventoImg"></div>
                </div>
                <div class="modal-footer">
                  <input type="button" name="edita" id="edita" value="Salvar" onclick="editarFuncao()" class="btn btn-success" >
                  
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Area do AJAX -->
    <?php include_once '../servidor/ajax/e_usuario.php';?>

  </body>
</html>