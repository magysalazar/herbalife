<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Detalles_pedidos $model_detalles_pedidos
 * @var Model_Detalles_pedidos detalles_pedidos
 * @var Model_Detalles_pedidos $detalle_pedido
 * @var HbfProductos $objProducto
 *
 */
?>

<h3><?= empty($oDetalle_pedido->id_detalle_pedido) ? "Agregar Detalles de Pedidos" : "Actualizando datos, Detalle_pedido #" . $oDetalle_pedido->id_detalle_pedido ?></h3>

<?php
    foreach ($oProductos as $id_producto => $oProducto) {
        $objProducto = HbfProductosQuery::create()->findOneByIdProducto($id_producto);
        if($secondSegment == 'ajax'){ ?>
            <?= form_open_multipart("admin/detalles_pedidos/edit/" . $oDetalle_pedido->id_detalle_pedido, ["id" => "detalles_pedidosEdit"]) ?>


            <div class="form-group row">
                <label for="fieldId_comanda" class="col-sm-4 col-form-label col-form-label-md">Comanda del
                    Cliente</label>
                <div class="col-sm-6 two-columns">
                    <?php
                    $data = array(
                        'name' => 'id_comanda',
                        'id' => 'fieldId_comanda',
                        'class' => 'form-control ',
                        'placeholder' => '',
                        'table' => 'hbf_comandas',
                    );
                    echo form_select($data, $oComandas, $oDetalle_pedido->id_comanda);
                    //printSecondItem
                    ?>
                </div>
            </div>
            <?php echo form_error("id_comanda"); ?>


            <div class="form-group row">
                <label for="fieldId_vaso" class="col-sm-4 col-form-label col-form-label-md">Vaso del Cliente</label>
                <div class="col-sm-6 two-columns">
                    <?php
                    $data = array(
                        'name' => 'id_vaso',
                        'id' => 'fieldId_vaso',
                        'class' => 'form-control ',
                        'placeholder' => '',
                        'table' => 'hbf_vasos',
                    );
                    echo form_select($data, $oVasos, $oDetalle_pedido->id_vaso);
                    //printSecondItem
                    ?>
                </div>
            </div>
            <?php echo form_error("id_vaso"); ?>


            <div class="form-group row">
                <label for="fieldId_producto" class="col-sm-4 col-form-label col-form-label-md">Producto</label>
                <div class="col-sm-6 two-columns">
                    <?php
                    $data = array(
                        'name' => 'id_producto',
                        'id' => 'fieldId_producto',
                        'class' => 'form-control ',
                        'onclick' => 'oComanda.calcularImporte(this)',
                        'placeholder' => '',
                        'table' => 'hbf_productos',
                        'data-id-prod' => $objProducto->getIdProducto(),
                        'data-compra' => $objProducto->getPrecioCompra(),
                        'data-venta' => $objProducto->getPrecioVenta(),
                        'data-porcion' => $objProducto->getPrecioPorcion()
                    );
                    echo form_checkbox($data, array(
                        $id_producto => $oProducto,
                    ), $oDetalle_pedido->id_producto);
                    //printSecondItem
                    ?>
                </div>
            </div>
            <?php echo form_error("id_producto"); ?>

            <div class="form-group row">
                <label for="fieldCantidad" class="col-sm-4 col-form-label col-form-label-md">Cantidad</label>
                <div class="col-sm-6">
                    <?php
                    $data = array(
                        'name' => 'cantidad',
                        'id' => 'fieldCantidad',
                        'class' => 'form-control field-cantidad',
                        'placeholder' => '',
                        'onchange' => 'oComanda.calcularImporte(this)',
                        'onscroll' => 'oComanda.calcularImporte(this)',
                        'data-fgColor' => '#1AB394',
                        'data-width' => '70',
                        'data-height' => '70',
                        'data-max' => 4,
                        'data-step' => '1',
                        'data-id-prod-cantidad' => $objProducto->getIdProducto()
                    );
                    echo form_number($data, set_value("cantidad", $oDetalle_pedido->cantidad), "")
                    ?>
                </div>
            </div>
            <?php echo form_error("cantidad"); ?>

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
            if (validateArray($errors, 'error')) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $errors['error'] ?>
                    </div>
                </div>
            <?php } ?>
        <?php } else {
            if ($oDetalle_pedido->id_producto == $id_producto) {
                ?>

                <?= form_open_multipart("admin/detalles_pedidos/edit/" . $oDetalle_pedido->id_detalle_pedido, ["id" => "detalles_pedidosEdit"]) ?>


                <div class="form-group row">
                    <label for="fieldId_comanda" class="col-sm-4 col-form-label col-form-label-md">Nombre del
                        Cliente</label>
                    <div class="col-sm-6 two-columns">
                        <?php
                        $data = array(
                            'name' => 'id_comanda',
                            'id' => 'fieldId_comanda',
                            'class' => 'form-control ',
                            'placeholder' => '',
                            'table' => 'hbf_comandas',
                        );
                        echo form_select($data, $oComandas, $oDetalle_pedido->id_comanda);
                        //printSecondItem
                        ?>
                    </div>
                </div>
                <?php echo form_error("id_comanda"); ?>






                <div class="form-group row">
                    <label for="fieldId_producto" class="col-sm-4 col-form-label col-form-label-md">Producto</label>
                    <div class="col-sm-6 two-columns">
                        <?php
                        $data = array(
                            'name' => 'id_producto',
                            'id' => 'fieldId_producto',
                            'class' => 'form-control ',
                            'placeholder' => '',
                            'table' => 'hbf_productos',
                            'data-5' => isset($oProducto->precio_venta) ? $oProducto->precio_venta : '',
                            'data-6' => isset($oProducto->precio_porcion) ? $oProducto->precio_porcion : '',
                            'data-7' => isset($oProducto->precio_compra) ? $oProducto->precio_compra : '',
                        );
                        echo form_checkbox($data, array(
                            $id_producto => $oProducto,
                        ), $oDetalle_pedido->id_producto);
                        //printSecondItem
                        ?>
                    </div>
                </div>
                <?php echo form_error("id_producto"); ?>

                <div class="form-group row">
                    <label for="fieldCantidad" class="col-sm-4 col-form-label col-form-label-md">Cantidad</label>
                    <div class="col-sm-6">
                        <?php
                        $data = array(
                            'name' => 'cantidad',
                            'id' => 'fieldCantidad',
                            'class' => 'form-control dial m-r-sm',
                            'placeholder' => '',
                            'data-fgColor' => '#1AB394',
                            'data-width' => '70',
                            'data-height' => '70',
                            'data-max' => 4,
                            'data-step' => '1',
                            'max' => "4",
                            'min' => "1"
                        );
                        $numPorciones = 4;
                        echo form_number($data, set_value("cantidad", $oDetalle_pedido->cantidad), "")
                        ?>
                    </div>
                </div>
                <?php echo form_error("cantidad"); ?>


                </div>
                <?php echo form_close();
                if (validateArray($errors, 'error')) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $errors['error'] ?>
                        </div>
                    </div>
                <?php } ?>

              <div class="form-group row">
                <label for="fieldId_vaso" class="col-sm-4 col-form-label col-form-label-md">Precio del Vaso</label>
                <div class="col-sm-6 two-columns">
                  <?php
                  $data = array(
                    'name' => 'id_vaso',
                    'id' => 'fieldId_vaso',
                    'class' => 'form-control ',
                    'placeholder' => '',
                    'table' => 'hbf_vasos',
                  );
                  echo form_select(100);
                  //printSecondItem
                  ?>
                </div>
              </div>
              <?php echo form_error("id_vaso"); ?>





<div class="form-group row">
  <div class="col-sm-12 controls">
    <?php
    $data = array(
      "name" => "save",
      "value" => "Guardar",
      "id" => "btnSave",
      "class" => "btn btn-success",
      "onclick" => "oComanda.resetValues()"
    );
    echo form_submit($data) ?>
  </div>
                <?php
            }
        }
    }
?>

