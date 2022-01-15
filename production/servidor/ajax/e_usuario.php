
<script>
    mostrarUsuario();
    /*========================== Mostra da tabela dos usuários ==============================*/  
        function mostrarUsuario(){
            var dados = $("#mostrarD").serialize();
            
            $.post("../servidor/v_usuario.php",dados,function(retorna){
               $("#v_dados").html(retorna);
            });
        }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(usuario,senha){
            $("#usuario").val(usuario);
            $("#senha").val(senha);
        }
        /* =============================== EDITAR USUÁRIO ================================= */
        function editarFuncao(){
            event.preventDefault();
            //Receber os dados do formulário
            var dados = new FormData($('#edita_form')[0]);
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/e_usuario.php",
                dataType:'json',
                data: dados,
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '0'){
                        document.getElementById("eventoImg").innerHTML="";
                        alert("Alterado com sucesso.");
                        //mostrarUsuario();
                    }
                    if(i.numero === '1'){
                        alert("Os campos de usuário e senha têm que estar preenchidos.");
                        document.getElementById("eventoImg").innerHTML="";
                    }else if(i.numero === '2'){
                        document.getElementById("eventoImg").innerHTML="Este ficheiro já existe, porfavor altere o nome.";
                    }else if(i.numero === '3'){
                        document.getElementById("eventoImg").innerHTML="Imagem inválida.";
                    }else if(i.numero === '4'){
                        document.getElementById("eventoImg").innerHTML="O tamanho max é 1,99 MB.";
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
        }
    /* ============================ End EDITAR USUÁRIO =============================== */

</script>