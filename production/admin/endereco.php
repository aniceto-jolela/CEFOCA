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
                                    <form  method="post" id="edita_endereco" enctype="multipart/form-data">
                                        <span class="section">Dados dos contactos</span>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telefone <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' autocomplete="off" name="tel" id="tel" type="tel" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' autocomplete="off" name="email" id="email" type="text" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Facebook<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' autocomplete="off" name="fb"  id="fb" type="text" required="" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Endereço<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea required="required" name='descricao' id='descricao'></textarea>
                                            </div>                                        
                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <input type="button" value="Salvar" onclick="editarEndereco()" class="btn btn-success" >
                                                    <!--<button type='submit' class="btn btn-success" onclick="editarEndereco()"><i class="fa fa-save"></i> Gravar</button>-->
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
     
    <!-- Javascript functions	-->

    <?php
        $query = "SELECT * FROM endereco";
        $ver = Endereco::findBySql(con(), $query);
        foreach ($ver as $i){
            echo "<script>  document.getElementById('tel').value='".$i->getTelefone()."';".
                    "document.getElementById('email').value='".$i->getEmail()."';".
                    "document.getElementById('fb').value='".$i->getFacebook()."';".
                    "document.getElementById('descricao').value='".$i->getDescricao()."';".
                  "</script>";
            
        }
    
    ?>
    <!-- footer content -->
     <?php include_once "footer.php"; ?>
    <!-- /footer content -->
   <!-- Area do AJAX -->
    <?php include_once "../servidor/ajax/e_endereco.php"; ?>
</body>

</html>
