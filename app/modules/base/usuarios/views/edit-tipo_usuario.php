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

<h3><?= empty($oUsuario->id_usuario) ? "Agregar Clientes" : "Actualizando datos del cliente #" . $oUsuario->id_usuario ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/usuarios/edit/tipo_usuario/".$oUsuario->id_usuario,["id" => "usuariosEdit"]) ?>

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
    <label for="fieldCellphone_number_1" class="col-sm-4 col-form-label col-form-label-md">Celular 1</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'cellphone_number_1',
  'id' => 'fieldCellphone_number_1',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("cellphone_number_1", $oUsuario->cellphone_number_1),"")
        ?>
    </div>
</div>
<?php echo form_error("cellphone_number_1"); ?>
<div class="form-group row">
    <label for="fieldId_turno" class="col-sm-4 col-form-label col-form-label-md">Turno de</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_turno',
  'id' => 'fieldId_turno',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_turnos',
);
        echo form_dropdown($data,$oTurnos,$oUsuario->id_turno);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_turno"); ?>


<div class="form-group row">
    <label for="fieldId_sesion" class="col-sm-4 col-form-label col-form-label-md">Sesion de</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_sesion',
  'id' => 'fieldId_sesion',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_sesiones',
);
        echo form_select($data,$oSesiones,$oUsuario->id_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_sesion"); ?>

<div class="form-group row">
    <label for="fieldId_sesion" class="col-sm-4 col-form-label col-form-label-md">Tipo Usuario</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
            'name' => 'id_tipo_usuario',
            'id' => 'fieldId_tipo_usuario',
            'class' => 'form-control ',
            'placeholder' => '',
        );
        echo form_radios($data,$oTipoUsuario,$oUsuario->id_tipo_usuario);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_tipo_usuario"); ?>

<div class="form-group row">
    <label for="fieldFoto_perfil" class="col-sm-4 col-form-label col-form-label-md">Foto de perfil</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'foto_perfil',
  'id' => 'fieldFoto_perfil',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo img('assets/img/usuarios/thumbs/'.$oUsuario->foto_perfil_thumb2);
        echo form_upload($data,set_value("foto_perfil", $oUsuario->foto_perfil),"");
        ?>
    </div>
</div>
<?php echo form_error("foto_perfil"); ?>

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

