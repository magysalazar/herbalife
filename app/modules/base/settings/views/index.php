<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 * @var Model_settings $model_settings
 * @var Model_settings settings
 * @var Model_settings $setting
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Configuraciones del Sistema</h2>
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
                    <label class="control-label" for="product_name">Configuraciones del Sistema</label>
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
                        <?= anchor("base/settings/edit", "<i class='fa fa-plus'></i> Agregar Configuraciones del Sistema", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Id_setting</th>
                <th>Tabla</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Columna Referencia</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oSettings)) { ?>
                                <?php foreach ($oSettings as $oSetting) {
                                    $editLink = "base/settings/edit/";

                                    $editLink .= $oSetting->id_setting;
                                    ?>
                                    <tr>
                                        <td><?= $oSetting->id_setting; ?></td>
                <td><?= $oSetting->tabla; ?></td>
                <td><?= $oSetting->nombre; ?></td>
                <td><?= $oSetting->descripcion; ?></td>
                <td><?= $oSetting->id_field; ?></td>
                <td><?= $oSetting->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("base/settings/delete/" . $oSetting->id_setting, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar settings registrados</td>
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
