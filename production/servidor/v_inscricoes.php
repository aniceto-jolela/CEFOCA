<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
       <th>Nº</th>
        <th>NOME</th>
        <th>TELEFONE</th>
        <th>BI</th>
        <th>CURSO</th>
        <th>FOTO</th>
        <th>APURADO</th>
        <th>ACÇÕES</th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os Inscrições
          $query = "SELECT * FROM inscricoes ORDER BY id ASC";
          $ver = Inscricoes::findBySql(con(), $query);
          
          //id_botao - conta o index dos botões
          $id_botao = 0;
          //id - conta o index do usuário
          $id = 0;$estado_id=0;
          foreach ($ver as $i):
              $vcurso = Cursos::findById(con(), $i->getIdCurso());
              
          if($i->getEstado()<3){
          ?>
      <tr>
        <td><?php echo ++$id; ?></td>
        <td><?php echo $i->getNome(); ?></td>
        <td><?php echo $i->getTelefone(); ?></td>
        <td><?php echo $i->getBi(); ?></td>
        <td><?php echo $vcurso->getNome(); ?></td>
        <td><img src="<?php echo $i->getFotografia(); ?>" style="height: 30px" id="imagem"></td>
        <td class="estado_id">
            <?php 
            //Verifica o Estado:
            //empty ou em braco- não aparece nada
            //1- está apurado
            //2- não está apurado
            //3- está eliminado
            
          
            if($i->getEstado()==1){
                echo "<script>document.getElementsByClassName('estado_id')[$estado_id].style.color='black'</script>";
                echo "Sim";
            }
            if($i->getEstado()==2){
                echo "<script>document.getElementsByClassName('estado_id')[$estado_id].style.color='red'</script>";
                echo "Não";
            }   
          
            ?>
        </td>
        <td  style="width: 18%">
            <button type='submit' name="estado" value="1"  class="btn btn-success" onclick="editarFormInscricao('<?php echo $i->getId(); ?>','1','<?php echo $vcurso->getId(); ?>')"><i class="fa fa-thumbs-up"></i></button>
            <button type='submit' name="estado" value="2"  class="btn btn-primary" onclick="editarFormInscricao('<?php echo $i->getId(); ?>','2','<?php echo $vcurso->getId(); ?>')"><i class="fa fa-thumbs-down"></i></button>
            <button type='submit' class="btn btn-danger" onclick="eliminarInscricao('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
            
        </td>
      </tr>
          <?php $estado_id++;} endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>