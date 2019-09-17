<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 05/07/2018
 * Time: 6:19 pm
 * @var Model_Comandas $model_comandas
 * @var Model_Comandas comandas
 * @var Model_Comandas $comanda
 * @var HbfTurnos $oTurnoSess
 * @var HbfSesiones $oSesionSess
 * @var HbfClubs $oClubSess
 */
?>

<h3><?= empty($oComanda->id_comanda) ? "Agregar Comanda" : "Actualizando datos, Comanda #" . $oComanda->id_comanda ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/comandas/edit/".$oComanda->id_comanda,["id" => "comandasEdit"]) ?>


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
        echo form_select($data,$oClubs,$oComanda->id_club);
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
        echo form_select($data,$oTurnos,$oComanda->id_turno);
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
        echo form_select($data,$oSesiones,$oComanda->id_sesion);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_sesion"); ?>


<div class="form-group row">
    <label for="fieldId_cliente" class="col-sm-4 col-form-label col-form-label-md">Nombre del Cliente</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_cliente',
  'id' => 'fieldId_cliente',
  'class' => 'form-control ',
  'placeholder' => '',
  'button' =>
  array (
    'content' => 'Nuevo Cliente',
    'action' => 'edit',
    'subTable' => 'ci_usuarios',
    'subView' => 'draft',
    'onclick' => 'oModal.open(this)',
    'id' => 'fieldId_cliente',
    'class' => 'form-control ',
  ),
  'table' => 'ci_usuarios',
);
        echo form_default($data,$oUsuarios,$oComanda->id_cliente);

        echo form_button($data['button']);

        ?>
    </div>
</div>
<?php echo form_error("id_cliente"); ?>

<div class="form-group row">
    <label for="fieldIds_vasos" class="col-sm-4 col-form-label col-form-label-md">Agregar batidos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'ids_vasos',
  'id' => 'fieldIds_vasos',
  'class' => 'form-control ',
  'placeholder' => '',
  'onclick' => 'oCrud.save(this,oModal.open); oComanda.resetValues()',
  'subTable' => 'hbf_vasos',
  'action' => 'edit',
  'content' => 'Haz click para agregar batidos',
);
        echo form_button($data,set_value("ids_vasos", $oComanda->ids_vasos),"")
        ?>
    </div>
</div>
<?php echo form_error("ids_vasos"); ?><div class="form-group row">
    <label for="fieldImporte" class="col-sm-4 col-form-label col-form-label-md">Costo Total (Bs)</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'importe',
  'id' => 'fieldImporte',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("importe", $oComanda->importe),"")
        ?>
    </div>
</div>
<?php echo form_error("importe"); ?><div class="form-group row">
    <label for="fieldA_cuenta" class="col-sm-4 col-form-label col-form-label-md">A cuenta (Bs)</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'a_cuenta',
  'id' => 'fieldA_cuenta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("a_cuenta", $oComanda->a_cuenta),"")
        ?>
    </div>
</div>
<?php echo form_error("a_cuenta"); ?><div class="form-group row">
    <label for="fieldSaldo" class="col-sm-4 col-form-label col-form-label-md">Saldo (Bs)</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'saldo',
  'id' => 'fieldSaldo',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("saldo", $oComanda->saldo),"")
        ?>
    </div>






</div>
<?php echo form_error("saldo"); ?>
<div class="form-group row">
    <label for="fieldPrioridad" class="col-sm-4 col-form-label col-form-label-md">Prioridad</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'prioridad',
  'id' => 'fieldPrioridad',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' =>
  array (
    0 => 'programada',
    1 => 'normal',
    2 => 'rapida',
  ),
);
        echo form_radios($data,$data["options"],$oComanda->prioridad);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("prioridad"); ?>

<div class="form-group row">
    <label for="fieldHora_entrega" class="col-sm-4 col-form-label col-form-label-md">Hora entrega</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'hora_entrega',
  'id' => 'fieldHora_entrega',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("hora_entrega", $oComanda->hora_entrega),"")



        ?>
    </div>


</div>

<?php echo form_error("hora_entrega"); ?>
<div class="form-group row">
    <label for="fieldTipo_consumo" class="col-sm-4 col-form-label col-form-label-md">Tipo de Consumo</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'tipo_consumo',
  'id' => 'fieldTipo_consumo',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' =>
  array (
    0 => 'Socio',
    1 => 'Estudiante',
  ),
);
        echo form_select($data,$data["options"],$oComanda->tipo_consumo);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("tipo_consumo"); ?>

<div class="form-group row">
    <label for="fieldComentarios" class="col-sm-4 col-form-label col-form-label-md">Comentarios</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'comentarios',
  'id' => 'fieldComentarios',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data,set_value("comentarios", $oComanda->comentarios),"")
        ?>
    </div>
</div>
<?php echo form_error("comentarios"); ?>
<div class="form-group row">
    <label for="fieldId_ficha_prepago" class="col-sm-4 col-form-label col-form-label-md">Ficha Prepago</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_ficha_prepago',
  'id' => 'fieldId_ficha_prepago',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_prepagos',
);
        echo form_select($data,$oPrepagos,$oComanda->id_ficha_prepago);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_ficha_prepago"); ?>


<div class="form-group row">
    <label for="fieldPagado" class="col-sm-4 col-form-label col-form-label-md">Estado de la comanda</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'pagado',
  'id' => 'fieldPagado',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' =>
  array (
    0 => 'debe',
    1 => 'pagado',
  ),
);
        echo form_radios($data,$data["options"],$oComanda->pagado);
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


            <?=modal('fieldId_clienteModal')?>
            <?=modal('fieldIds_vasosModal')?>
