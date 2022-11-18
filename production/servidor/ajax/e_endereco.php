
<script>
        /* =============================== EDITAR USUÁRIO ================================= */
        function editarEndereco(){
            event.preventDefault();
            //Receber os dados do formulário
            var dados = new FormData($('#edita_endereco')[0]);
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/e_endereco.php",
                dataType:'json',
                data: dados,
                processData: false,
                contentType: false,
                cache: false,
                //Verificações
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        alert("Dados alterado com sucesso.");vazio();
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
        }
    /* ============================ End EDITAR USUÁRIO =============================== */

/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o progresso
    function progresso(){ document.getElementById("progresso").src="../root/images/progresso/loading1.gif"; }
//Oculta o progresso
    function vazio(){document.getElementById("progresso").src=""; }
</script>