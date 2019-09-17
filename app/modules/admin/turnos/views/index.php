<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_turnos $model_turnos
 * @var Model_turnos turnos
 * @var Model_turnos $turno
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Turnos</h2>
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
                    <label class="control-label" for="product_name">Turno</label>
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
                        <?= anchor("admin/turnos/edit", "<i class='fa fa-plus'></i> Agregar Turno", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        echo anchor("admin/turnos/edit/ini", "<i class='fa fa-plus'></i> Agregar Ini", "class='btn btn-primary btn-xs m-l-sm'");

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre del Club</th>
                <th>Asociado a cargo</th>
                <th>Descripcion</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Cierre</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oTurnos)) { ?>
                                <?php foreach ($oTurnos as $oTurno) {
                                    $editLink = "admin/turnos/edit/";

//                                    if(validateVar($oTurno->id_opcion_turnos, 'numeric')){
//                                        if($table_name == 'ci_options'){
//                                            $editTag = CiSettingsQuery::create()->findOneByIdSetting($oTurno->id_opcion_turnos)->getEditTag();
//                                        } else {
//                                            $editTag = CiOptionsQuery::create()->findOneByIdOption($oTurno->id_opcion_turnos)->getEditTag();
//                                        }
//                                        $editLink .= explode('edit-',$editTag)[1].'/';
//                                    }
//
                                    $editLink .= $oTurno->id_turno;
                                    ?>
                                    <tr>
                                        <td><?= HbfClubsQuery::create()->findOneByIdClub($oTurno->id_club)->getNombre(); ?></td>
                <td><?= CiUsuariosQuery::create()->findOneByIdUsuario($oTurno->id_asociado)->getNombre(); ?></td>
                <td><?= $oTurno->descripcion; ?></td>
                <td><?= $oTurno->fec_inicio; ?></td>
                <td><?= $oTurno->fec_fin; ?></td>
                <td><?= $oTurno->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/turnos/delete/" . $oTurno->id_turno, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar turnos registrados</td>
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
