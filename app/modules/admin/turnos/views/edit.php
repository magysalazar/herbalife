<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_Turnos $model_turnos
 * @var Model_Turnos turnos
 * @var Model_Turnos $turno
 */
?>

<h3><?= empty($oTurno->id_turno) ? "Agregar Turno" : "Actualizando datos, Turno #" . $oTurno->id_turno ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/turnos/edit/".$oTurno->id_turno,["id" => "turnosEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_club" class="col-sm-4 col-form-label col-form-label-md">Nombre del Club</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_club',
  'id' => 'fieldId_club',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_clubs',
);
        echo form_dropdown($data,$oClubs,$oTurno->id_club);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_club"); ?>


<div class="form-group row">
    <label for="fieldId_asociado" class="col-sm-4 col-form-label col-form-label-md">Asociado a cargo</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_asociado',
  'id' => 'fieldId_asociado',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_dropdown($data,$oUsuarios,$oTurno->id_asociado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_asociado"); ?>

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
        echo form_textarea($data,set_value("descripcion", $oTurno->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?><div class="form-group row">
    <label for="fieldFec_inicio" class="col-sm-4 col-form-label col-form-label-md">Fecha de Inicio</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fec_inicio',
  'id' => 'fieldFec_inicio',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("fec_inicio", $oTurno->fec_inicio),"")
        ?>
    </div>
</div>
<?php echo form_error("fec_inicio"); ?><div class="form-group row">
    <label for="fieldFec_fin" class="col-sm-4 col-form-label col-form-label-md">Fecha de Cierre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fec_fin',
  'id' => 'fieldFec_fin',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("fec_fin", $oTurno->fec_fin),"")
        ?>
    </div>
</div>
<?php echo form_error("fec_fin"); ?><div class="form-group row">
    <label for="fieldHorario_desde" class="col-sm-4 col-form-label col-form-label-md">hora de inicio</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'horario_desde',
  'id' => 'fieldHorario_desde',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("horario_desde", $oTurno->horario_desde),"")
        ?>
    </div>
</div>
<?php echo form_error("horario_desde"); ?><div class="form-group row">
    <label for="fieldHorario_hasta" class="col-sm-4 col-form-label col-form-label-md">Hora de Cierre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'horario_hasta',
  'id' => 'fieldHorario_hasta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("horario_hasta", $oTurno->horario_hasta),"")
        ?>
    </div>
</div>
<?php echo form_error("horario_hasta"); ?><div class="form-group row">
    <label for="fieldTotal_consumos" class="col-sm-4 col-form-label col-form-label-md">Total de consumos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_consumos',
  'id' => 'fieldTotal_consumos',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("total_consumos", $oTurno->total_consumos),"")
        ?>
    </div>
</div>
<?php echo form_error("total_consumos"); ?>
<div class="form-group row">
    <label for="fieldId_opcion_turnos" class="col-sm-4 col-form-label col-form-label-md">Turno con</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_opcion_turnos',
  'id' => 'fieldId_opcion_turnos',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_select($data,$oOpcionTurnos,$oTurno->id_opcion_turnos);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_opcion_turnos"); ?>



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

