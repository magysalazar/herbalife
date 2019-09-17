<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Productos $model_productos
 * @var Model_Productos productos
 * @var Model_Productos $producto
 */
?>

<h3><?= empty($oProducto->id_producto) ? "Agregar Inventario" : "Actualizando datos, Inventario #" . $oProducto->id_producto ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/productos/edit/".$oProducto->id_producto,["id" => "productosEdit"]) ?>

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
        echo form_default($data,set_value("nombre", $oProducto->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data,set_value("descripcion", $oProducto->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?>
<div class="form-group row">
    <label for="fieldId_option_tipo_producto" class="col-sm-4 col-form-label col-form-label-md">Tipos de Productos</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_option_tipo_producto',
  'id' => 'fieldId_option_tipo_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_dropdown($data,$oOptionTipoProducto,$oProducto->id_option_tipo_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_option_tipo_producto"); ?>


<div class="form-group row">
    <label for="fieldId_option_categoria_producto" class="col-sm-4 col-form-label col-form-label-md">Categorias de Productos</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = array (
  'name' => 'id_option_categoria_producto',
  'id' => 'fieldId_option_categoria_producto',
  'class' => 'form-control ',
  'placeholder' => '',
  'table' => 'ci_options',
);
        echo form_dropdown($data,$oOptionCategoriaProducto,$oProducto->id_option_categoria_producto);
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("id_option_categoria_producto"); ?>

<div class="form-group row">
    <label for="fieldFoto_producto" class="col-sm-4 col-form-label col-form-label-md">Imagen del producto</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'foto_producto',
  'id' => 'fieldFoto_producto',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo img('assets/img/productos/thumbs/'.$oProducto->foto_producto_thumb2);
        echo form_upload($data,set_value("foto_producto", $oProducto->foto_producto),"");
        ?>
    </div>
</div>
<?php echo form_error("foto_producto"); ?><div class="form-group row">
    <label for="fieldPrecio_venta" class="col-sm-4 col-form-label col-form-label-md">Precio de ventra</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'precio_venta',
  'id' => 'fieldPrecio_venta',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("precio_venta", $oProducto->precio_venta),"")
        ?>
    </div>
</div>
<?php echo form_error("precio_venta"); ?><div class="form-group row">
    <label for="fieldPrecio_porcion" class="col-sm-4 col-form-label col-form-label-md">Precio de una porcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'precio_porcion',
  'id' => 'fieldPrecio_porcion',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("precio_porcion", $oProducto->precio_porcion),"")
        ?>
    </div>
</div>
<?php echo form_error("precio_porcion"); ?><div class="form-group row">
    <label for="fieldPrecio_compra" class="col-sm-4 col-form-label col-form-label-md">Precio de Compra</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'precio_compra',
  'id' => 'fieldPrecio_compra',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data,set_value("precio_compra", $oProducto->precio_compra),"")
        ?>
    </div>
</div>
<?php echo form_error("precio_compra"); ?><div class="form-group row">
    <label for="fieldNum_porciones" class="col-sm-4 col-form-label col-form-label-md">Numero de Porciones</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'num_porciones',
  'id' => 'fieldNum_porciones',
  'class' => 'form-control dial m-r-sm',
  'placeholder' => '',
  'data-fgColor' => '#1AB394',
  'data-width' => '70',
  'data-height' => '70',
  'data-step' => '10',
);
        echo form_number($data,set_value("num_porciones", $oProducto->num_porciones),"")
        ?>
    </div>
</div>
<?php echo form_error("num_porciones"); ?>

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

