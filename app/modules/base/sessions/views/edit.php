<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Sessions $model_sessions
 * @var Model_Sessions sessions
 * @var Model_Sessions $session
 */
?>

<h3><?= empty($oSession->id) ? "Agregar Sesiones del Sistema" : "Actualizando datos, Session #" . $oSession->id ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("base/sessions/edit/".$oSession->id,["id" => "sessionsEdit"]) ?>

<div class="form-group row">
    <label for="fieldIp_address" class="col-sm-4 col-form-label col-form-label-md">Ip address</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'ip_address',
  'id' => 'fieldIp_address',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("ip_address", $oSession->ip_address),"")
        ?>
    </div>
</div>
<?php echo form_error("ip_address"); ?><div class="form-group row">
    <label for="fieldTimestamp" class="col-sm-4 col-form-label col-form-label-md">Timestamp</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'timestamp',
  'id' => 'fieldTimestamp',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("timestamp", $oSession->timestamp),"")
        ?>
    </div>
</div>
<?php echo form_error("timestamp"); ?><div class="form-group row">
    <label for="fieldData" class="col-sm-4 col-form-label col-form-label-md">Datos en sesion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'data',
  'id' => 'fieldData',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_textarea($data,set_value("data", $oSession->data),"")
        ?>
    </div>
</div>
<?php echo form_error("data"); ?><div class="form-group row">
    <label for="fieldLast_activity" class="col-sm-4 col-form-label col-form-label-md">Last activity</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'last_activity',
  'id' => 'fieldLast_activity',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("last_activity", $oSession->last_activity),"")
        ?>
    </div>
</div>
<?php echo form_error("last_activity"); ?>
<div class="form-group row">
    <label for="fieldId_usuario" class="col-sm-4 col-form-label col-form-label-md">Nombre del Usuario</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_usuario',
  'id' => 'fieldId_usuario',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_usuarios',
);
        echo form_dropdown($data,$oUsuarios,$oSession->id_usuario);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_usuario"); ?>


<div class="form-group row">
    <label for="fieldId_hbf_sesion" class="col-sm-4 col-form-label col-form-label-md">Sesion de</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_hbf_sesion',
  'id' => 'fieldId_hbf_sesion',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_sesiones',
);
        echo form_default($data,$oSesiones,$oSession->id_hbf_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_hbf_sesion"); ?>



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

