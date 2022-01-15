  /*========================== Mostra da tabela dos usuários ==============================*/  
    mostrarCurso();
    function mostrarCurso(){
        var dados = $("#mostrarD").serialize();

        $.post("../servidor/v_cursos.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(id,nome,duracao,preco,vagas){
            $("#ID").val(id);
            $("#curso").val(nome);
            $("#duracao").val(duracao);
            $("#preco").val(preco);
            $("#vagas").val(vagas);
        }
    /* =============================== EDITAR Card ================================= */
    /*========================== Elimina Card ==============================*/
        function eliminarCurso(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este curso ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_curso.php?cod="+a,dados,function(i){
                   mostrarCurso();
                });
            }
        }
    /*======================================== End ==============================*/

  /* =============================== EDITAR CARD ================================= */
        function editarCurso(edita_form_id){
            
            let frmEdit = $('#'+edita_form_id);
            
            frmEdit.submit(
                function(a){
                    a.preventDefault();
                    //Pra evitar o cache (guardar dados anteriores)
                    if($("#eventoCurso").val() === "Enviando..."){return false;}
                    $("#eventoCurso").val("Enviando...");
                    $.ajax({
                    //Construção dentro do ajax
                    dataType:'json',
                    type: frmEdit.attr('method'),
                    url: frmEdit.attr('action'),
                    data: new FormData($('#edita_curso')[0]),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(i){
                        if(i.numero === '0'){
                            mostrarCurso();
                            $("#eventoCurso").val("...");
                            document.getElementById("limpar").click();document.getElementById("fechar").click();
                            document.getElementById("eventoCurso").click();
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

function cadastrarCurso(id_formulario){

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
            //Construção dentro do ajax
            //type -> qual é o tipo de Request (estamos utilizar o post) podemos ir buscar do nosso formulário frm
            //attr -> ir buscar o atributo cusjo o nome é ...
            //url -> busca acção que é usada no formulário
            //data -> busca os dados do formulário ou melhor são os dados que será enviado para o servidor.
            //FormData -> serve para trabalhar com ficheiros 
            //dataType-> é o valor que estas esperando, estas esperrando um valor do servidor (pode ser em html,xml ou json).
            //serialize() -> pega toda a informação dentro dos input do formulário e coloca dentro do obj data
            // que é a informação enviada do pedido do AJAX.
            dataType:'json',
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: new FormData($('#formcurso')[0]),
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
                    limpezaCampos();
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

function limpezaCampos(){
    document.getElementById("curso").value="";
    document.getElementById("duracao").value="";
    document.getElementById("preco").value="";
    document.getElementById("vagas").value="";
}