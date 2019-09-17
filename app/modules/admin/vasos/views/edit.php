<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_Vasos $model_vasos
 * @var Model_Vasos vasos
 * @var Model_Vasos $vaso
 */
?>

<h3><?= empty($oVaso->id_vaso) ? "Agregar Vaso" : "Actualizando datos, Vaso #" . $oVaso->id_vaso ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/vasos/edit/".$oVaso->id_vaso,["id" => "vasosEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_comanda" class="col-sm-4 col-form-label col-form-label-md">Comanda del Cliente</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_comanda',
  'id' => 'fieldId_comanda',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_comandas',
);
        echo form_select($data,$oComandas,$oVaso->id_comanda);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_comanda"); ?>

<div class="form-group row">
    <label for="fieldNivel" class="col-sm-4 col-form-label col-form-label-md">Nivel del vaso (0% - 100%)</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'nivel',
  'id' => 'fieldNivel',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '25',
            'data-min' => '50',
            'data-max' => '100',

);
        echo form_number($data,set_value("nivel", $oVaso->nivel),"")
        ?>
    </div>
</div>
<?php echo form_error("nivel"); ?>
<div class="form-group row">
    <label for="fieldTemperatura" class="col-sm-4 col-form-label col-form-label-md">Temperatura</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'temperatura',
  'id' => 'fieldTemperatura',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Frio',
    1 => 'Tibio',
    2 => 'Caliente',
  ),
);
        echo form_radios($data,$data["options"],$oVaso->temperatura);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("temperatura"); ?>


<div class="form-group row">
    <label for="fieldConsistencia" class="col-sm-4 col-form-label col-form-label-md">Consistencia</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'consistencia',
  'id' => 'fieldConsistencia',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Cremoso',
    1 => 'Al jugo',
  ),
);
        echo form_radios($data,$data["options"],$oVaso->consistencia);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("consistencia"); ?>


<div class="form-group row">
    <label for="fieldId_opcion_tipo_producto" class="col-sm-4 col-form-label col-form-label-md">Tipos de Productos</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_tipo_producto',
  'id' => 'fieldId_opcion_tipo_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'onclick' => 'oModal.open(this); oVaso.calcularNumProductos(this)',
  'subTable' => 'hbf_detalles_pedidos',
  'table' => 'ci_options',
  'action' => 'edit',
);
        echo form_checkboxes($data,$oOpcionTipoProducto,$oVaso->id_opcion_tipo_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_tipo_producto"); ?>

<div class="form-group row">
    <label for="fieldNum_productos" class="col-sm-4 col-form-label col-form-label-md">Numero de Productos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'num_productos',
  'id' => 'fieldNum_productos',
  'class' => 'form-control',
  'placeholder' => '',
);
        echo form_number($data,set_value("num_productos", $oVaso->num_productos),"")
        ?>
    </div>
</div>
<?php echo form_error("num_productos"); ?><div class="form-group row">
    <label for="fieldDetalle" class="col-sm-4 col-form-label col-form-label-md">Detalle</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'detalle',
  'id' => 'fieldDetalle',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("detalle", $oVaso->detalle),"")
        ?>
    </div>
</div>
<?php echo form_error("detalle"); ?>

<div class="form-group row">
    <div class="col-sm-12 controls">
        <?php
        $data = array(
            "name" => "save",
            "value" => "Guardar",
            "id" => "btnSave",
            "onclick" => "oVasos.cantidadProductos=0",
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


            <?=modal('fieldId_opcion_tipo_productoModal')?>