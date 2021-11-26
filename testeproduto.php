<?php include "Dao.php"; 

$dao = new Dao(); ?>

<select class="form-control" name="categoria" height= "35px" width= "50%">
          <option value="">Selecione</option>
          <?php
        $categorias = $dao->retornoCat();

        foreach($categorias as $linha)
        { ?>
        <option value=""><?php echo $linha['categoria'] ?></option>
        <?php } ?>
        </select>