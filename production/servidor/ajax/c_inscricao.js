  /*========================== Mostra da tabela das INSCRIÇÕES ==============================*/  
    mostrarInscricao();
    function mostrarInscricao(){
        var dados = $("#mostrarDInscr").serialize();
        
        $.post("../servidor/v_inscricoes.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
    /*========================== Elimina Card ==============================*/
        function eliminarInscricao(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este registro ?");
            if(resultado == true){
                var dados = $("#mostrarDInscr").serialize();
                $.post("../servidor/d_inscricao.php?cod="+a,dados,function(i){
                   mostrarInscricao();
                });
            }
        }
    /*======================================== End ==============================*/

  /* =============================== EDITAR INSCRIÇÃO ================================= */
        function editarFormInscricao(ID,COD,CURSO){
        
            event.preventDefault();
            //Pra evitar o cache (guardar dados anteriores)
            if($("#eventoInsc").val() === "Enviando..."){return false;}$("#eventoInsc").val("Enviando...");
            
            //Receber os dados do formulário
            var dados = new FormData($('#mostrarDInscr')[0]);
            $.ajax({
                //Construção dentro do ajax
                type: 'POST',
                url: '../servidor/e_inscricao.php?ID='+ID+'&COD='+COD+'&CURSO='+CURSO,
                dataType:'json',
                data:  dados,
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '1'){
                        mostrarInscricao();
                        $("#eventoInsc").val("...");
                        //alert("Foi apurado");
                    }
                    if(i.numero === '2'){
                        mostrarInscricao();
                        //alert("Não foi apurado");
                        $("#eventoInsc").val("...");
                    }
                    if(i.numero === '3'){
                        $("#eventoInsc").val("...");
                        //alert("Passou do limite de vagas disponíves.");
                        document.getElementById("eventoInsc").click();
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
           
        }
        
       
    /* ============================ End EDITAR INSCRIÇÃO =============================== */
    
/* Submeter formulário
 */
//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarInscricao(id_formulario){

    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frmInscricao = $('#'+id_formulario);
    
    //Quando o formulário for submetido será executado automaticamente
    frmInscricao.submit(function(e){
        //e -> é usado para impedir que o formulário será submetido de forma normal.
        //preventDefault() -> impedi a submetido tradicional.
        e.preventDefault();
        
        //Evitando que barbarizão o formulário de cadastro
            if($("#enviar").val() === "Enviando..."){
                return false;
            }
            $("#enviar").val("Enviando...");
        
        $.ajax({
            dataType:'json',
            type: frmInscricao.attr('method'),
            url: frmInscricao.attr('action'),
            data: new FormData($('#formInscricao')[0]),
            processData: false,
            contentType: false,
            cache: false,
            //Verificações
            beforeSend: function(){
                progresso();
            },
            success: function(i){
                if(i.numero === '0'){
                    //sucesso do cadastro
                    //Limpa os campos
                    document.getElementById("limpar").click();
                    $("#enviar").val("...");
                    alert("Inscrição feita com sucesso.");vazio();
                }else if(i.numero === '1'){
                    alert("Erro na base de dados");vazio();
                }else if(i.numero === '2'){
                    alert("Este ficheiro já existe, porfavor altere o nome.");vazio();$("#enviar").val("...");
                }else if(i.numero === '3'){
                    alert("Imagem inválida");vazio();$("#enviar").val("...");
                }else if(i.numero === '4'){
                    alert("O tamanho max é 1,99 MB");vazio();$("#enviar").val("...");
                }
                else{
                    alert("Nenhum retorno");vazio();
                }
            },
            //erro do Ajax
            error: function(){
                 alert("Surgiu um erro....");vazio();
            }
        });
    });

}
mostrarInscritosPdf();
//________________________________________________________________________________________PDF
 /*========================== Dinamismo da tabela Inscrição ==============================*/
        function mostrarInscritosPdf(){
            var cbCurso = document.getElementById("cbCurso").value;
            var cbEstado= document.getElementById("cbEstado").value; 
            //alert("CURSO ="+cbCurso+" | ESTADO = "+cbEstado);
            
            //Adiciona o link do pdf com a data no PDF
            document.getElementById("pdf_f").href = "../servidor/pdf_inscricoes.php?cbCurso="+cbCurso+"&cbEstado="+cbEstado;
            
        }
    /*========================== End Dinamismo da tabela ==============================*/

/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o progresso
function progresso(){ document.getElementById("progresso").src="../root/images/progresso/loading1.gif"; }

//Oculta o progresso
function vazio(){document.getElementById("progresso").src=""; }
