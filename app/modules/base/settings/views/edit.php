<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 * @var Model_Settings $model_settings
 * @var Model_Settings settings
 * @var Model_Settings $setting
 */
?>

<h3><?= empty($oSetting->id_setting) ? "Agregar Configuraciones del Sistema" : "Actualizando datos, Setting #" . $oSetting->id_setting ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/settings/edit/".$oSetting->id_setting,["id" => "settingsEdit"]) ?>

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
        echo form_default($data,set_value("nombre", $oSetting->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?>
<div class="form-group row">
    <label for="fieldTabla" class="col-sm-4 col-form-label col-form-label-md">Tabla</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'tabla',
  'id' => 'fieldTabla',
  'class' => 'form-control ',
  'placeholder' => '',
            'onchange' => 'oCrud.getFieldsFromTable(this)'
);
        echo form_select($data,$aDBTables,$oSetting->id_field);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("tabla"); ?>

<div class="form-group row">
    <label for="fieldId_field" class="col-sm-4 col-form-label col-form-label-md">Columna Referencia</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_field',
  'id' => 'fieldId_field',
  'class' => 'form-control table-ref',
  'placeholder' => '',
  'options' => 
  array (
  ),
);
        echo form_select($data,$aDBTableRef,$oSetting->id_field);
        ?>
    </div>
</div>
<?php echo form_error("id_field"); ?><div class="form-group row">
    <label for="fieldFields" class="col-sm-4 col-form-label col-form-label-md">Columnas</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fields[]',
  'id' => 'fieldFields',
  'class' => 'form-control table-fields',
  'placeholder' => '',
  'options' => 
  array (
  ),
);
        echo form_multiselect($data,$aDBTableFields,$oSetting->fields)
        ?>
    </div>
</div>
<?php echo form_error("fields"); ?><div class="form-group row">
    <label for="fieldEdit_tag" class="col-sm-4 col-form-label col-form-label-md">Edit tag</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'edit_tag',
  'id' => 'fieldEdit_tag',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("edit_tag", $oSetting->edit_tag),"")
        ?>
    </div>
</div>
<?php echo form_error("edit_tag"); ?><div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("descripcion", $oSetting->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?>

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

