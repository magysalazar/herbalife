<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_detalles_pedidos $model_detalles_pedidos
 * @var Model_detalles_pedidos detalles_pedidos
 * @var Model_detalles_pedidos $detalle_pedido
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista Detalle de Pedidos</h2>


    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">Detalle de Pedidos</label>
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
                        <?= anchor("admin/detalle_pedidos/edit", "<i class='fa fa-plus'></i> Agregar Detalle de Pedidos", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Datos del Cliente</th>
                <th>Vaso del Cliente</th>
                <th>Fecha de creación</th>



                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oDetalles_pedidos)) { ?>
                                <?php foreach ($oDetalles_pedidos as $oDetalle_pedido) {
                                    $editLink = "admin/detalles_pedidos/edit/";

                                    $editLink .= $oDetalle_pedido->id_detalle_pedido;
                                    ?>
                                    <tr>
                                        <td><?= setTitleFromObject($oDetalle_pedido,['id_comanda_nombre','id_comanda_apellido']); ?></td>
                                        <td><?= setTitleFromObject($oDetalle_pedido,['id_vaso_nombre','id_vaso_apellido']); ?></td>
                <td><?= $oDetalle_pedido->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/detalles_pedidos/delete/" . $oDetalle_pedido->id_detalle_pedido, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar detalles_pedidos registrados</td>
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
