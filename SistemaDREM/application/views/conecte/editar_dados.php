<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Mis Datos</h5>
            </div>
            <div class="widget-content nopadding">
              
                <form action="<?php echo current_url(); ?>" id="formArea" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <input type="hidden" name="idarea" id="idarea" value="<?php echo $result->idarea; ?>" />   
                        <label for="nomeArea" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeArea" type="text" name="nomeArea" value="<?php echo $result->nomeArea; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="documento" class="control-label">DNI/NIF/NIE<span class="required">*</span></label>
                        <div class="controls">
                            <input id="documento" type="text" name="documento" value="<?php echo $result->documento; ?>"  />
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
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Dirección<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Barrio<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Ciudad<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">País<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>"  />
                        </div>
                    </div>



                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
                                <a href="<?php echo base_url() ?>index.php/conecte/conta" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
           $('#formArea').validate({
            rules :{
                  nomeArea:{ required: true},
                  documento:{ required: true},
                  telefono:{ required: true},
                  email:{ required: true},
                  rua:{ required: true},
                  numero:{ required: true},
                  bairro:{ required: true},
                  cidade:{ required: true},
                  estado:{ required: true},
                  cep:{ required: true}
            },
            messages:{
                  nomeArea :{ required: 'Campo Requerido.'},
                  documento :{ required: 'Campo Requerido.'},
                  telefono:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  rua:{ required: 'Campo Requerido.'},
                  numero:{ required: 'Campo Requerido.'},
                  bairro:{ required: 'Campo Requerido.'},
                  cidade:{ required: 'Campo Requerido.'},
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

