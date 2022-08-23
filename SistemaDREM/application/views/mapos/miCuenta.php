<div class="span6" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Mi Cuenta</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <ul class="site-stats">
                           <li class="span12" style="background-color: grey; margin-left: 0;"><small> <strong class="span12" >Usuario: <?php echo strtoupper($usuario->nombres).' '.strtoupper($usuario->apellidopaterno).' '.strtoupper($usuario->apellidomaterno); ?></strong></li>
                            <br>
                            <li class="span12" style="background-color: grey; margin-left: 0;"><small><strong>Teléfono: <?php echo strtoupper($usuario->telefono);?></strong></li>
                            <br>
                            <li class="span12" style="background-color: grey; margin-left: 0;"><strong>Email: <?php echo strtoupper($usuario->email)?></strong></li>
                            <br>
                            <li class="span12" style="background-color: grey; margin-left: 0;"><strong>Nível: <?php echo strtoupper($usuario->permiso); ?></strong></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Modificar mi Contraseña</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formcontrasenha" action="<?php echo base_url();?>index.php/mapos/alterarcontrasenha" method="post">
                        
                        <div class="span12" style="margin-left: 0">
                            <label for="">Contraseña Actual</label>
                            <input type="password" id="oldcontrasenha" name="oldcontrasenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Nueva Contraseña</label>
                            <input type="password" id="novacontrasenha" name="novacontrasenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Confirmar Contraseña</label>
                            <input type="password" name="confirmarcontrasenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0; text-align: center">
                            <button class="btn btn-primary">Modificar Contraseña</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="span6" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
        </span>
                <h5>Cambiar Foto</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formfotoperfil" name="fotoperfil" action="<?php echo base_url();?>index.php/mapos/alterarfotoperfil" method="post" enctype="multipart/form-data">
                        
                       <img width="250" height="300" name="fotito" src="<?php if($usuario->fotoperfil==null || $usuario->fotoperfil=="0" ) {echo base_url()."/img/usericon.png";} else {echo $usuario->fotoperfil; }?>" style="border: 5px solid #850f0f;">

                         
                        
                       <div class="control-group">
                        <label for="preco" class="control-label">Archivo*</label>
                        <div class="controls">
                            <input id="imagen" type="file" name="userfile" accept=".png, .jpg, .jpeg"/> (png|jpg|jpeg) 10MB LIMITE
                        </div>
                    </div>
                     <div class="span12" style="margin-left: 0; text-align: center">
                            <button type="submit" class="btn btn-primary">Modificar Foto de Perfil</button>

                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#formcontrasenha').validate({
            rules :{
                  oldcontrasenha: {required: true},  
                  novacontrasenha: { required: true},
                  confirmarcontrasenha: { equalTo: "#novacontrasenha"}
            },
            messages:{
                  oldcontrasenha: {required: 'Campo Requerido'},  
                  novacontrasenha: { required: 'Campo Requerido.'},
                  confirmarcontrasenha: {equalTo: 'As contrasenhas não combinam.'}
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
    });
</script>