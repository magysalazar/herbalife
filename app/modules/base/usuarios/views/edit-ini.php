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

<h3><?= empty($oUsuario->id_usuario) ? "Agregar Usuario para: Ini" : "Actualizando datos, Usuario #" . $oUsuario->id_usuario ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/usuarios/edit/ini/".$oUsuario->id_usuario,["id" => "usuariosEdit"]) ?>

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
    <label for="fieldInvitado_por" class="col-sm-4 col-form-label col-form-label-md">Invitado por</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'invitado_por',
  'id' => 'fieldInvitado_por',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_dropdown($data,$oUsuarios,$oUsuario->invitado_por);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("invitado_por"); ?>

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
    <label for="fieldId_option_tipo_asociado" class="col-sm-4 col-form-label col-form-label-md">Tipo de asociado</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_option_tipo_asociado',
  'id' => 'fieldId_option_tipo_asociado',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_dropdown($data,$oOptionTipoAsociado,$oUsuario->id_option_tipo_asociado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_option_tipo_asociado"); ?>


<div class="form-group row">
    <label for="fieldId_option_nivel_asociado" class="col-sm-4 col-form-label col-form-label-md">Nivel de asociado</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_option_nivel_asociado',
  'id' => 'fieldId_option_nivel_asociado',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_dropdown($data,$oOptionNivelAsociado,$oUsuario->id_option_nivel_asociado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_option_nivel_asociado"); ?>


<div class="form-group row">
    <label for="fieldId_club" class="col-sm-4 col-form-label col-form-label-md">Club Perteneciente</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_club',
  'id' => 'fieldId_club',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_clubs',
);
        echo form_select($data,$oClubs,$oUsuario->id_club);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_club"); ?>


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
    <label for="fieldId_opcion_role" class="col-sm-4 col-form-label col-form-label-md">Role del usuario</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_role',
  'id' => 'fieldId_opcion_role',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_radios($data,$oOpcionRole,$oUsuario->id_opcion_role);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_role"); ?>


<div class="form-group row">
    <label for="fieldId_tipo_usuario" class="col-sm-4 col-form-label col-form-label-md">Tipo de Usuario</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_tipo_usuario',
  'id' => 'fieldId_tipo_usuario',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_radios($data,$oTipoUsuario,$oUsuario->id_tipo_usuario);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_tipo_usuario"); ?>



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

