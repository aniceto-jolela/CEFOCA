<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th style="width: 8%">Nº</th>
        <th>DESCRIÇÃO</th>
        <th style="width: 10%">Acção</th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os usuarios
          $query = "SELECT * FROM mensagem ORDER BY id ASC";
          $ver = Mensagem::findBySql(con(), $query);
          $id = 0;
          foreach ($ver as $i):

              if($i->getEstado()<1){
          ?>

      <tr>
          <td><?php echo ++$id; ?></td>
          <td><?php echo $i->getDescricao(); ?></td>
        <td>
          <button type='submit' class="btn btn-danger" onclick="eliminarMensagem('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
            
        </td>
      </tr>
        <?php } endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>