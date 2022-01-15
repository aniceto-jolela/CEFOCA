<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nº</th>
        <th>NOME</th>
        <th>HORÁRIO</th>
        <th>DIAS DA SEMANA</th>
        <th>DURAÇÃO</th>
        <th>VAGAS</th>
        <th>PREÇO</th>
        <th>Acção</th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os uniao_curso
          $query = "SELECT * FROM uniao_curso ORDER BY id ASC";
          $ver = UniaoCurso::findBySql(con(), $query);
          
          //id_botao - conta o index dos botões
          $id_botao = 0;
          //id - conta o index do usuário
          $id = 0;
          foreach ($ver as $i):
            $vcurso = Cursos::findById(con(), $i->getIdCurso());
            $vhorario = Horarios::findById(con(), $i->getIdHorario());
            
            if($i->getEstado()==0){
          ?>
      
      <tr>
        <td><?php echo ++$id; ?></td>
        <td><?php echo $vcurso->getNome(); ?></td>
        <td><?php echo $vhorario->getInicio()." - ".$vhorario->getFinal(); ?></td>
        <td><?php echo $i->getDiaSemana(); ?></td>
        <td><?php echo $vcurso->getDuracao(); ?></td>
        <td><?php echo $vcurso->getVagas(); ?></td>
        <td><?php echo $vcurso->getPreco(); ?></td>
        <td>
            <button type='button' class="btn btn-success" onclick="modelEdita('<?php echo $i->getId(); ?>','<?php echo $vcurso->getId(); ?>','<?php echo $i->getDiaSemana(); ?>','<?php echo $vhorario->getId(); ?>')" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"></i></button>
          <button type='submit' class="btn btn-danger" onclick="eliminarUniaoCurso('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
            <?php } endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>