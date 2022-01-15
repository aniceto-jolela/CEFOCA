<?php
    include_once '../servidor/conectar.php';
?>

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
                                    <form method="post" action="../servidor/c_inscriao.php" id="formInscricao" enctype="multipart/form-data">
                                        <span class="section">Dados Pessoais</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nome<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-words="2" autocomplete="off" name="nome" placeholder="ex. Joyce f. Guorgel" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telefone<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' autocomplete="off" name="tel"  maxlength="16" type="tel" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">BI<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' autocomplete="off" name="bi" maxlength="14" type="text" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Foto<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="foto" type="file" accept=".jpg,.jpeg,.png" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="curso" required="">
                                                    <?php 
                                                        $pcurso = "SELECT * FROM cursos";
                                                        $vcurso = Cursos::findBySql(con(), $pcurso);
                                                        foreach ($vcurso as $i  ):
                                                    ?>
                                                    <option value="<?php echo $i->getId(); ?>"><?php echo $i->getNome(); ?></option>
                                                  <?php endforeach; ?>
                                                </select>    
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary" id="enviar" onclick="cadastrarInscricao('formInscricao')">Salvar</button>
                                                    <button type='reset' class="btn btn-success" id="limpar">Limpar</button>
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
    
    <!-- AJAX	-->
    <script src="../servidor/ajax/c_inscricao.js"></script>
    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->
</body>

</html>
