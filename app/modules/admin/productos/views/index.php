<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_productos $model_productos
 * @var Model_productos productos
 * @var Model_productos $producto
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Inventario</h2>
        <ol class="breadcrumb">

        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">Inventario</label>
                    <input type="text" id="product_name" name="product_name" value=""
                           placeholder="Product Name" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                        <?= anchor("admin/productos/edit", "<i class='fa fa-plus'></i> Agregar Inventario", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipos de Inventarios</th>
                <th>Categorias de Inventarios</th>
                <th>Imagen del Inventario</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oProductos)) { ?>
                                <?php foreach ($oProductos as $oProducto) {
                                    $editLink = "admin/productos/edit/";

                                    $editLink .= $oProducto->id_producto;
                                    ?>
                                    <tr>
                                        <td><?= $oProducto->nombre; ?></td>
                <td><?= $oProducto->descripcion; ?></td>
                <td><?= $oProducto->id_option_tipo_producto; ?></td>
                <td><?= $oProducto->id_option_categoria_producto; ?></td>
                <td><?= img('assets/img/productos/thumbs/'.$oProducto->foto_producto_thumb1); ?></td>
                <td><?= $oProducto->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/productos/delete/" . $oProducto->id_producto, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar productos registrados</td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Estic Framework &copy; 2018-2019
    </div>
</div>
