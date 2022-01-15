<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nº</th>
        <th style="width: 50%">NOME</th>
        <th>DURAÇÃO</th>
        <th>PREÇO</th>
        <th>VAGAS</th>
        <th>Acção</th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os cursos
          $query = "SELECT * FROM cursos ORDER BY id ASC";
          $ver = Cursos::findBySql(con(), $query);
          //id_botao - conta o index dos botões
          $id_botao = 0;
          //id - conta o index do usuário
          $id = 0;
          foreach ($ver as $i):
            if($i->getEstado()==0){
          ?>

      <tr>
          <td><?php echo ++$id; ?></td>
          <td><?php echo $i->getNome(); ?></td>
          <td><?php echo $i->getDuracao(); ?></td>
          <td><?php echo $i->getPreco(); ?></td>
          <td><?php echo $i->getVagas(); ?></td>
        <td>
            <button type='button' class="btn btn-success" onclick="modelEdita('<?php echo $i->getId(); ?>','<?php echo $i->getNome(); ?>','<?php echo $i->getDuracao(); ?>','<?php echo $i->getPreco(); ?>','<?php echo $i->getVagas(); ?>')"  data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"></i></button>
            <button type='submit' class="btn btn-danger" onclick="eliminarCurso('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
            <?php } endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>