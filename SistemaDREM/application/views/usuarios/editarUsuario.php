<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Usuario</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('idUsuarios',$result->idUsuarios) ?>
                        <label for="nombres" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombres" type="text" name="nombres" value="<?php echo $result->nombres; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="dni" class="control-label">DNI<span class="required">*</span></label>
                        <div class="controls">
                            <input id="dni" type="text" name="dni" value="<?php echo $result->dni; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apellidopaterno" class="control-label">Apellido Paterno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidopaterno" type="text" name="apellidopaterno" value="<?php echo $result->apellidopaterno; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apellidomaterno" class="control-label">Apellido Materno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidomaterno" type="text" name="apellidomaterno" value="<?php echo $result->apellidomaterno; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cargo" class="control-label">Cargo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cargo" type="text" name="cargo" value="<?php echo $result->cargo; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" hidden>
                        <label for="fotoperfil" class="control-label">Foto de Perfil<span class="required">*</span></label>
                        <div class="controls">
                            <input id="fotoperfil" type="text" name="fotoperfil" value="<?php echo $result->fotoperfil; ?>"  />
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
                              <option value="<?php  echo $valor; ?>" <?php if($result->idarea==$valor){ echo 'selected="true"'; }  else { }?> > <?php echo $nomb;?></option>
<?php 
}
?>
                            </select>
                        </div>
                                          </div>

                 
                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="contrasenha" class="control-label">Contraseña</label>
                        <div class="controls">
                            <input id="contracontrasenha" type="password" name="contrasenha" value=""  placeholder="No complete si no desea cambiar."  />
                            <i class="icon-exclamation-sign tip-top" title="Si no cambia la contraseña, no rellene este campo."></i>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefono" class="control-label">Teléfono<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefono" type="text" name="telefono" value="<?php echo $result->telefono; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Tel. Móvil</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label  class="control-label">Situación*</label>
                        <div class="controls">
                            <select name="estado" id="estado">
                                <?php if($result->estado == 1){$ativo = 'selected'; $inativo = '';} else{$ativo = ''; $inativo = 'selected';} ?>
                                <option value="1" <?php echo $ativo; ?>>Activo</option>
                                <option value="0" <?php echo $inativo; ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label  class="control-label">Permisos<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permisos_id" id="permisos_id">
                                  <?php foreach ($permisos as $p) {
                                     if($p->idPermiso == $result->permisos_id){ $selected = 'selected';}else{$selected = '';}
                                      echo '<option value="'.$p->idPermiso.'"'.$selected.'>'.$p->cargo.'</option>';
                                  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
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
                  dni:{ required: true},
                  apellidopaterno:{ required: true},
                  telefono:{ required: true},
                  email:{ required: true},
                  apellidomaterno:{ required: true},
                  cargo:{ required: true},
               
                  cidade:{ required: true},
                  cep:{ required: true}
            },
            messages: {
                  nombres :{ required: 'Campo Requerido.'},
                  dni:{ required: 'Campo Requerido.'},
                  apellidopaterno:{ required: 'Campo Requerido.'},
                  telefono:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  apellidomaterno:{ required: 'Campo Requerido.'},
                  cargo:{ required: 'Campo Requerido.'},
                  
                  cidade:{ required: 'Campo Requerido.'},
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


