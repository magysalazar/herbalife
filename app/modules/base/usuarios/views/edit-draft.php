<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Usuarios $model_usuarios
 * @var Model_Usuarios usuarios
 * @var Model_Usuarios $usuario
 */
?>

<h3><?= empty($oUsuario->id_usuario) ? "Agregar Usuario para: Draft" : "Actualizando datos, Usuario #" . $oUsuario->id_usuario ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/usuarios/edit/draft/".$oUsuario->id_usuario,["id" => "usuariosEdit"]) ?>

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
        echo form_default($data,set_value("nombre", $oUsuario->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldApellido" class="col-sm-4 col-form-label col-form-label-md">Apellido</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'apellido',
  'id' => 'fieldApellido',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("apellido", $oUsuario->apellido),"")
        ?>
    </div>
</div>
<?php echo form_error("apellido"); ?>
<div class="form-group row">
    <label for="fieldSexo" class="col-sm-4 col-form-label col-form-label-md">Sexo</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'sexo',
  'id' => 'fieldSexo',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Masculino',
    1 => 'Femenino',
  ),
);
        echo form_radios($data,$data["options"],$oUsuario->sexo);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("sexo"); ?>



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

