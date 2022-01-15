<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//CADASTRO DE USUÁRIO  
    try {
        
        //Verifica se já tem dados na Tabela ENDEREÇO
        $query1 = "SELECT * FROM endereco";
        $ver1 = Endereco::findBySql(con(), $query1);
        $cont = 0;
        foreach ($ver1 as $a){$cont=1;}
        if($cont==0){
            //Cadastro de Endereço
            //Dados do Endereço
            $telefone =  "+244 947-764-661";
            $email = "cefoca2019@gmail.com";
            $fb =  "centrocefoca";
            $descrico = "Município do cazenga, distrito do hoji-ya-henda. Entre o mercado do arreiou e a esquadra da policia.";

            $endereco = new Endereco();
            $endereco->setTelefone($telefone);
            $endereco->setEmail($email);
            $endereco->setFacebook($fb);
            $endereco->setDescricao($descrico);
            $endereco->insertIntoDatabase(con());
        }
        //=========================================================
        //Verifica se já tem dados na Tabela USUÁRIO
        $query = "SELECT * FROM usuario";
        $ver = Usuario::findBySql(con(), $query);
        foreach ($ver as $i){
            if(!empty($ver)){
                header("Location:../login/login.php");
                exit();
            }
        }
        
        //______________________________________

    //Dados dos usuários
    //Copia o nome do caminho da imagem
    $foto = '../root/images/usuario/user.png';
    $usuario =  "admin";
    $senha = "1234";

   //Cadastro de Usuário
    $usu = new Usuario();
    $usu->setNome(trim(strtolower($usuario)));
    $usu->setSenha($senha);
    $usu->setImagem($foto);
    $usu->insertIntoDatabase(con());
    
    
    header("Location:../login/login.php");
    exit();
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   

    