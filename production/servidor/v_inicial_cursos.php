<?php
    include_once 'conectar.php';
?>


<table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th class="column-title">Nº </th>
        <th class="column-title">NOME </th>
        <th class="column-title">HORÁRIO </th>
        <th class="column-title">DIAS DA SEMANA</th>
        <th class="column-title">DURAÇÃO </th>
        <th class="column-title">PREÇO </th>
      </tr>
    </thead>

    <tbody>
        <?php 
          //Ver os uniao_curso
          $query = "SELECT * FROM uniao_curso ORDER BY id ASC";
          $ver = UniaoCurso::findBySql(con(), $query);
          //id - conta o index do usuário
          $id = 0;
          foreach ($ver as $i):
            $vcurso = Cursos::findById(con(), $i->getIdCurso());
            $vhorario = Horarios::findById(con(), $i->getIdHorario());

            if($i->getEstado()!=1){
          ?>

        <tr class="even pointer">
        <td class="a-center "><?php echo ++$id; ?></td>
        <td><?php echo $vcurso->getNome(); ?></td>
        <td><?php echo $vhorario->getInicio()." - ".$vhorario->getFinal(); ?></td>
        <td><?php echo $i->getDiaSemana(); ?></td>
        <td><?php echo $vcurso->getDuracao(); ?></td>
        <td><?php echo $vcurso->getPreco(); ?></td>
        </tr>
            <?php } endforeach; ?>
    </tbody>
</table>