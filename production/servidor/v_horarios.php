<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nº</th>
        <th>Inicio</th>
        <th>Final</th>
        <th>Acção</th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os usuarios
          $query = "SELECT * FROM horarios ORDER BY id ASC";
          $ver = Horarios::findBySql(con(), $query);
          //id_botao - conta o index dos botões
          $id_botao = 0;
          //id - conta o index do usuário
          $id = 0;
          foreach ($ver as $i):
              if($i->getEstado()<1){
          ?>

      <tr>
          <td><?php echo ++$id; ?></td>
          <td><?php echo $i->getInicio(); ?></td>
          <td><?php echo $i->getFinal(); ?></td>
        <td>
            <button type='button' class="btn btn-success" onclick="mostrarHModal('<?php echo $i->getId(); ?>','<?php echo $i->getInicio(); ?>','<?php echo $i->getFinal(); ?>')"  data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"></i></button>
          <button type='submit' class="btn btn-danger" onclick="eliminarHorario('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
        <?php } endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>