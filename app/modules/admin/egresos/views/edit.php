<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Egresos $model_egresos
 * @var Model_Egresos egresos
 * @var Model_Egresos $egreso
 */
?>

<h3><?= empty($oEgreso->id_egreso) ? "Agregar Egreso" : "Actualizando datos, Egreso #" . $oEgreso->id_egreso ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/egresos/edit/".$oEgreso->id_egreso,["id" => "egresosEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_club" class="col-sm-4 col-form-label col-form-label-md">Club de</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_club',
  'id' => 'fieldId_club',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_clubs',
);
        echo form_select($data,$oClubs,$oEgreso->id_club);
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
        echo form_select($data,$oTurnos,$oEgreso->id_turno);
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
        echo form_select($data,$oSesiones,$oEgreso->id_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_sesion"); ?>


<div class="form-group row">
    <label for="fieldId_cliente" class="col-sm-4 col-form-label col-form-label-md">Cliente</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_cliente',
  'id' => 'fieldId_cliente',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_default($data,$oUsuarios,$oEgreso->id_cliente);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_cliente"); ?>

<div class="form-group row">
    <label for="fieldDetalle" class="col-sm-4 col-form-label col-form-label-md">Detalle</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'detalle',
  'id' => 'fieldDetalle',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("detalle", $oEgreso->detalle),"")
        ?>
    </div>
</div>
<?php echo form_error("detalle"); ?>
<div class="form-group row">
    <label for="fieldTipo_egreso" class="col-sm-4 col-form-label col-form-label-md">Tipo de Egreso</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'tipo_egreso',
  'id' => 'fieldTipo_egreso',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Gastos',
    1 => 'Costos',
  ),
);
        echo form_select($data,$data["options"],$oEgreso->tipo_egreso);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("tipo_egreso"); ?>

<div class="form-group row">
    <label for="fieldFecha_egreso" class="col-sm-4 col-form-label col-form-label-md">Fecha egreso</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fecha_egreso',
  'id' => 'fieldFecha_egreso',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("fecha_egreso", $oEgreso->fecha_egreso),"")
        ?>
    </div>
</div>
<?php echo form_error("fecha_egreso"); ?><div class="form-group row">
    <label for="fieldMonto" class="col-sm-4 col-form-label col-form-label-md">Monto</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'monto',
  'id' => 'fieldMonto',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("monto", $oEgreso->monto),"")
        ?>
    </div>
</div>
<?php echo form_error("monto"); ?>

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

