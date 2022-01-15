<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $mensagens = Mensagem::findBySql(con(), "SELECT * FROM mensagem ORDER BY id");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../admin/css/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../admin/images/logo.png' id='foto'></center>";
    $html.="<h3>DADOS DAS MENSAGENS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Descrição</th>
            </tr>";
    foreach ($mensagens as $i){
        if($i->getEstado()<1){
        $html.="<tr>";
        $html.="<td>".++$id."</td>";
        $html.="<td style='width:600px'>".$i->getDescricao()."</td>";
        $html.="</tr>";
    }}
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