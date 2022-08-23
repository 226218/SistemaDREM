<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon icon-file-alt"></i>
                </span>
                <h5>Registrar Documento</h5>
            </div>
            <div class="widget-content nopadding">
                 <?php if($custom_error == true){ ?>
                                <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Datos incompletos, comprobar los campos con un asterisco o Area correctamente seleccionado y responsable.</div>
                                <?php } ?>
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formDocumento" enctype="multipart/form-data" method="post" class="form-horizontal" >
                     <div class="control-group">
                        <label for="tipotramite" class="control-label">Nombre del Tipo de Tramite:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="tipotramite" class="span6" type="text" name="tipotramite" value=""  />
                                            <input id="tipotramite_id" class="span6" type="hidden" name="tipotramite_id" value=""  />
                                         </div>
                                        </div>
                    <div class="control-group">
                        <label for="nombredocumento" class="control-label"><span class="required">Número Documento:*</span></label>
                        <div class="controls">
                            <input id="nombredocumento" type="text" name="nombredocumento" value="<?php echo set_value('nombredocumento'); ?>"  />
                        </div>
                    </div>
                     <div class="control-group" style="padding: 1%;">
 <div class="span12" style="padding: 1%; margin-left: 20px">

                                        <div class="span6">
                                            <label for="descripciondocumento">Descripcion Documento:</label>
                                            <textarea class="span12" name="descripciondocumento" id="descripciondocumento" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"> </textarea>
                                                                                  
                                        </div>
                                         </div>    

                     </div>

                    <div class="control-group">
                        <label for="estado" class="control-label">Estado:<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estadoextendido" value="<?php echo "Tramitando"; ?>"  readonly/> El documento inicia en T: Tramitando
                            <input id="estado" type="hidden" name="estado" value="<?php echo "T"; ?>"  readonly/> 
                        </div>
                    </div>
                   
                    <div class="control-group">
                        <label for="dniremitente" class="control-label"><span class="required">DNI del remitente*</span></label>
                        <div class="controls">
                            <input id="dniremitente" type="number" max="99999999" maxlength="8" pattern="[0-9]" name="dniremitente" value="<?php echo set_value('dniremitente'); ?>" onKeyPress="if(this.value.length==8) return false;"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="emailremitente" class="control-label">E-mail del remitente</label>
                        <div class="controls">
                            <input id="emailremitente" type="text" name="emailremitente" value="<?php echo set_value('emailremitente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="cargodestinatario" class="control-label">Cargo del Destinatario<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cargodestinatario" type="text" name="cargodestinatario" value="<?php echo set_value('cargodestinatario'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="apellidopaternoremitente" class="control-label">Apellido Paterno del remitente<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidopaternoremitente" type="text" name="apellidopaternoremitente" value="<?php echo set_value('apellidopaternoremitente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="apellidomaternoremitente" class="control-label"><span class="required">Apellido Materno del remitente*</span></label>
                        <div class="controls">
                            <input id="apellidomaternoremitente" type="text" name="apellidomaternoremitente" value="<?php echo set_value('apellidomaternoremitente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="nombresremitente" class="control-label">Nombres del remitente</label>
                        <div class="controls">
                            <input id="nombresremitente" type="text" name="nombresremitente" value="<?php echo set_value('nombresremitente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="fechaingreso" class="control-label">Fecha de Inicio del Tramite<span class="required">*</span></label>
                        <div class="controls">
                            <input id="fechaingreso" type="text" name="fechaingreso" value="<?php $now = new DateTime(null, new DateTimeZone('America/Lima'));
echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
?>" readonly/>
                        </div>
                    </div>
                       
                            <input id="fechafin" type="hidden" name="fechafin" value="<?php $now = new DateTime(null, new DateTimeZone('America/Lima'));
echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
?>" readonly/>
                        
                    


                     
                            <input id="data" type="hidden" name="data" value="<?php $now = new DateTime(null, new DateTimeZone('America/Lima'));
echo $now->format('Y-m-d');    // MySQL datetime format
?>" readonly/>
                       

                     <div class="span12" style="padding: 1%; margin-left: 20">

                                        <div class="span6">
                                            <label for="descripcionarea">Anexo:</label>
                                            <textarea class="span12" name="anexos" id="anexos" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"></textarea>
                                                                                  
                                        </div>
                                        

                     </div>
                    <div class="span12" style="padding: 1%; margin-left: 20">

                                        <div class="span6">
                                            <label for="descripcionarea">Observaciones:</label>
                                            <textarea class="span12" name="observaciones" id="observaciones" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"> </textarea>
                                                                                  
                                        </div>
                                        

                     </div>


                       <div class="control-group">
                        <label for="preco" class="control-label">Archivo*</label>
                        <div class="controls">
                            <input id="archivo" type="file" name="userfile" accept=".png, .jpg, .jpeg, .pdf, .docx, .doc"/> (pdf|png|jpg|jpeg|doc|docx) 10MB LIMITE
                        </div>
                    </div>


                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/documentos" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">


    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

      $(document).ready(function(){

 $("#tipotramite").autocomplete({
            source: "<?php echo base_url(); ?>index.php/documentos/autoCompleteTipotramite",
            minLength: 1,
            select: function( event, ui ) {

                 $("#tipotramite_id").val(ui.item.id);
                

            }
      });




          $(".money").maskMoney();
           $('#formDocumento').validate({
            rules :{
                    tipotramite:{ required: true},
                  nombredocumento:{ required: true},
            },
            messages:{
                    tipotramite :{ required: 'Campo Requerido.'},
                  nombredocumento :{ required: 'Campo Requerido.'},
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


           $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
      });
</script>




                                    
