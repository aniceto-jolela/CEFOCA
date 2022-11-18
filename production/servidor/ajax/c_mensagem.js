 /*========================== Mostra da tabela dos horários ==============================*/  
    mostrarMensagem(); 
    function mostrarMensagem(){
        var dados = $("#mostrarD").serialize();

        $.post("../servidor/v_mensagens.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
     /*========================== Elimina Mensagem ==============================*/
        function eliminarMensagem(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar esta Mensagem ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_mensagem.php?cod="+a,dados,function(i){
                   mostrarMensagem();
                });
            }
        }
    /*======================================== End ==============================*/

/* Submeter formulário
 */

//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarMensagem(id_formulario){

    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frm = $('#'+id_formulario);
    
    //Quando o formulário for submetido será executado automaticamente
    frm.submit(function(e){
        e.preventDefault();
        
        //Evitando que barbarizão o formulário de cadastro
            if($("#enviar").val() === "Enviando..."){
                return false;
            }
            $("#enviar").val("Enviando...");
        
        //Submissão do formulário em Ajax
        //Usando o jQuery
        //var data = new FormData($('#minhaForm'));
        $.ajax({
            dataType:'json',
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: new FormData($('#mensagem')[0]),
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
                    document.getElementById("sms").value="";
                    $("#enviar").val("..."); 
                    alert("Obrigado! Por nos contactar.");vazio();
                }
            },
            //erro do Ajax
            error: function(){
                 alert("Surgiu um erro....");vazio();
            }
        });
    });

}


/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o progresso
function progresso(){ document.getElementById("progresso").src="../root/images/progresso/loading1.gif"; }

//Oculta o progresso
function vazio(){document.getElementById("progresso").src="";}