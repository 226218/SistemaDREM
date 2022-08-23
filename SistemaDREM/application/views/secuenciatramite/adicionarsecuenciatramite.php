<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                                                <h5>Agregar Secuencia Tramite</h5>
                                          </div>
                                      
<div class="widget-content nopadding">
                 <?php if($custom_error == true){ ?>
                                <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Datos incompletos, comprobar los campos con un asterisco o Area correctamente seleccionado y responsable.</div>
                                <?php } ?>
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formadicionarsecuenciatramite" enctype="multipart/form-data" method="post" class="form-horizontal" >
                  
 <div class="control-group">


                      <label for="tipotramite" class="control-label">Nombre del Tipo de Tramite:<span class="required">*</span></label>

                         <div class="controls">
                                            <input id="tipotramite" class="span6" type="text" name="tipotramite" value=""  />
                                            <input id="tipotramite_id" class="span6" type="hidden" name="tipotramite_id" value=""  />
                                         </div>
                                         <br>

 <?php
                                                     $iddelusuario=$this->session->userdata('id');
$datausuario = $this->secuenciatramite_model->getUsuarios($this->session->userdata('id')); 
$dataarea = $this->secuenciatramite_model->getarea($datausuario[0]->idarea); 

?>
                                     

                 
                     <div class="control-group">                



                        <label for="nombresecuencia" class="control-label">Nombre de Secuencia:<span class="required">*</span></label>
                         <div class="controls">
                            <input id="valorininombresec"  type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" style="width: 6ch;" min="1" max="100" name="valorininombresec" value=""  />
                             <input id="intermediocoma" type="text" name="intermediocoma" style="width: 1ch;" maxlength="1" size="1" value="-" readonly/>
                             
                                         
                                             <input id="nombresecuencia" class="span6" type="text" name="nombresecuencia" value=""  />

                                         </div>

                                         </div>


  <br> 
 <div class="control-group">

         <label for="codsecuenciatramite" class="control-label">Codigo de la Secuencia:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="codsecuenciatramite"  class="span6" type="text" name="codsecuenciatramite" value=""  readonly/>
                                            

                                         </div>
                                              </div>
                         
                         <!--<form id="formcontrasenha" action="<?php echo base_url();?>index.php/secuenciatramite/validarsecuencia" method="post">
                        <div class="span6 offset1">
                            <button class="btn btn-success" onclick="calculateSum()" class="btn btn-primary"><i class="icon-check icon-white"></i> Validar Secuencia</button>
                        </div>
                      </form>-->
                
                                          
                                

                           <br>
                    
 <div class="control-group">
                                            <label for="codsecuenciaprevia" class="control-label">Codigo de la Secuencia Previa  :</label>
                                             <div class="controls">
                                           <input id="nombrecodsecuenciaprevia" type="text" name="nombrecodsecuenciaprevia" value=""  />
                                              <input id="codsecuenciaprevia" class="span6" type="hidden" name="codsecuenciaprevia" value=""  />
                                </div>                                                   
     </div>
                   <br>

                    <div class="control-group">
     
                        <label for="idarea" class="control-label">Nombre de Area donde se realiza el proceso :<span class="required">*</span></label>
                            <div class="controls">

                            <select name="idarea" id="idarea">
                               <?php


  $todasareas = $this->secuenciatramite_model->getTodasAreas(); 
foreach($todasareas as $row){ 

$valor = $row['idarea'];
$nomb = $row['nombrearea'];  
?>
                              <option value="<?php  echo $valor; ?>"><?php  echo $nomb; }?></option>
                    </select>
                    <span>  Area donde se encuentra el documento en este tramite</span>
                        </div>
     </div>
                                       
                                   <br>          


     <div class="control-group">                                     
                    
                        <label for="estadoaccionsecuencia" class="control-label">Estado:<span class="required">*</span></label>
                        <div class="controls">
                          <select name="estadoaccionsecuencia" id="estadoaccionsecuencia">
                             <option value="T">Tramitando</option>
                               <option value="ED">Esperando Documentacion</option>
                                <option value="O">Observado</option>
                                  <option value="F">Finalizado</option>
                                </select>
                                  </div>
                        

                     <br>
     </div>

                                                        <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/secuenciatramite" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
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
                
                 $("#codsecuenciatramite").val(ui.item.tipotramite);

            }
      });


 $("#nombrecodsecuenciaprevia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/secuenciatramite/autoCompletePreviaSecuenciatramite",
            minLength: 1,
            select: function( event, ui ) {

                 $("#codsecuenciaprevia").val(ui.item.codsecuenciatramite);
                

            }
      });




 $( "#valorininombresec" )
  .keyup(function() {
    var value = $( this ).val();
     var primera = $('#tipotramite').val();
      var segunda = $('#valorininombresec').val();
      var completo= primera.substring(0, 3)+"-"+segunda;

    $( "#codsecuenciatramite" ).val( completo );
  })
  .keyup();


   $( "#nombresecuencia" )
  .keyup(function() {
    var value = $( this ).val();
     var primera = $('#tipotramite').val();
      var segunda = $('#valorininombresec').val();
      var tercera=$('#nombresecuencia').val()
      var completo= primera.substring(0, 3)+"-"+segunda+"-"+tercera;

    $( "#codsecuenciatramite" ).val( completo );
  })
  .keyup();




          $(".money").maskMoney();
           $('#formadicionarsecuenciatramite').validate({
            rules :{
                    tipotramite:{ required: true},
                  valorininombresec:{ required: true},
            },
            messages:{
                    tipotramite :{ required: 'Campo Requerido.'},
                  valorininombresec :{ required: 'Campo Requerido.'},
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




<!-- 






$("#nombresecuencia").onKeyPress(
    source:""
    minLength:1,

{
  select: function( event, ui ) {

                 $("#codsecuenciatramite").val(ui.item.id);
                

            }


}
    ) -->