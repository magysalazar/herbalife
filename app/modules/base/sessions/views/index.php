<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_sessions $model_sessions
 * @var Model_sessions sessions
 * @var Model_sessions $session
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Sesiones del Sistema</h2>
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
                    <label class="control-label" for="product_name">Sesiones del Sistema</label>
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
                        <?= anchor("base/sessions/edit", "<i class='fa fa-plus'></i> Agregar Sesiones del Sistema", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Ip_address</th>
                <th>Timestamp</th>
                <th>Last_activity</th>
                <th>Nombre del Usuario</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oSessions)) { ?>
                                <?php foreach ($oSessions as $oSession) {
                                    $editLink = "base/sessions/edit/";

                                    $editLink .= $oSession->id;
                                    ?>
                                    <tr>
                                        <td><?= $oSession->ip_address; ?></td>
                <td><?= $oSession->timestamp; ?></td>
                <td><?= $oSession->last_activity; ?></td>
                <td><?= $oSession->id_usuario; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("base/sessions/delete/" . $oSession->id, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar sessions registrados</td>
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
