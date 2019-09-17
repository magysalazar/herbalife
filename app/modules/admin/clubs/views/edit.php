<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 * @var Model_Clubs $model_clubs
 * @var Model_Clubs clubs
 * @var Model_Clubs $club
 */
?>

<h3><?= empty($oClub->id_club) ? "Agregar Club" : "Actualizando datos, Club #" . $oClub->id_club ?></h3>

<?php
    //startInsertEachOne
    ?>

<?= form_open_multipart("admin/clubs/edit/".$oClub->id_club,["id" => "clubsEdit"]) ?>

<div class="form-group row">
    <label for="fieldNombre" class="col-sm-4 col-form-label col-form-label-md">Nombre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'nombre',
  'id' => 'fieldNombre',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("nombre", $oClub->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldEmail" class="col-sm-4 col-form-label col-form-label-md">Email</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'email',
  'id' => 'fieldEmail',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("email", $oClub->email),"")
        ?>
    </div>
</div>
<?php echo form_error("email"); ?><div class="form-group row">
    <label for="fieldDireccion" class="col-sm-4 col-form-label col-form-label-md">Direccion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'direccion',
  'id' => 'fieldDireccion',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("direccion", $oClub->direccion),"")
        ?>
    </div>
</div>
<?php echo form_error("direccion"); ?><div class="form-group row">
    <label for="fieldLicencia" class="col-sm-4 col-form-label col-form-label-md">Licencia</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'licencia',
  'id' => 'fieldLicencia',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data,set_value("licencia", $oClub->licencia),"")
        ?>
    </div>
</div>
<?php echo form_error("licencia"); ?><div class="form-group row">
    <label for="fieldDireccion_gps" class="col-sm-4 col-form-label col-form-label-md"></label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'direccion_gps',
  'id' => 'fieldDireccion_gps',
  'class' => 'form-control display-none ',
  'placeholder' => '',
);
        echo form_hidden($data,set_value("direccion_gps", $oClub->direccion_gps),"")
        ?>
    </div>
</div>
<?php echo form_error("direccion_gps"); ?><div class="form-group row">
    <label for="fieldIds_miembros" class="col-sm-4 col-form-label col-form-label-md">Agregar Miembros</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'ids_miembros',
  'id' => 'fieldIds_miembros',
  'class' => 'form-control ',
  'placeholder' => '',
  'onclick' => 'oModal.open(this)',
  'subTable' => 'hbf_usuarios',
  'action' => 'edit',
  'content' => 'Haz click para agregar nuevos miembros',
);
        echo form_button($data,set_value("ids_miembros", $oClub->ids_miembros),"")
        ?>
    </div>
</div>
<?php echo form_error("ids_miembros"); ?><div class="form-group row">
    <label for="fieldIds_turnos" class="col-sm-4 col-form-label col-form-label-md">Agregar Turnos</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'ids_turnos',
  'id' => 'fieldIds_turnos',
  'class' => 'form-control ',
  'placeholder' => '',
  'onclick' => 'oModal.open(this)',
  'subTable' => 'hbf_turnos',
  'action' => 'edit',
  'content' => 'Haz click para agregar nuevos turnos',
);
        echo form_button($data,set_value("ids_turnos", $oClub->ids_turnos),"")
        ?>
    </div>
</div>
<?php echo form_error("ids_turnos"); ?>

<div class="form-group row">
    <div class="col-sm-12 controls">
        <?php
        $data = array(
            "name" => "save",
            "value" => "Guardar",
            "id" => "btnSave",
            "class" => "btn btn-success"
        );
        echo form_submit($data) ?>
    </div>
</div>
<?php echo form_close();
if(validateArray($errors,'error')){?>
    <div class="row">
        <div class="col-md-12">
            <?=$errors['error']?>
        </div>
    </div>
<?php } ?>
<?php
//endInsertEachOne
?>


            <?=modal('fieldIds_miembrosModal')?>
            <?=modal('fieldIds_turnosModal')?>