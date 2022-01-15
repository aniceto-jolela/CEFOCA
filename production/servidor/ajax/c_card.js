  /*========================== Mostra da tabela dos usuários ==============================*/  
    mostrarCard();
    function mostrarCard(){
        var dados = $("#mostrarD").serialize();

        $.post("../servidor/v_card.php",dados,function(retorna){
           $("#v_dados").html(retorna);
        });
    }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(id,titulo,sub,file,cod){
            $("#ID").val(id);
            $("#titulo").val(titulo);
            $("#sub").val(sub);
            $("#file2").val(file);
            
            var cont = document.getElementsByClassName("descricao");
            for(i=0;i<cont.length;i++){
                if(i==cod){$("#descricao").val(cont[i].innerHTML);}
            }
        }
    /* =============================== EDITAR Card ================================= */
    /*========================== Elimina Card ==============================*/
        function eliminarCard(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este card ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_card.php?cod="+a,dados,function(i){
                   mostrarCard();
                });
            }
        }
    /*======================================== End ==============================*/

  /* =============================== EDITAR CARD ================================= */
        function editarFormCard(edita_form_id){
            
            let frmEdit = $('#'+edita_form_id);
            frmEdit.submit(function(a){
            a.preventDefault();
            //Pra evitar o cache (guardar dados anteriores)
            if($("#eventoCard").val() === "Enviando..."){return false;}
            $("#eventoCard").val("Enviando...");
            
            
            //Receber os dados do formulário
            //var dados = new FormData($('#edita_form')[0]);
            $.ajax({
                //Construção dentro do ajax
                dataType:'json',
                type: frmEdit.attr('method'),
                url: frmEdit.attr('action'),
                data:  new FormData($('#edita_card')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '0'){
                        //Limpa os dados
                        $("#titulo").val("");$("#sub").val("");$("#file").val("");
                        $("#descricao").val("");$("#editar").val("...");
                        mostrarCard();
                        $("#eventoCard").val("...");
                        document.getElementById("eventoImg").innerHTML="";
                        document.getElementById("fechar").click();
                        document.getElementById("eventoCard").click();
                    }else if(i.numero === '1'){
                        $("#eventoCard").val("...");
                        document.getElementById("eventoImg").innerHTML="Este ficheiro já existe, porfavor altere o nome.";
                    }else if(i.numero === '2'){
                        $("#eventoCard").val("...");
                        document.getElementById("eventoImg").innerHTML="Imagem inválida.";
                    }else if(i.numero === '3'){
                        $("#eventoCard").val("...");
                        document.getElementById("eventoImg").innerHTML="O tamanho max é 1,99 MB.";
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
            
            });
        }
    /* ============================ End EDITAR CARD =============================== */
    
/* Submeter formulário
 */
//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarCard(id_formulario){

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
            data: new FormData($('#formCard')[0]),
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
                    alert("Card cadastrado com sucesso.");vazio();
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


/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o progresso
function progresso(){ document.getElementById("progresso").src="../root/images/progresso/loading1.gif"; }

//Oculta o progresso
function vazio(){document.getElementById("progresso").src=""; }

function limpezaCampos(){
    document.getElementById("titulo").value="";
    document.getElementById("sub").value="";
    document.getElementById("descricao").value="";
    document.getElementById("file").value="";
}