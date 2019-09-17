<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Prepagos $model_prepagos
 * @var Model_Prepagos prepagos
 * @var Model_Prepagos $prepago
 */
?>

<h3><?= empty($oPrepago->id_prepago) ? "Agregar Prepago" : "Actualizando datos de Fichas Prepago #" . $oPrepago->id_prepago ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/prepagos/edit/".$oPrepago->id_prepago,["id" => "prepagosEdit"]) ?>


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
        echo form_dropdown($data,$oUsuarios,$oPrepago->id_cliente);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_cliente"); ?>


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
        echo form_select($data,$oTurnos,$oPrepago->id_turno);
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
        echo form_select($data,$oSesiones,$oPrepago->id_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_sesion"); ?>

<div class="form-group row">
    <label for="fieldFichas_total" class="col-sm-4 col-form-label col-form-label-md">Fichas total</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fichas_total',
  'id' => 'fieldFichas_total',
  'class' => 'form-control ',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("fichas_total", $oPrepago->fichas_total),"")
        ?>
    </div>
</div>
<?php echo form_error("fichas_total"); ?><div class="form-group row">
    <label for="fieldFichas_gratis" class="col-sm-4 col-form-label col-form-label-md">Fichas gratis</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fichas_gratis',
  'id' => 'fieldFichas_gratis',
  'class' => 'form-control ',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("fichas_gratis", $oPrepago->fichas_gratis),"")
        ?>
    </div>
</div>
<?php echo form_error("fichas_gratis"); ?><div class="form-group row">
    <label for="fieldFichas_usadas" class="col-sm-4 col-form-label col-form-label-md">Fichas usadas</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fichas_usadas',
  'id' => 'fieldFichas_usadas',
  'class' => 'form-control ',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("fichas_usadas", $oPrepago->fichas_usadas),"")
        ?>
    </div>
</div>
<?php echo form_error("fichas_usadas"); ?><div class="form-group row">
    <label for="fieldFichas_restantes" class="col-sm-4 col-form-label col-form-label-md">Fichas restantes</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fichas_restantes',
  'id' => 'fieldFichas_restantes',
  'class' => 'form-control ',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("fichas_restantes", $oPrepago->fichas_restantes),"")
        ?>
    </div>
</div>
<?php echo form_error("fichas_restantes"); ?>
<div class="form-group row">
    <label for="fieldId_option_tipo_prepago" class="col-sm-4 col-form-label col-form-label-md">Tipo de Prepago</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_option_tipo_prepago',
  'id' => 'fieldId_option_tipo_prepago',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_select($data,$oOptionTipoPrepago,$oPrepago->id_option_tipo_prepago);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_option_tipo_prepago"); ?>

<div class="form-group row">
    <label for="fieldA_cuenta" class="col-sm-4 col-form-label col-form-label-md">A cuenta</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'a_cuenta',
  'id' => 'fieldA_cuenta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("a_cuenta", $oPrepago->a_cuenta),"")
        ?>
    </div>
</div>
<?php echo form_error("a_cuenta"); ?><div class="form-group row">
    <label for="fieldSaldo" class="col-sm-4 col-form-label col-form-label-md">Saldo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'saldo',
  'id' => 'fieldSaldo',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("saldo", $oPrepago->saldo),"")
        ?>
    </div>
</div>
<?php echo form_error("saldo"); ?><div class="form-group row">
    <label for="fieldImporte" class="col-sm-4 col-form-label col-form-label-md">Importe</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'importe',
  'id' => 'fieldImporte',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("importe", $oPrepago->importe),"")
        ?>
    </div>
</div>
<?php echo form_error("importe"); ?>
<div class="form-group row">
    <label for="fieldPagado" class="col-sm-4 col-form-label col-form-label-md">Pagado</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'pagado',
  'id' => 'fieldPagado',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' =>
  array (
    0 => 'SI',
    1 => 'NO',
  ),
);
        echo form_radios($data,$data["options"],$oPrepago->pagado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("pagado"); ?>





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

