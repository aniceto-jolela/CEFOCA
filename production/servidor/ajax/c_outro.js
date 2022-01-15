  /*========================== Mostra da tabela dos usuários ==============================*/  
    mostrarUniaoCurso();
    function mostrarUniaoCurso(){
        var dados = $("#mostrarD").serialize();

        $.post("../servidor/v_outros.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(id,nome,semana,horario){
            $("#ID").val(id);
            $("#curso").val(nome);
            $("#semana").val(semana);
            $("#horario").val(horario);
        }
    /* =============================== EDITAR Card ================================= */
    /*========================== Elimina Card ==============================*/
        function eliminarUniaoCurso(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este curso ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_outro.php?cod="+a,dados,function(i){
                   mostrarUniaoCurso();
                });
            }
        }
    /*======================================== End ==============================*/

  /* =============================== EDITAR CARD ================================= */
        function editarUniaoCurso(edita_form_id){
            
            let frmEdit = $('#'+edita_form_id);
            
            frmEdit.submit(
                function(a){
                    a.preventDefault();
                    //Pra evitar o cache (guardar dados anteriores)
                    if($("#eventoOutro").val() === "Enviando..."){return false;}
                    $("#eventoOutro").val("Enviando...");
                    $.ajax({
                    //Construção dentro do ajax
                    dataType:'json',
                    type: frmEdit.attr('method'),
                    url: frmEdit.attr('action'),
                    data: new FormData($('#edita_UniaoCurso')[0]),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(i){
                        if(i.numero === '0'){
                            mostrarUniaoCurso();
                            $("#eventoOutro").val("...");
                            document.getElementById("limpar").click();document.getElementById("fechar").click();
                            document.getElementById("eventoOutro").click();
                        }
                   },
                   error:function(){
                       alert("Erro ao editar.");
                   }
                });
                }
                    
            );
        }
    /* ============================ End EDITAR CARD =============================== */
    
/* Submeter formulário
 */
//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarUniaoCurso(id_formulario){

    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frm = $('#'+id_formulario);
    
    //Quando o formulário for submetido será executado automaticamente
    frm.submit(function(e){
        //e -> é usado para impedir que o formulário será submetido de forma normal.
        //preventDefault() -> impedi a submetido tradicional.
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
            data: new FormData($('#formUniaoCurso')[0]),
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
                    document.getElementById('Limpar').click();
                    $("#enviar").val("...");
                    alert("Curso cadastrado com sucesso.");vazio();
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
function vazio(){document.getElementById("progresso").src=""; }
