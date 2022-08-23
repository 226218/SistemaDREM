<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Registro de Usuario</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">'.$custom_error.'</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nombres" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombres" type="text" name="nombres" value="<?php echo set_value('nombres'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="dni" class="control-label">DNI<span class="required">*</span></label>
                        <div class="controls">
                            <input id="dni" type="text" name="dni" value="<?php echo set_value('dni'); ?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" minlength="8" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apellidopaterno" class="control-label">Apellido Paterno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidopaterno" type="text" name="apellidopaterno" value="<?php echo set_value('apellidopaterno'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apellidomaterno" class="control-label">Apellido Materno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidomaterno" type="text" name="apellidomaterno" value="<?php echo set_value('apellidomaterno'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cargo" class="control-label">Cargo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cargo" type="text" name="cargo" value="<?php echo set_value('cargo'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" hidden>
                        <label for="fotoperfil" class="control-label">Foto de Perfil</label>
                        <div class="controls">
                            <input id="fotoperfil" type="text" name="fotoperfil" value="<?php echo set_value('fotoperfil'); ?>"  />
                        </div>
                    </div>

                  
                      <div class="control-group">
                        <label for="idarea" class="control-label">Area:<span class="required">*</span></label>
                            <div class="controls">

                            <select name="idarea" id="idarea">
                               <?php


  $todasareas = $this->usuarios_model->getTodasAreas(); 
foreach($todasareas as $row){ 

$valor = $row['idarea'];
$nomb = $row['nombrearea'];  
?>
                              <option value="<?php  echo $valor; ?>"><?php  echo $nomb; ?></option>
<?php 
}
?>
                            </select>
                        </div>
                                          </div>

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="contrasenha" class="control-label">Contraseña<span class="required">*</span></label>
                        <div class="controls">
                            <input id="contrasenha" type="password" name="contrasenha" value="<?php echo set_value('contrasenha'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefono" class="control-label">Teléfono<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefono" type="text" name="telefono" value="<?php echo set_value('telefono'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9" minlength="9"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Tel. Móvil</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9" minlength="9"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label  class="control-label">Situación*</label>
                        <div class="controls">
                            <select name="estado" id="estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label  class="control-label">Permisos<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permisos_id" id="permisos_id">
                                  <?php foreach ($permisos as $p) {
                                      echo '<option value="'.$p->idPermiso.'">'.$p->cargo.'</option>';
                                  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>


<script  src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">

      $(document).ready(function(){










           $('#formUsuario').validate({
            rules : {
                  nombres:{ required: true},
                  dni:{ required: true, min_length: 8},
                  apellidopaterno:{ required: true},
                  telefono:{ required: true, number:true,rangelength:[6, 9]},
                  email:{ required: true, email: true},
                  contrasenha:{ required: true},
                  apellidomaterno:{ required: true},
                  cargo:{ required: true},
                  estado:{ required: true},
                  cep:{ required: true}
            },
            messages: {
                  nombres :{ required: 'Campo Requerido.'},
                  dni:{ required: 'Campo Requerido.', min_length: 'Tamaño minimo 8 digitos'},
                  apellidopaterno:{ required: 'Campo Requerido.'},
                  telefono:{ required: 'Campo Requerido.', number: 'Escriba un número valido',rangelength: 'El telefono debe tener entre 6 y 9 digitos'},
                  email:{ required: 'Campo Requerido.', email: 'Escriba un Email válido'},
                  contrasenha:{ required: 'Campo Requerido.'},
                  apellidomaterno:{ required: 'Campo Requerido.'},
                  cargo:{ required: 'Campo Requerido.'},
                  estado:{ required: 'Campo Requerido.'},
                  cep:{ required: 'Campo Requerido.'}

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




