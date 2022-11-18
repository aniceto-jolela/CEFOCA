<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $cbCurso = $_GET['cbCurso'];
    $cbEstado = $_GET['cbEstado'];
    $query="";
    if($cbCurso!=0 && $cbEstado!=0){$query = "SELECT * FROM inscricoes WHERE id_curso ='$cbCurso' && estado='$cbEstado' ORDER BY id ASC";}
    if($cbCurso!=0 && $cbEstado==0){$query = "SELECT * FROM inscricoes WHERE id_curso ='$cbCurso' ORDER BY id ASC";}
    if($cbCurso==0 && $cbEstado!=0){$query = "SELECT * FROM inscricoes WHERE estado='$cbEstado' ORDER BY id ASC";}
    if($cbCurso==0 && $cbEstado==0){$query = "SELECT * FROM inscricoes ORDER BY id ASC";}
    

    $inscricoes = Inscricoes::findBySql(con(),$query);
    
    $id=0;$estado_id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../admin/css/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../admin/images/logo.png' id='foto'></center>";
    $html.="<h3>DADOS DAS INSCRIÇÕES</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>BI</th>
                <th>Curso</th>
                <th>Apurado</th>
            </tr>";
    foreach ($inscricoes as $i){
        $cor="";$estado="";
          if($i->getEstado()==1){$cor="black";$estado="Sim";}
          if($i->getEstado()==2){$cor="red";$estado="Não";}  
        
          if($i->getEstado()<3){
          
        $vcurso = Cursos::findById(con(), $i->getIdCurso());
        $html.="<tr>";
        $html.="<td>".++$id."</td>";
        $html.="<td style='width:250px'>".$i->getNome()."</td>";
        $html.="<td>".$i->getTelefone()."</td>";
        $html.="<td>".$i->getBi()."</td>";
        $html.="<td>".$vcurso->getNome()."</td>";
        $html.="<td style='color:$cor'>".$estado."</td>"; 
        $html.="</tr>";
          $estado_id++;}}
    $html.="</table>";
    $html.="</body></html>";
    
    //referenciar o DomPDF com namespace para evitar erros
    use Dompdf\Dompdf;

    // include autoloader
    require_once("../dompdf/autoload.inc.php");

    //Criando a Instancia
    $dompdf = new DOMPDF();

    // Carrega seu HTML
    $dompdf->load_html($html);
    //dados do documento destino
    //$dompdf->setPaper("A4","portrail");
    //Renderizar o html documento destino
    $dompdf->render();

    //Exibibir a página
    $dompdf->stream(
            "usuarios.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>