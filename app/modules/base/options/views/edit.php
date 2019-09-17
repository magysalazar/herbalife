<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Options $model_options
 * @var Model_Options options
 * @var Model_Options $option
 */
?>

<h3><?= empty($oOption->id_option) ? "Agregar Opciones del Sistema" : "Actualizando datos, Option #" . $oOption->id_option ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/options/edit/".$oOption->id_option,["id" => "optionsEdit"]) ?>

<div class="form-group row">
    <label for="fieldNombre" class="col-sm-4 col-form-label col-form-label-md">Nombre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'nombre',
  'id' => 'fieldNombre',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("nombre", $oOption->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("descripcion", $oOption->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?>
<div class="form-group row">
    <label for="fieldId_setting" class="col-sm-4 col-form-label col-form-label-md">Opcion para</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_setting',
  'id' => 'fieldId_setting',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_settings',
);
        echo form_dropdown($data,$oSettings,$oOption->id_setting);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_setting"); ?>


<div class="form-group row">
    <label for="fieldNivel" class="col-sm-4 col-form-label col-form-label-md">Nivel de usuario</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'nivel',
  'id' => 'fieldNivel',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Baja',
    1 => 'Media',
    2 => 'Alta',
  ),
);
        echo form_radios($data,$data["options"],$oOption->nivel);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("nivel"); ?>

<div class="form-group row">
    <label for="fieldPrecio" class="col-sm-4 col-form-label col-form-label-md">Precio</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'precio',
  'id' => 'fieldPrecio',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("precio", $oOption->precio),"")
        ?>
    </div>
</div>
<?php echo form_error("precio"); ?><div class="form-group row">
    <label for="fieldNum_fichas" class="col-sm-4 col-form-label col-form-label-md">Num fichas</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'num_fichas',
  'id' => 'fieldNum_fichas',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("num_fichas", $oOption->num_fichas),"")
        ?>
    </div>
</div>
<?php echo form_error("num_fichas"); ?><div class="form-group row">
    <label for="fieldId_modulo" class="col-sm-4 col-form-label col-form-label-md">Id modulo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_modulo',
  'id' => 'fieldId_modulo',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("id_modulo", $oOption->id_modulo),"")
        ?>
    </div>
</div>
<?php echo form_error("id_modulo"); ?><div class="form-group row">
    <label for="fieldEdit_tag" class="col-sm-4 col-form-label col-form-label-md">Edit tag</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'edit_tag',
  'id' => 'fieldEdit_tag',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("edit_tag", $oOption->edit_tag),"")
        ?>
    </div>
</div>
<?php echo form_error("edit_tag"); ?>

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
