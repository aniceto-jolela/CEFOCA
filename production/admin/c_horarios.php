<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

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
                            <h3>Centro de Formação e Cultural</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>CEFOCA</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="../servidor/c_horario.php" id="formHorario" method="post">
                                        <span class="section">Cadastrar horário</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Inicio<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="time" name="timeInicial" id="timeInicial" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Final<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="time" name="timeFinal" id="timeFinal" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary" id="enviar" onclick="cadastrarHorario('formHorario')">Salvar</button>
                                                    <button type='reset' class="btn btn-success">Limpar</button>
                                                    <img id="progresso">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->

    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->
    <!-- AJAX-->
    <script src="../servidor/ajax/c_horario.js"></script>
</body>

</html>
