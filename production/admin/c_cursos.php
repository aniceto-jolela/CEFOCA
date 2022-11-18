<!-- Verifica se o utilizador está logado -->
 <?php include_once '../login/login_admin.php';?>

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
                                    <form method="post" action="../servidor/c_curso.php" id="formcurso" >
                                        <span class="section">Dados do curso</span>
                                        <br><br><br><br>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="curso" autocomplete="off" type="text" id="curso" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Duração<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="duracao" autocomplete="off" id="duracao" type="text" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Preço<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="preco" autocomplete="off" min="1" type="number" id="preco" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Vagas<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' min="1" name="vagas" autocomplete="off" id="vagas" type="number" required="" /></div>
                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary" id="enviar" onclick="cadastrarCurso('formcurso')"> Salvar</button>
                                                    <input type='reset' value="Limpar" class="btn btn-success">
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
   

    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->
    <!-- Area do AJAX -->
    <script src="../servidor/ajax/c_curso.js"></script>
</body>

</html>
