<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_options $model_options
 * @var Model_options options
 * @var Model_options $option
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Opciones del Sistema</h2>
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
                    <label class="control-label" for="product_name">Opciones del Sistema</label>
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
                        <?= anchor("base/options/edit", "<i class='fa fa-plus'></i> Agregar Opciones del Sistema", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        echo anchor("base/options/edit/roles", "<i class='fa fa-plus'></i> Agregar Roles", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/prepagos", "<i class='fa fa-plus'></i> Agregar Prepagos", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/modulos", "<i class='fa fa-plus'></i> Agregar Modulos", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/tipo_asociado", "<i class='fa fa-plus'></i> Agregar tipo asociado", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/nivel_asociado", "<i class='fa fa-plus'></i> Agregar nivel asociado", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/tipo_usuario", "<i class='fa fa-plus'></i> Agregar tipo usuario", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/tipo_producto", "<i class='fa fa-plus'></i> Agregar tipo producto", "class='btn btn-primary btn-xs m-l-sm'");

                        echo anchor("base/options/edit/categoria_producto", "<i class='fa fa-plus'></i> Agregar categoria producto", "class='btn btn-primary btn-xs m-l-sm'");

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opcion para</th>
                <th>Nivel de usuario</th>
                <th>Precio</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oOptions)) { ?>
                                <?php foreach ($oOptions as $oOption) {
                                    $editLink = "base/options/edit/";

//                                    if(validateVar($oOption->id_setting, 'numeric')){
//                                        if($table_name == 'ci_options'){
//                                            $editTag = CiSettingsQuery::create()->findOneByIdSetting($oOption->id_setting)->getEditTag();
//                                        } else {
//                                            $editTag = CiOptionsQuery::create()->findOneByIdOption($oOption->id_setting)->getEditTag();
//                                        }
//                                        $editLink .= explode('edit-',$editTag)[1].'/';
//                                    }

                                    $editLink .= $oOption->id_option;
                                    ?>
                                    <tr>
                                        <td><?= $oOption->nombre; ?></td>
                <td><?= $oOption->descripcion; ?></td>
                <td><?= $oOption->id_setting; ?></td>
                <td><?= $oOption->nivel; ?></td>
                <td><?= $oOption->precio; ?></td>
                <td><?= $oOption->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("base/options/delete/" . $oOption->id_option, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar options registrados</td>
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
