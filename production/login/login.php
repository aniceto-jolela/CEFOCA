<!-- Inicio da sessão -->
<?php 
    //Conexão com o servidor 
    require_once '../servidor/conectar.php';
    /* Redirecionamento do login para o index... */
    if (isset($_SESSION["user"])){
        header("Location:../admin/index.php");exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
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
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <style>
        #loginErro{
            color: red;
            display: none;
        }
        a{font-weight: 900;
        }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form id="login" action="" method="POST">
              <h1>Login Form</h1>
                <span id="loginErro">Usuário ou a senha está errada.</span>
              <div>
                  <input type="text" class="form-control" autocomplete="off" name="username" id="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="submit">Log in</button> | 
                <a class="" name="submit" href="../inicial/index.php" >Inicial</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> CEFOCA</h1>
                  <p>©2021 Todos direitos reservados. CEFOCA Centro de Formação e Cultural.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<!-- Validação de login -->
 <?php 
   
    if (isset($_POST["submit"])){

        $query = "SELECT * FROM usuario";
        $verificar = Usuario::findBySql(con(), $query);
        
        /* @var $_POST type */
        $u = $_POST["username"];
        $p = $_POST["password"];
        //Verifica os usuários cadastrados
        
        foreach ($verificar as $i){
                if(strtolower($u) == strtolower($i->getNome()) && $p == $i->getSenha()){
                    $_SESSION['user'] = $i->getNome();
                    $_SESSION['senha'] = $i->getSenha();
                    $_SESSION['foto'] = $i->getImagem();
                    //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                    
                header("Location:../admin/index.php");exit();
            }else{
                echo "<script>
                       document.getElementById('loginErro').style='display:inline';
                    </script>";
            }
        }
    
    }
    exit();
    