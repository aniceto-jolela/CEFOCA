 /*========================== Mostra da tabela dos horários ==============================*/  
    mostrarHorario(); 
    function mostrarHorario(){
        var dados = $("#mostrarD").serialize();

        $.post("../servidor/v_horarios.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
     /*========================== Elimina Card ==============================*/
        function eliminarHorario(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este Horário ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_horario.php?cod="+a,dados,function(i){
                   mostrarHorario();
                });
            }
        }
    /*======================================== End ==============================*/

/* ============= Mostra os dados dos horários na modal ==========================*/

function mostrarHModal(id,inicial,final){
    $("#ID").val(id);
    $("#inicial").val(inicial);
    $("#final").val(final);
}


/* =============================== EDITAR USUÁRIO ================================= */
        function editarHorario(edita_form_id){
            
            let frmEdit = $('#'+edita_form_id);
            frmEdit.submit(function(a){
            a.preventDefault();
            
            //Pra evitar o cache (guardar dados anteriores)
            if($("#eventoH").val() === "Enviando..."){return false;}
            $("#eventoH").val("Enviando...");
            //Receber os dados do formulário
            $.ajax({
                //Construção dentro do ajax
                dataType:'json',
                type: frmEdit.attr('method'),
                url: frmEdit.attr('action'),
                data: new FormData($('#edita_horario')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '0'){
                        mostrarHorario();
                        $("#eventoH").val("...");
                        document.getElementById("fechar").click();
                        document.getElementById("eventoH").click();
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
            });
            
        }
    /* ============================ End EDITAR USUÁRIO =============================== */
/* Submeter formulário
 */

//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarHorario(id_formulario){

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
            data: new FormData($('#formHorario')[0]),
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
                    document.getElementById("timeInicial").value="";
                    document.getElementById("timeFinal").value="";
                    $("#enviar").val("..."); alert("Horário cadastrado com sucesso.");vazio();
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