<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_clubs $model_clubs
 * @var Model_clubs clubs
 * @var Model_clubs $club
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">


                <strong>Lista de Clubs</strong>

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">Club</label>
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
                        <?= anchor("admin/clubs/edit", "<i class='fa fa-plus'></i> Agregar Club", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                        <?php

                        ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Licencia</th>
                <th>Direccion_gps</th>
                <th>Fecha de creación</th>

                                <th class="text-right" data-sort-ignore="true">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($oClubs)) { ?>
                                <?php foreach ($oClubs as $oClub) {
                                    $editLink = "admin/clubs/edit/";

                                    $editLink .= $oClub->id_club;
                                    ?>
                                    <tr>
                                        <td><?= $oClub->nombre; ?></td>
                <td><?= $oClub->email; ?></td>
                <td><?= $oClub->direccion; ?></td>
                <td><?= $oClub->licencia; ?></td>
                <td><?= $oClub->direccion_gps; ?></td>
                <td><?= $oClub->date_created; ?></td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit($editLink, "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("admin/clubs/delete/" . $oClub->id_club, "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar clubs registrados</td>
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
