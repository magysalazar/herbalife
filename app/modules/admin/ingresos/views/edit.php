<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Ingresos $model_ingresos
 * @var Model_Ingresos ingresos
 * @var Model_Ingresos $ingreso
 */
?>

<h3><?= empty($oIngreso->id_ingreso) ? "Agregar Ingreso" : "Actualizando datos, Ingreso #" . $oIngreso->id_ingreso ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/ingresos/edit/".$oIngreso->id_ingreso,["id" => "ingresosEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_cliente" class="col-sm-4 col-form-label col-form-label-md">Nombre del Cliente</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_cliente',
  'id' => 'fieldId_cliente',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_default($data,$oUsuarios,$oIngreso->id_cliente);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_cliente"); ?>


<div class="form-group row">
    <label for="fieldId_comanda" class="col-sm-4 col-form-label col-form-label-md">Comanda</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_comanda',
  'id' => 'fieldId_comanda',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_comandas',
);
        echo form_dropdown($data,$oComandas,$oIngreso->id_comanda);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_comanda"); ?>


<div class="form-group row">
    <label for="fieldId_prepago" class="col-sm-4 col-form-label col-form-label-md">Prepago</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_prepago',
  'id' => 'fieldId_prepago',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_prepagos',
);
        echo form_dropdown($data,$oPrepagos,$oIngreso->id_prepago);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_prepago"); ?>


<div class="form-group row">
    <label for="fieldId_producto" class="col-sm-4 col-form-label col-form-label-md">Producto</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_producto',
  'id' => 'fieldId_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_productos',
);
        echo form_dropdown($data,$oProductos,$oIngreso->id_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_producto"); ?>



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
//endInsertEachOne
?>

