<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 05/07/2018
 * Time: 6:19 pm
 * @var Model_comandas $model_comandas
 * @var Model_comandas comandas
 * @var Model_comandas $comanda
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Comandas</h2>

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
                    <label class="control-label" for="product_name">Comanda</label>
                    <input type="text" id="nombre del producto" name="nombre del producto" value=""
                           placeholder="nombre del producto" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                        <?= anchor("admin/comandas/edit", "<i class='fa fa-plus'></i> Agregar Comanda", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre del Club</th>
                <th>Turno de</th>
                <th>Sesion de</th>
                <th>Nombre del Cliente</th>
                <th>Agregar batidos</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($oComandas)) { ?>
                                <?php foreach ($oComandas as $oComanda) {
                                    $editLink = "admin/comandas/edit/";

                                    $editLink .= $oComanda->id_comanda;
                                    ?>
                                    <tr>
                                        <td><?= setTitleFromObject($oComanda,'id_club_nombre'); ?></td>
                                        <td><?= setTitleFromObject($oComanda, ['id_turno_descripcion']); ?></td>
                                        <td><?= setTitleFromObject($oComanda, ['id_sesion_id_asociado']); ?></td>
                                        <td><?= setTitleFromObject($oComanda,['id_cliente_nombre','id_cliente_apellido']); ?></td>

                                        <td>
                                            <?php
                                            $data = array (
                                                'name' => 'ids_vasos',
                                                'id' => 'fieldIds_vasos',
                                                'class' => 'form-control ',
                                                'placeholder' => '',
                                                'onclick' => 'oModal.open(this)',
                                                'subTable' => 'hbf_vasos',
                                                'action' => 'edit',
                                                'content' => 'Agregar vasos',
                                            );
                                            $data = setInputData($data,$oComanda);
                                            echo form_button($data,set_value("ids_vasos", $oComanda->ids_vasos),"")
                                            ?>
                                        </td>
                                        <td><?= $oComanda->date_created; ?></td>


                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("/admin/comandas/delete/" . $oComanda->id_comanda.'/', "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar comandas registrados</td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>
                        </table>




</div>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Estic Framework &copy; 2018-2019
    </div>
</div>
<?=modal('fieldIds_vasosModal')?>
