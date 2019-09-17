<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_vasos $model_vasos
 * @var Model_vasos vasos
 * @var Model_vasos $vaso
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Vasos</h2>
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
                    <label class="control-label" for="product_name">Vaso</label>
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
                        <?= anchor("admin/vasos/edit", "<i class='fa fa-plus'></i> Agregar Vaso", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Comanda del Cliente</th>
                <th>Nivel del vaso (0% - 100%)</th>
                <th>Temperatura</th>
                <th>Consistencia</th>
                <th>Tipos de Productos</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oVasos)) { ?>
                                <?php foreach ($oVasos as $oVaso) {
                                    $editLink = "admin/vasos/edit/";

                                    $editLink .= $oVaso->id_vaso;
                                    ?>
                                    <tr>
                                        <td><?= setTitleFromObject($oVaso, ['id_comanda_nombre','id_comanda_apellido']); ?></td>
                <td><?= $oVaso->nivel; ?></td>
                <td><?= $oVaso->temperatura; ?></td>
                <td><?= $oVaso->consistencia; ?></td>
                <td><?= $oVaso->id_opcion_tipo_producto; ?></td>
                <td><?= $oVaso->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/vasos/delete/" . $oVaso->id_vaso, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar vasos registrados</td>
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
