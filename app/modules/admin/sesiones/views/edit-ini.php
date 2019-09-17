<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_Sesiones $model_sesiones
 * @var Model_Sesiones sesiones
 * @var Model_Sesiones $sesion
 */
?>

<h3><?= empty($oSesion->id_sesion) ? "Agregar Sesion para: Ini" : "Actualizando datos, Sesion #" . $oSesion->id_sesion ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/sesiones/edit/ini/".$oSesion->id_sesion,["id" => "sesionesEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_club" class="col-sm-4 col-form-label col-form-label-md">Nombre del club</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_club',
  'id' => 'fieldId_club',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_clubs',
);
        echo form_select($data,$oClubs,$oSesion->id_club);
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
        echo form_default($data,$oTurnos,$oSesion->id_turno);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_turno"); ?>


<div class="form-group row">
    <label for="fieldId_asociado" class="col-sm-4 col-form-label col-form-label-md">Sesion a cargo de</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_asociado',
  'id' => 'fieldId_asociado',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_default($data,$oUsuarios,$oSesion->id_asociado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_asociado"); ?>

<div class="form-group row">
    <label for="fieldCaja_inicial" class="col-sm-4 col-form-label col-form-label-md">Monto inicial en caja</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'caja_inicial',
  'id' => 'fieldCaja_inicial',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("caja_inicial", $oSesion->caja_inicial),"")
        ?>
    </div>
</div>
<?php echo form_error("caja_inicial"); ?><div class="form-group row">
    <label for="fieldFec_sesion" class="col-sm-4 col-form-label col-form-label-md">Fec sesion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fec_sesion',
  'id' => 'fieldFec_sesion',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("fec_sesion", $oSesion->fec_sesion),"")
        ?>
    </div>
</div>
<?php echo form_error("fec_sesion"); ?>
<div class="form-group row">
    <label for="fieldId_opcion_sesion" class="col-sm-4 col-form-label col-form-label-md">Sesion con</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_sesion',
  'id' => 'fieldId_opcion_sesion',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_select($data,$oOpcionSesion,$oSesion->id_opcion_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_sesion"); ?>



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

