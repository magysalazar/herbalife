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

<h3><?= empty($oSesion->id_sesion) ? "Agregar Sesion" : "Actualizando datos, Sesion #" . $oSesion->id_sesion ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/sesiones/edit/".$oSesion->id_sesion,["id" => "sesionesEdit"]) ?>


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
    <label for="fieldDetalle" class="col-sm-4 col-form-label col-form-label-md">Detalle</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'detalle',
  'id' => 'fieldDetalle',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("detalle", $oSesion->detalle),"")
        ?>
    </div>
</div>
<?php echo form_error("detalle"); ?><div class="form-group row">
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
    <label for="fieldCaja_final" class="col-sm-4 col-form-label col-form-label-md">Monto final en caja</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'caja_final',
  'id' => 'fieldCaja_final',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("caja_final", $oSesion->caja_final),"")
        ?>
    </div>
</div>
<?php echo form_error("caja_final"); ?><div class="form-group row">
    <label for="fieldTotal" class="col-sm-4 col-form-label col-form-label-md">Monto total en caja</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total',
  'id' => 'fieldTotal',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total", $oSesion->total),"")
        ?>
    </div>
</div>
<?php echo form_error("total"); ?><div class="form-group row">
    <label for="fieldNum_consumos" class="col-sm-4 col-form-label col-form-label-md">Cantidad de consumos del dia</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'num_consumos',
  'id' => 'fieldNum_consumos',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("num_consumos", $oSesion->num_consumos),"")
        ?>
    </div>
</div>
<?php echo form_error("num_consumos"); ?><div class="form-group row">
    <label for="fieldTotal_ingresos" class="col-sm-4 col-form-label col-form-label-md">Total ingresos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_ingresos',
  'id' => 'fieldTotal_ingresos',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total_ingresos", $oSesion->total_ingresos),"")
        ?>
    </div>
</div>
<?php echo form_error("total_ingresos"); ?><div class="form-group row">
    <label for="fieldTotal_egresos" class="col-sm-4 col-form-label col-form-label-md">Total egresos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_egresos',
  'id' => 'fieldTotal_egresos',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total_egresos", $oSesion->total_egresos),"")
        ?>
    </div>
</div>
<?php echo form_error("total_egresos"); ?><div class="form-group row">
    <label for="fieldTotal_deben" class="col-sm-4 col-form-label col-form-label-md">Total deudas de clientes</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_deben',
  'id' => 'fieldTotal_deben',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total_deben", $oSesion->total_deben),"")
        ?>
    </div>
</div>
<?php echo form_error("total_deben"); ?><div class="form-group row">
    <label for="fieldTotal_sobra" class="col-sm-4 col-form-label col-form-label-md">Total dinero sobrante</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_sobra',
  'id' => 'fieldTotal_sobra',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total_sobra", $oSesion->total_sobra),"")
        ?>
    </div>
</div>
<?php echo form_error("total_sobra"); ?><div class="form-group row">
    <label for="fieldTotal_falta" class="col-sm-4 col-form-label col-form-label-md">Total dinero faltante</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'total_falta',
  'id' => 'fieldTotal_falta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("total_falta", $oSesion->total_falta),"")
        ?>
    </div>
</div>
<?php echo form_error("total_falta"); ?><div class="form-group row">
    <label for="fieldSobre_rojo" class="col-sm-4 col-form-label col-form-label-md">Dinero al sobre rojo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'sobre_rojo',
  'id' => 'fieldSobre_rojo',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("sobre_rojo", $oSesion->sobre_rojo),"")
        ?>
    </div>
</div>
<?php echo form_error("sobre_rojo"); ?><div class="form-group row">
    <label for="fieldSobre_verde" class="col-sm-4 col-form-label col-form-label-md">Dinero al sobre verde</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'sobre_verde',
  'id' => 'fieldSobre_verde',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("sobre_verde", $oSesion->sobre_verde),"")
        ?>
    </div>
</div>
<?php echo form_error("sobre_verde"); ?><div class="form-group row">
    <label for="fieldDeposito" class="col-sm-4 col-form-label col-form-label-md">Dinero depositado</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'deposito',
  'id' => 'fieldDeposito',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("deposito", $oSesion->deposito),"")
        ?>
    </div>
</div>
<?php echo form_error("deposito"); ?>
<div class="form-group row">
    <label for="fieldCerrado" class="col-sm-4 col-form-label col-form-label-md">Estado de la sesion</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'cerrado',
  'id' => 'fieldCerrado',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'cerrado',
    1 => 'abierto',
  ),
);
        echo form_radios($data,$data["options"],$oSesion->cerrado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("cerrado"); ?>

<div class="form-group row">
    <label for="fieldObservaciones" class="col-sm-4 col-form-label col-form-label-md">Observaciones</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'observaciones',
  'id' => 'fieldObservaciones',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("observaciones", $oSesion->observaciones),"")
        ?>
    </div>
</div>
<?php echo form_error("observaciones"); ?><div class="form-group row">
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

