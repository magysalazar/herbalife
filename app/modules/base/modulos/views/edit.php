<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Modulos $model_modulos
 * @var Model_Modulos modulos
 * @var Model_Modulos $modulo
 */
?>

<h3><?= empty($oModulo->id_modulo) ? "Agregar Modulo" : "Actualizando datos, Modulo #" . $oModulo->id_modulo ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/modulos/edit/".$oModulo->id_modulo,["id" => "modulosEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_opcion_modulo" class="col-sm-4 col-form-label col-form-label-md">Modulo</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_modulo',
  'id' => 'fieldId_opcion_modulo',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_select($data,$oOpcionModulo,$oModulo->id_opcion_modulo);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_modulo"); ?>


<div class="form-group row">
    <label for="fieldId_opcion_roles" class="col-sm-4 col-form-label col-form-label-md">Role Admitido</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_roles',
  'id' => 'fieldId_opcion_roles',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_select($data,$oOpcionRoles,$oModulo->id_opcion_roles);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_roles"); ?>

<div class="form-group row">
    <label for="fieldTitulo" class="col-sm-4 col-form-label col-form-label-md">Titulo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'titulo',
  'id' => 'fieldTitulo',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("titulo", $oModulo->titulo),"")
        ?>
    </div>
</div>
<?php echo form_error("titulo"); ?>
<div class="form-group row">
    <label for="fieldTabla" class="col-sm-4 col-form-label col-form-label-md">Tabla</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'tabla',
  'id' => 'fieldTabla',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("tabla", $oModulo->tabla),"")
        ?>
    </div>
</div>
<?php echo form_error("tabla"); ?>
<div class="form-group row">
    <label for="fieldListed" class="col-sm-4 col-form-label col-form-label-md">Listed</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'listed',
  'id' => 'fieldListed',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'ENABLED',
    1 => 'DISABLED',
  ),
);
        echo form_radio($data,$data["options"],$oModulo->listed);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("listed"); ?>

<div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data,set_value("descripcion", $oModulo->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?><div class="form-group row">
    <label for="fieldIcon" class="col-sm-4 col-form-label col-form-label-md">Icon</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'icon',
  'id' => 'fieldIcon',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("icon", $oModulo->icon),"")
        ?>
    </div>
</div>
<?php echo form_error("icon"); ?><div class="form-group row">
    <label for="fieldUrl" class="col-sm-4 col-form-label col-form-label-md">Url</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'url',
  'id' => 'fieldUrl',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("url", $oModulo->url),"")
        ?>
    </div>
</div>
<?php echo form_error("url"); ?>

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

