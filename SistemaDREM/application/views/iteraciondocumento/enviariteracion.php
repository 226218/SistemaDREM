<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon icon-retweet"></i>
                </span>
                                                <h5>Enviar Iteracion</h5>
                                          </div>
                                          <div class="widget-content nopadding">
                                                <?php echo $custom_error; ?>
                                                <form action="<?php echo current_url(); ?>" id="formiteraciondocumento" method="post" class="form-horizontal" >
                                                    <?php
                                                     $iddelusuario=$this->session->userdata('id');
$datausuario = $this->iteraciondocumento_model->getUsuarios($this->session->userdata('id')); 
echo form_hidden('iditeraciondocumento',$result->iditeraciondocumento);
$datadocumento = $this->iteraciondocumento_model->getdocumentos($result->iddocumento);
$datatipotramite = $this->iteraciondocumento_model->gettipotramite($datadocumento->tipotramite_id);
$dataarea = $this->iteraciondocumento_model->getarea($datausuario[0]->idarea); 

$permisosusuarios = $this->iteraciondocumento_model->getpermisos(); 



?>

 <input id="permisoactual" class="span6" type="hidden" name="permisoactual" value="<?php echo $datausuario[0]->permisos_id; ?>"  />
                                      

 <div class="control-group">
                        <label for="iddocumento" class="control-label">Nombre Documento:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="nombredoc"  class="span6" type="text" name="nombredoc" value="<?php echo $datadocumento->nombredocumento; ?>"  readonly/>
                                             <input id="iddocumento" class="span6" type="hidden" name="iddocumento" value="<?php echo $datadocumento->iddocumento;?>"  />

                                         </div>
                                        </div>

                        
                     <div class="control-group">
                        <label for="tipotramite" class="control-label">Nombre Tipo de Tramite:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="nombretipotramite"  class="span8" type="text" name="nombrearea" value="<?php echo $datatipotramite->nombretipotramite; ?>"  readonly/>
                                            <input id="tipotramite" class="span8" type="hidden" name="tipotramite" value="<?php echo $datadocumento->tipotramite_id;?>"  />

                                         </div>
                                        </div>



                    <div class="control-group">
                                            <label for="dniaprobacion" class="control-label">DNI Usuario:</label>
                                             <div class="controls">
                                           <input id="dniaprobacion" type="text" name="dniaprobacion" value="<?php echo $datausuario[0]->dni; ?>"  readonly/>
                                </div>                                                   

                     </div>
                     <div class="control-group">
                        <label for="idareaactual" class="control-label">Area Actual:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="nombrearea1"  type="text" name="nombrearea1" value="<?php echo $dataarea->nombrearea; ?>"  readonly/>
                                            <input id="idareaactual" class="span6" type="hidden" name="idareaactual" value="<?php echo $dataarea->idarea; ?>"  />
                                        </div> 
                                        </div>




                     
                     <div class="control-group">
                        <label for="codsecuenactual" class="control-label">Codigo Secuencia Actual:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="codsecuenciatramite"  type="text" name="codsecuenciatramite" value="<?php echo $result->codsecuenciatramite; ?>"  readonly/>
                                        </div> 
                                        </div>





          <div class="control-group" hidden="y">
                        <label for="codsecuenactual" class="control-label">Nombre Futura Secuencia:</label>
                        <div class="controls">
                                            <input id="nombrequesalecodsecuencia"  type="text" name="nombrequesalecodsecuencia" value="" />
                                        </div> 
                                        </div>

<!--
 <div class="control-group">
                        <label for="pasosig" class="control-label">Paso Siguiente:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="nombrecodsecuenciatramite"  type="text" name="nombrecodsecuenciatramite" value="" />
                                            <input id="codsecuenciatramite" class="span6" type="hidden" name="codsecuenciatramite" value=""  />
                                        </div> 
                                        </div>-->


  <div class="control-group">
                        <label for="pasosiguiente" class="control-label">Paso Siguiente:<span class="required">*</span></label>
                            <div class="controls">

                            <select class="span8" name="pasosiguiente" id="pasosiguiente">
                                <option value=" " data-price=""> </option>
                               <?php


  $pasossiguientes = $this->iteraciondocumento_model->getSiguientesSecuenciasTramites($result->codsecuenciatramite); 
foreach($pasossiguientes as $row){ 

$valor2 = $row['nombrearea'];
$nomb2 = $row['nombresecuencia'];  
$idarea2= $row['idarea'];  
?>
                              <option value="<?php  echo $valor2; ?>" data-price="<?php  echo $idarea2; ?>"><?php  echo $nomb2; ?></option>
<?php 
}
?>
                            </select>
                        </div>
                                          </div>
    
                                    
  <div class="control-group">
                        <label for="idareasiguiente" class="control-label">Area Siguiente:<span class="required">*</span></label>
                            <div class="controls">

                           <input id="nombrearea2"  type="text" name="nombreareasiguiente"   readonly/>
                                            <input id="idareasiguiente" class="span6" type="hidden" name="idareasiguiente" />
                        </div>
                                          </div>




<!--

  <div class="control-group">
                        <label for="idareasiguiente" class="control-label">Area Siguiente:<span class="required">*</span></label>
                            <div class="controls">

                            <select name="idareasiguiente" id="idareasiguiente">
                               <?php


  $todasareas = $this->iteraciondocumento_model->getTodasAreas(); 
foreach($todasareas as $row){ 

$valor = $row['idarea'];
$nomb = $row['nombrearea'];  
if($valor!=$dataarea->idarea)
{?>
                              <option value="<?php  echo $valor; ?>"><?php  echo $nomb; ?></option>
<?php }
else{}}
?>
                            </select>
                        </div>
                                          </div>-->
                                        

  <div class="control-group">
                                         
                    
                    <div class="control-group">
                        <label for="estadotramite" class="control-label">Estado:<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estadotramite" type="text" name="estadotramite" value="<?php 
                            if($result->estadotramite=='T'){echo 'Tramitando';} elseif($result->estadotramite=='ED'){echo 'Esperando Documentacion';} elseif($result->estadotramite=='O'){echo 'Observado';} elseif($result->estadotramite=='D'){echo 'Derivado';}  elseif($result->estadotramite=='F'){echo 'Finalizado';} ?>"  readonly/> El documento inicia en Tramitando 
                        </div>
                    </div>
                   
                    <div class="control-group">
                        <label  class="control-label">Permiso*</label>
                        <div class="controls">
                            <select name="permiso" id="permiso">
                              <?php 
$cantidadvalores = count($permisosusuarios);
$i = 0;
/*foreach($permisosusuarios as $row)
{
if(strlen($permisosusuarios['permisos']) < $longest) {
        $longest = $permisosusuarios['permisos'];
    }
                            
}*/
    

foreach($permisosusuarios as $row)
{
                             if(++$i === $cantidadvalores) 
                            {
                              echo '<option value="'.$row['idpermiso'].'" selected>'.$row['cargo'].'</option>'; 
                            }
                            else
                            {
                              echo '<option value="'.$row['idpermiso'].'">'.$row['cargo'].'</option>'; 
                            }

}
                              ?>
                               
                            </select>
                        </div>
                    </div>




                                    
  <div class="control-group" hidden="y">
                        <label for="permisex" class="control-label">permiso1:<span class="required">*</span></label>
                            <div class="controls">

                           <input id="permiso1"  type="text" name="permiso1"   readonly/>
                        </div>
                                          </div>



                    <div class="control-group">
                        <label for="fechaingreso" class="control-label">fechaingreso<span class="required">*</span></label>
                        <div class="controls">
                            <input id="fechaingreso" type="text" name="fechaingreso" value="<?php echo $result->fechaingreso;
  // MySQL datetime format
?>" readonly/>
                        </div>
                    </div>
                    <div class="control-group">
                      <label for="fechaaprobacion" class="control-label">fecha fin<span class="required">*</span></label>
                        <div class="controls">
                            <input id="fechaaprobacion" type="text" name="fechaaprobacion" value="<?php $now = new DateTime(null, new DateTimeZone('America/Lima'));
echo $now->format('Y-m-d H:i:s');    // MySQL datetime format

?>" readonly/>
                        </div>
                    </div>

                        <div class="control-group">
                    <div class="span12" style="padding: 1%; margin-left: 40px">

                                        <div class="span6">
                                            <label for="descripcionarea">Observaciones:</label>
                                            <textarea class="span12" name="observaciones" id="observaciones" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"><?php echo $result->observaciones;
  // MySQL datetime format
?></textarea>
                                        </div>                                          
                                        </div>
                                         </div>
    <div class="control-group">
      <div class="span12" style="padding: 1%; margin-left: 40px">
                                          <div class="span6">
                                            <label for="anexos">Anexos:</label>
                                            <textarea class="span12" name="anexos" id="anexos" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"><?php echo $result->anexos;
  // MySQL datetime format
?></textarea>
                                                                                  
                                        </div>
                                        

                     </div>
</div>

                                                      <div class="form-actions">
                                                      <div class="span12">
                                                            <div class="span6 offset3">
                                                            <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Enviar</button>
                                                            <a href="<?php echo base_url()?>index.php/iteraciondocumento/" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Volver</a>
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
            source: "<?php echo base_url(); ?>index.php/iteraciondocumento/autoCompleteTipotramite",
            minLength: 1,
            select: function( event, ui ) {

                 $("#permiso1").val($(this).find(":selected").text())
                

            }
      });


$("#permiso").change(function () {
  
  
    $("#permiso1").val($(this).val()); 

}).change();



$("#pasosiguiente").change(function () {
  
     $("#nombrearea2").val($(this).val());  
     
 var price = $(this).children('option:selected').data('price');
    $("#idareasiguiente").val(price);
    var posicion= ($(this).find(":selected").text()).lastIndexOf("-");

    $('#nombrequesalecodsecuencia').val($(this).find(":selected").text().substr(0,posicion))
    

}).change();


//$('#nombrequesalecodsecuencia').val($(this).find(":selected").text().substr(0,5))

/* $("#pasosig").autocomplete({
            source: "<?php echo base_url(); ?>index.php/iteraciondocumento/autoCompletecodsecuenciatramite",{ term:request.term, extraParams:$('#extra_param_field').val() },
            minLength: 1,
            select: function( event, ui ) {

                 $("#tipotramite_id").val(ui.item.id);
                

            }
      });*/




          $(".money").maskMoney();
           $('#formiteraciondocumento').validate({
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



