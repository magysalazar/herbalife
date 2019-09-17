<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_usuarios $model_usuarios
 * @var Model_usuarios usuarios
 * @var Model_usuarios $usuario
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('base', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Cliented</strong>
            </li>
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
                    <label class="control-label" for="product_name">Tipos de Usuarios</label>
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
                        <?= anchor("base/usuarios/edit/tipo_usuario", "<i class='fa fa-plus'></i> Agregar Clientes", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Celular 1</th>
                <th>Username</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oUsuarios)) { ?>
                                <?php foreach ($oUsuarios as $oUsuario) {
                                    $editLink = "base/usuarios/edit/";
                                    
//                                    if(validateVar($oUsuario->id_tipo_usuario, 'numeric')){
//                                        if($table_name == 'ci_options'){
//                                            $editTag = CiSettingsQuery::create()->findOneByIdSetting($oUsuario->id_tipo_usuario)->getEditTag();
//                                        } else {
//                                            $editTag = CiOptionsQuery::create()->findOneByIdOption($oUsuario->id_tipo_usuario)->getEditTag();
//                                        }
//                                        $editLink .= explode('edit-',$editTag)[1].'/';
//                                    }
                                    
                                    $editLink .= $oUsuario->id_usuario;
                                    ?>
                                    <tr>
                                        <td><?= $oUsuario->nombre; ?></td>               
                <td><?= $oUsuario->apellido; ?></td>               
                <td><?= $oUsuario->sexo; ?></td>               
                <td><?= $oUsuario->cellphone_number_1; ?></td>               
                <td><?= $oUsuario->username; ?></td>               
                <td><?= $oUsuario->date_created; ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("base/usuarios/delete/" . $oUsuario->id_usuario, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar usuarios registrados</td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Celular 1</th>
                <th>Username</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
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