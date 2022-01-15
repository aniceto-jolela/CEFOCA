<?php
    include_once 'conectar.php';
    include_once "../admin/css/tables_css.php";
?>

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nº</th>
        <th>TITULO</th>
        <th>SUB-TITULO</th>
        <th>DESCRIÇÃO</th>
        <th>IMAGEM</th>
        <th>Acção</th>
      </tr>
    </thead>

    <tbody>
        <?php 
            //Ver os usuarios
            $query = "SELECT * FROM card ORDER BY id ASC";
            $ver = Card::findBySql(con(), $query);
            //id_botao - conta o index dos botões
            $id_botao = 0;
            //id - conta o index do usuário
            $id = 0;
            foreach ($ver as $i):
                
            ?>
      <tr>
        <td><?php echo ++$id; ?></td>
        <td class="tdtitulo"><?php echo $i->getTitulo(); ?></td>
        <td class="tdsub"><?php echo $i->getSubtitulo(); ?></td>
        <td class="tddescricao"><?php echo $i->getDescricao(); ?></td>
        <td class="tdfile"><img src="<?php echo $i->getImagem(); ?>" style="height: 30px" id="imagem"></td>
        <td>
          <button type='button' class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"
                  onclick="modelEdita('<?php echo $i->getId(); ?>','<?php echo $i->getTitulo(); ?>','<?php echo $i->getSubtitulo(); ?>',
                            '<?php echo $i->getImagem(); ?>','<?php echo $id; ?>')"><i class="fa fa-pencil"></i>
          </button>
                    
          <button type='submit' id="enviar" class="btn btn-danger"  onclick="eliminarCard('<?php echo $i->getId(); ?>')"><i class="fa fa-trash"></i></button>
          <div class="descricao" style="display: none"><?php echo $i->getDescricao() ?></div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<!--JS-->
<?php include_once "../admin/js/tables_alterado_js.php"; ?>