
<?php if(!isset($dados) || $dados == null) {?>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                <h5>Datos de la Empresa</h5>
            </div>
            <div class="widget-content ">
                <div class="alert alert-danger">Ningún datos se ha registrado hasta la fecha. Esta información estará disponible en la pantalla de impresión de la Orden de Servicio.</div>
                <a href="#modalCadastrar" data-toggle="modal" role="button" class="btn btn-success">Registrar Datos</a>
            </div>
        </div>    
        
    </div>
</div>   


<div id="modalCadastrar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url(); ?>index.php/mapos/cadastrarEmitente" id="formCadastrar" enctype="multipart/form-data" method="post" class="form-horizontal" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">RMA O.S - Registrar Datos de la Empresa</h3>
  </div>
  <div class="modal-body">
        
        
                    <div class="control-group">
                        <label for="nome" class="control-label">Razón Social<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="cnpj" class="control-label"><span class="required">NIF*</span></label>
                        <div class="controls">
                            <input class="" type="text" name="cnpj" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">NRT*</span></label>
                        <div class="controls">
                            <input type="text" name="ie" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Dirección*</span></label>
                        <div class="controls">
                            <input type="text" name="logradouro" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Número*</span></label>
                        <div class="controls">
                            <input type="text" name="numero" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Barrio*</span></label>
                        <div class="controls">
                            <input type="text" name="bairro" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Ciudad*</span></label>
                        <div class="controls">
                            <input type="text" name="cidade" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">CP*</span></label>
                        <div class="controls">
                            <input type="text" name="uf" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Teléfono*</span></label>
                        <div class="controls">
                            <input type="text" name="telefono" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Email*</span></label>
                        <div class="controls">
                            <input type="text" name="email" value="" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
                        <div class="controls">
                            <input type="file" name="userfile" value="" />
                        </div>
                    </div>
               

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
    <button class="btn btn-success">Registrar</button>
  </div>
  </form>
</div>

<?php } else { ?>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                <h5>Datos de la Empresa</h5>
            </div>
            <div class="widget-content ">
            <div class="alert alert-info">Los datos a continuación se utiliza en el encabezado de las pantallas de impresión.</div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 25%"><img src=" <?php echo $dados[0]->url_logo; ?> "></td>
                            <td> <span style="font-size: 20px; "> <?php echo $dados[0]->nome; ?> </span> </br><span><?php echo $dados[0]->cnpj; ?> </br> <?php echo $dados[0]->rua.', nº:'.$dados[0]->numero.', '.$dados[0]->bairro.' - '.$dados[0]->cidade.' - '.$dados[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $dados[0]->email.' - Tel.: '.$dados[0]->telefono; ?></span></td>
                        </tr>
                    </tbody>
                </table>

                <a href="#modalAlterar" data-toggle="modal" role="button" class="btn btn-primary">Modificar Datos</a>
                <a href="#modalLogo" data-toggle="modal" role="button" class="btn btn-inverse">Modificar Logo</a>
            </div>
        </div>
    </div>
</div>




<div id="modalAlterar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url(); ?>index.php/mapos/editarEmitente" id="formAlterar" enctype="multipart/form-data" method="post" class="form-horizontal" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="">RMA O.S - Editar Datos de la Empresa</h3>
  </div>
  <div class="modal-body">
        
        
                    <div class="control-group">
                        <label for="nome" class="control-label">Razon Social<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo $dados[0]->nome; ?>"  />
                            <input id="nome" type="hidden" name="id" value="<?php echo $dados[0]->id; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="cnpj" class="control-label"><span class="required">NIF*</span></label>
                        <div class="controls">
                            <input class="" type="text" name="cnpj" value="<?php echo $dados[0]->cnpj; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">NRT*</span></label>
                        <div class="controls">
                            <input type="text" name="ie" value="<?php echo $dados[0]->ie; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Dirección*</span></label>
                        <div class="controls">
                            <input type="text" name="logradouro" value="<?php echo $dados[0]->rua; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Número*</span></label>
                        <div class="controls">
                            <input type="text" name="numero" value="<?php echo $dados[0]->numero; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Barrio*</span></label>
                        <div class="controls">
                            <input type="text" name="bairro" value="<?php echo $dados[0]->bairro; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Ciudad*</span></label>
                        <div class="controls">
                            <input type="text" name="cidade" value="<?php echo $dados[0]->cidade; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">CP*</span></label>
                        <div class="controls">
                            <input type="text" name="uf" value="<?php echo $dados[0]->uf; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">Teléfono*</span></label>
                        <div class="controls">
                            <input type="text" name="telefono" value="<?php echo $dados[0]->telefono; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label"><span class="required">E-mail*</span></label>
                        <div class="controls">
                            <input type="text" name="email" value="<?php echo $dados[0]->email; ?>" />
                        </div>
                    </div>

    
               

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
    <button class="btn btn-primary">Modificar</button>
  </div>
  </form>
</div>


<div id="modalLogo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url(); ?>index.php/mapos/editarLogo" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="">RMA O.S - Modificar Dirección</h3>
  </div>
  <div class="modal-body">
         <div class="span12 alert alert-info">Selecione uma nueva imagem de logomarca. Tamaño indicado (130 X 130).</div>          
         <div class="control-group">
            <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
            <div class="controls">
                <input type="file" name="userfile" value="" />
                <input id="nome" type="hidden" name="id" value="<?php echo $dados[0]->id; ?>"  />
            </div>
        </div>

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
    <button class="btn btn-primary">Modificar</button>
  </div>
  </form>
</div>



<?php } ?>


<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
    
$(document).ready(function(){

    $("#formLogo").validate({
      rules:{
         userfile: {required:true}
      },
      messages:{
         userfile: {required: 'Campo Requerido.'}
      },

        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
            $(element).parents('.control-group').removeClass('success');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
   });


    $("#formCadastrar").validate({
      rules:{
         userfile: {required:true},
         nome: {required:true},
         cnpj: {required:true},
         ie: {required:true},
         logradouro: {required:true},
         numero: {required:true},
         bairro: {required:true},
         cidade: {required:true},
         uf: {required:true},
         telefono: {required:true},
         email: {required:true}
      },
      messages:{
         userfile: {required: 'Campo Requerido.'},
         nome: {required: 'Campo Requerido.'},
         cnpj: {required: 'Campo Requerido.'},
         ie: {required: 'Campo Requerido.'},
         logradouro: {required: 'Campo Requerido.'},
         numero: {required:'Campo Requerido.'},
         bairro: {required:'Campo Requerido.'},
         cidade: {required:'Campo Requerido.'},
         uf: {required:'Campo Requerido.'},
         telefono: {required:'Campo Requerido.'},
         email: {required:'Campo Requerido.'}
      },

        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
            $(element).parents('.control-group').removeClass('success');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
   });


    $("#formAlterar").validate({
      rules:{
         userfile: {required:true},
         nome: {required:true},
         cnpj: {required:true},
         ie: {required:true},
         logradouro: {required:true},
         numero: {required:true},
         bairro: {required:true},
         cidade: {required:true},
         uf: {required:true},
         telefono: {required:true},
         email: {required:true}
      },
      messages:{
         userfile: {required: 'Campo Requerido.'},
         nome: {required: 'Campo Requerido.'},
         cnpj: {required: 'Campo Requerido.'},
         ie: {required: 'Campo Requerido.'},
         logradouro: {required: 'Campo Requerido.'},
         numero: {required:'Campo Requerido.'},
         bairro: {required:'Campo Requerido.'},
         cidade: {required:'Campo Requerido.'},
         uf: {required:'Campo Requerido.'},
         telefono: {required:'Campo Requerido.'},
         email: {required:'Campo Requerido.'}
      },

        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
            $(element).parents('.control-group').removeClass('success');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
   });

});
    
</script>