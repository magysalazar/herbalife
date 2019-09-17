<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Porciones $model_porciones
 * @var Model_Porciones porciones
 * @var Model_Porciones $porcion
 */
?>

<h3><?= empty($oPorcion->id_porcion) ? "Agregar Porcion" : "Actualizando datos, Porcion #" . $oPorcion->id_porcion ?></h3>

<?php
    
    foreach ($oProductos as $id_producto => $oProducto){
    
    ?>

<?= form_open_multipart("admin/porciones/edit/".$oPorcion->id_porcion,["id" => "porcionesEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_producto" class="col-sm-4 col-form-label col-form-label-md">Productos</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_producto',
  'id' => 'fieldId_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_productos',
);
        echo form_checkbox($data,array (
  $id_producto => $oProducto,
),$oPorcion->id_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_producto"); ?>

<div class="form-group row">
    <label for="fieldCantidad" class="col-sm-4 col-form-label col-form-label-md">Cantidad</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'cantidad',
  'id' => 'fieldCantidad',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("cantidad", $oPorcion->cantidad),"")
        ?>
    </div>
</div>
<?php echo form_error("cantidad"); ?>

<div class="form-group row">
    <div class="col-sm-12 controls">
        <?php
        $data = array(
            "name" => "save",
            "value" => "Guardar",
            "id" => "btnSave",
            "class" => "btn btn-success"
        );
        echo form_submit($data) ?>
    </div>
</div>
<?php echo form_close();
if(validateArray($errors,'error')){?>
    <div class="row">
        <div class="col-md-12">
            <?=$errors['error']?>
        </div>
    </div>
<?php } ?>
<?php

    }

?>

