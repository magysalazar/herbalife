<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/14/2017
 * Time: 3:13 AM
 */

?>
<div class="container">
    <div class="row text-center">
        <div class="col">
        </div>
        <div class="col-5 col-md-auto">
            <button id="btn_admin" type="button" class="btn btn-primary btn-admin" data-toggle="modal" data-target="#userModal">Ingresar como administrador</button>
        </div>
        <div class="col">
        </div>
    </div>
</div>

<div class="modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
     aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn btn-success" id="btnLogin" onclick="oUser.login()"><h5 class="modal-title" id="userModalLabel">Ingresar</h5></button>
                <button class="btn btn-primary" id="btnRegister" onclick="oUser.regiter()"><h5 class="modal-title" id="userModalLabel">Registrarse</h5></button>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modLogin" class="modal-body">
                <?= validation_errors()?>
                <?= form_open('base/sessions/login') ?>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <?= form_input('email','','id="login-email" class="form-control" placeholder="username or email"')?>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                    <?= form_password('password','','id="login-password" class="form-control" placeholder="password"')?>
                </div>


                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <?= form_submit('login','Ingresar','id="btn-login" class="btn btn-success"')?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div id="modRegister" class="modal-body display-none">
                <?= validation_errors()?>
                <?= form_open('base/sessions/signup') ?>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <?= form_input('email','','id="login-email" class="form-control" placeholder="username or email"')?>
                </div>

                    <div class="form-group row">
                        <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Password  </label>

                        <div class="col-sm-6"><?php
                            $data = array(
                                "name" => "password",
                                "id" => "fieldPassword",
                                "class" => "form-control ",
                                "value" => "",
                            );
                            echo form_password($data, "", ""); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Confirmar Password  </label>
                    <div class="col-sm-6">
                        <?php
                        $data = array(
                            "placeholder" => "Confirmar contraseña",
                            "name" => "password_confirm",
                            "id" => "fieldConfirmPassword",
                            "class" => "form-control "
                        );
                        echo form_password($data, "", "") ?>
                    </div>
                    </div><?php echo form_error("password"); ?>

                <div class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <?= form_submit('login','Registrarse','id="btn-login" class="btn btn-success"')?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer ">
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div class="text-left">
                            No tienes Cuenta?
                            <a id="linkRegister" href="#">
                                Registrate aqui!
                            </a>
                        </div>
                    </div>
                </div>
                <button id="cerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#modRegister').addClass('display-none')
        $('#userModal').modal('show');
    });

    $('#btnLogin').click(function(){
        $('#modRegister').addClass('display-none')
        $('#modLogin').removeClass('display-none')
    });

    $('#btnRegister').click(function(){
        $('#modRegister').removeClass('display-none')
        $('#modLogin').addClass('display-none')
    });

    $('#linkRegister').click(function(){
        $('#modRegister').removeClass('display-none')
        $('#modLogin').addClass('display-none')
    })
</script>
