<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_Ventas $model_ventas
 * @var Model_Ventas ventas
 * @var Model_Ventas $venta
 */
?>

<h3><?= empty($oVenta->id_venta) ? "Agregar Venta" : "Actualizando datos, Venta #" . $oVenta->id_venta ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/ventas/edit/".$oVenta->id_venta,["id" => "ventasEdit"]) ?>


<div class="form-group row">
    <label for="fieldId_club" class="col-sm-4 col-form-label col-form-label-md">Club</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_club',
  'id' => 'fieldId_club',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_clubs',
);
        echo form_select($data,$oClubs,$oVenta->id_club);
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
        echo form_select($data,$oTurnos,$oVenta->id_turno);
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
        echo form_select($data,$oSesiones,$oVenta->id_sesion);
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
        echo form_select($data,$oUsuarios,$oVenta->id_cliente);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_cliente"); ?>

<div class="form-group row">
    <label for="fieldFecha_venta" class="col-sm-4 col-form-label col-form-label-md">Fecha venta</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fecha_venta',
  'id' => 'fieldFecha_venta',
  'class' => 'form-control datepicker ',
  'placeholder' => '',
);
        echo form_input($data,set_value("fecha_venta", $oVenta->fecha_venta),"")
        ?>
    </div>
</div>
<?php echo form_error("fecha_venta"); ?>
<div class="form-group row">
    <label for="fieldId_producto" class="col-sm-4 col-form-label col-form-label-md">Producto</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_producto',
  'id' => 'fieldId_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'hbf_productos',
);
        echo form_dropdown($data,$oProductos,$oVenta->id_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_producto"); ?>

<div class="form-group row">
    <label for="fieldPrecio" class="col-sm-4 col-form-label col-form-label-md">Precio</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'precio',
  'id' => 'fieldPrecio',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("precio", $oVenta->precio),"")
        ?>
    </div>
</div>
<?php echo form_error("precio"); ?><div class="form-group row">
    <label for="fieldObservaciones" class="col-sm-4 col-form-label col-form-label-md">Observaciones</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'observaciones',
  'id' => 'fieldObservaciones',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("observaciones", $oVenta->observaciones),"")
        ?>
    </div>
</div>
<?php echo form_error("observaciones"); ?><div class="form-group row">
    <label for="fieldA_cuenta" class="col-sm-4 col-form-label col-form-label-md">A cuenta</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'a_cuenta',
  'id' => 'fieldA_cuenta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("a_cuenta", $oVenta->a_cuenta),"")
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
        echo form_number($data,set_value("saldo", $oVenta->saldo),"")
        ?>
    </div>
</div>
<?php echo form_error("saldo"); ?>
<div class="form-group row">
    <label for="fieldEntregado" class="col-sm-4 col-form-label col-form-label-md">Fue Entregado?</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'entregado',
  'id' => 'fieldEntregado',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'si',
    1 => 'no',
  ),
);
        echo form_radios($data,$data["options"],$oVenta->entregado);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("entregado"); ?>


<div class="form-group row">
    <label for="fieldPagado" class="col-sm-4 col-form-label col-form-label-md">Fue Pagado?</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'pagado',
  'id' => 'fieldPagado',
  'class' => 'form-control ',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'si',
    1 => 'no',
  ),
);
        echo form_radios($data,$data["options"],$oVenta->pagado);
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

<script>
    $(document).ready(function(){
        $('#fieldId_producto').click(function(){
            console.log($('#fieldId_producto').val());
        });
    });
</script>