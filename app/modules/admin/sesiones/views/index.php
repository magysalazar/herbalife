<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 * @var Model_sesiones $model_sesiones
 * @var Model_sesiones sesiones
 * @var Model_sesiones $sesion
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Sesiones</h2>
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
                    <label class="control-label" for="product_name">Sesion</label>
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
                        <?= anchor("admin/sesiones/edit", "<i class='fa fa-plus'></i> Agregar Sesion", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        echo anchor("admin/sesiones/edit/ini", "<i class='fa fa-plus'></i> Agregar Ini", "class='btn btn-primary btn-xs m-l-sm'");

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre del club</th>
                <th>Turno de</th>
                <th>Sesion a cargo de</th>
                <th>Detalle</th>
                <th>Monto inicial en caja</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oSesiones)) { ?>
                                <?php foreach ($oSesiones as $oSesion) {
                                    $editLink = "admin/sesiones/edit/";

//                                    if(validateVar($oSesion->id_opcion_sesion, 'numeric')){
//                                        if($table_name == 'ci_options'){
//                                            $editTag = CiSettingsQuery::create()->findOneByIdSetting($oSesion->id_opcion_sesion)->getEditTag();
//                                        } else {
//                                            $editTag = CiOptionsQuery::create()->findOneByIdOption($oSesion->id_opcion_sesion)->getEditTag();
//                                        }
//                                        $editLink .= explode('edit-',$editTag)[1].'/';
//                                    }

                                    $editLink .= $oSesion->id_sesion;
                                    ?>
                                    <tr>
                                        <td><?= HbfClubsQuery::create()->findOneByIdClub($oSesion->id_club)->getNombre() ; ?></td>
                <td><?= CiUsuariosQuery::create()->findOneByIdUsuario(HbfTurnosQuery::create()->findOneByIdTurno($oSesion->id_turno)->getIdAsociado())->getNombre(); ?></td>
                <td><?= CiUsuariosQuery::create()->findOneByIdUsuario($oSesion->id_asociado)->getNombre(); ?></td>
                <td><?= $oSesion->detalle; ?></td>
                <td><?= $oSesion->caja_inicial; ?></td>
                <td><?= $oSesion->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/sesiones/delete/" . $oSesion->id_sesion, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar sesiones registrados</td>
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
