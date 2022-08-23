<div class="row-fluid" style="margin-top:0">
                              <div class="span12">
                                    <div class="widget-box">
                                          <div class="widget-title">
                                                <span class="icon">
                                                      <i class="icon-align-justify"></i>
                                                </span>
                                                <h5>Editar Documento</h5>
                                          </div>
                                          <div class="widget-content nopadding">
                                                <?php echo $custom_error; ?>
                                                <form action="<?php echo current_url(); ?>" id="formDocumento" method="post" class="form-horizontal" >
                                                    <?php echo form_hidden('iddocumento',$result->iddocumento) ?>
                                                   <div class="control-group">
                        
                    <div class="control-group">
                        <label for="nombredocumento" class="control-label"><span class="required">Nombre Documento:*</span></label>
                        <div class="controls">
                            <input id="nombredocumento" type="text" name="nombredocumento" value="<?php echo $result->nombredocumento; ?>"  readonly/>
                        </div>
                    </div>
                  <div class="control-group" >

                                        
                                            <label for="descripciondocumento" class="control-label">Descripcion Documento:</label>
                                            <div class="controls">
                                            <textarea class="span12" name="descripciondocumento" id="descripciondocumento" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;" readonly> <?php echo $result->nombredocumento; ?></textarea>
                                                                                  
                                        </div>
                     

                     </div>
                     <div class="control-group">
                        <label for="tipotramite" class="control-label">Tipo de Tramite:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="tipotramite" class="span6" type="text" name="tipotramite" value="<?php  
                                            $tipotramite = $this->documentos_model->gettipotramite($result->tipotramite_id);
                                            echo $tipotramite->nombretipotramite; ?> "  readonly/>
                                            <input id="tipotramite_id" class="span6" type="hidden" name="tipotramite_id" value="<?php echo $result->tipotramite_id; ?>"  />
                                         </div>

                                        </div>

                    
                    <div class="control-group">
                        <label for="estado" class="control-label">Estado:<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>"  readonly/> El documento inicia en T: Tramite 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="dniremitente" class="control-label"><span class="required">DNI del remitente*</span></label>
                        <div class="controls">
                            <input id="dniremitente" type="text" name="dniremitente" value="<?php echo $result->dniremitente; ?>"  readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="emailremitente" class="control-label">E-mail del remitente</label>
                        <div class="controls">
                            <input id="emailremitente" type="text" name="emailremitente" value="<?php echo $result->emailremitente; ?>"  readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="apellidopaternoremitente" class="control-label">Apellido Paterno del remitente<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apellidopaternoremitente" type="text" name="apellidopaternoremitente" value="<?php echo $result->apellidopaternoremitente; ?>"  readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="apellidomaternoremitente" class="control-label"><span class="required">Apellido Materno del remitente</span></label>
                        <div class="controls">
                            <input id="apellidomaternoremitente" type="text" name="apellidomaternoremitente" value="<?php echo $result->apellidomaternoremitente; ?>"  readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="nombresremitente" class="control-label">Nombres del remitente</label>
                        <div class="controls">
                            <input id="nombresremitente" type="text" name="nombresremitente" value="<?php echo $result->nombresremitente; ?>"  readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="fechaingreso" class="control-label">Fecha de Inicio de Tramite<span class="required">*</span></label>
                        <div class="controls">
                            <input id="fechaingreso" type="text" name="fechaingreso" value="<?php echo $result->fechaingreso;
  // MySQL datetime format
?>" readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                      <label for="fechafin" class="control-label">Fecha Final del Tramite<span class="required">*</span></label>
                        
                        <div class="controls">
                            <input id="fechafin" type="text" name="fechafin" value="<?php echo $result->fechafin;
?>" readonly/>
                        </div>
                    </div>


                     <div class="control-group" hidden>
                      <label for="archivodocumento" class="control-label">archivodocumento<span class="required">*</span></label>
                        
                        <div class="controls">
                            <input id="archivodocumento" type="text" name="archivodocumento" value="<?php echo $result->archivodocumento;
?>" readonly/>
                        </div>
                    </div>
                    <div class="span12" style="padding: 1%; margin-left: 20">

                                        <div class="span6">
                                            <label for="descripcionarea">Observaciones:</label>
                                            <textarea class="span12" name="observaciones" id="observaciones" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"><?php echo $result->observaciones;
  // MySQL datetime format
?></textarea>
                                                                                  
                                        </div>
                                        

                     </div>


                                                      <div class="form-actions">
                                                      <div class="span12">
                                                            <div class="span6 offset3">
                                                            <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
                                                            <a href="<?php echo base_url()?>index.php/documentos" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Volver</a>
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
                  nombredocumento:{ required: true}
            },
            messages:{
                    tipotramite :{ required: 'Campo Requerido.'},
                  nombredocumento :{ required: 'Campo Requerido.'}
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



