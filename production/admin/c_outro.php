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
                                    <form method="post" action="../servidor/c_outro.php" id="formUniaoCurso" >
                                        <span class="section">Dados do curso</span>
                                        <br><br><br><br>
                                       <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="curso" required="">
                                                    <?php 
                                                        $pcurso = "SELECT * FROM cursos";
                                                        $vcurso = Cursos::findBySql(con(), $pcurso);
                                                        foreach ($vcurso as $i  ):
                                                            if($i->getEstado()<1){
                                                    ?>
                                                    <option value="<?php echo $i->getId(); ?>"><?php echo $i->getNome(); ?></option>
                                                    <?php }endforeach; ?>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Dias da Semana<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="semana" id="semana" type="text" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Horário<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="horario" required="">
                                                    <?php 
                                                        $phorario = "SELECT * FROM horarios";
                                                        $vhorario = Horarios::findBySql(con(), $phorario);
                                                        foreach ($vhorario as $i2  ):
                                                    if($i2->getEstado()<1){
                                                    ?>
                                                    <option value="<?php echo $i2->getId() ?>"><?php echo $i2->getInicio() ." - ".$i2->getFinal(); ?></option>
                                                    <?php }endforeach; ?>
                                                </select>    
                                            </div>
                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary" id="enviar" onclick="cadastrarUniaoCurso('formUniaoCurso')" > Salvar</button>
                                                    <input type='reset' value="Limpar" id="Limpar" class="btn btn-success">
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
    <script src="../servidor/ajax/c_outro.js"></script>
</body>

</html>
