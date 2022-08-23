<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon icon-retweet"></i>
                </span>
                <h5>Editar Iteracion de Documento</h5>
                </div>
                                          <div class="widget-content nopadding">
                                                <?php echo $custom_error; ?>
                                
                                <form action="<?php echo current_url(); ?>" method="post" id="formiteraciondocumento">
                                    <?php echo form_hidden('iditeraciondocumento',$result->iditeraciondocumento) ?>
<div class="control-group">
                                     <?php
                                                     $iddelusuario=$this->session->userdata('id');
$datausuario = $this->iteraciondocumento_model->getUsuarios($this->session->userdata('id')); 
echo form_hidden('iditeraciondocumento',$result->iditeraciondocumento);
$datadocumento = $this->iteraciondocumento_model->getdocumentos($result->iddocumento);
$datatipotramite = $this->iteraciondocumento_model->gettipotramite($datadocumento->tipotramite_id);
$dataarea = $this->iteraciondocumento_model->getarea($datausuario[0]->idarea); 



?>
                                    

 <div class="control-group" style="padding: 1%; margin-left: 20px">
                        <label for="iditeraciondocumento" class="control-label">ID Iteracion:<span class="required">*</span></label>
                         <div class="controls">
                                          
                                             <input id="iditeraciondocumento" class="span6" type="text" name="iditeraciondocumento" value="<?php echo $result->iditeraciondocumento;?>"  readonly/>

                                         </div>
                                        </div>

 <div class="control-group" style="margin-left: 35px">
                        <label for="iddocumento" class="control-label">Nombre Documento:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="nombredoc"  class="span6" type="text" name="nombredoc" value="<?php echo $datadocumento->nombredocumento; ?>"  readonly/>
                                             <input id="iddocumento" class="span6" type="hidden" name="iddocumento" value="<?php echo $datadocumento->iddocumento;?>"  />

                                         </div>
                                        </div>

                        
                     <div class="control-group" style="margin-left: 35px">
                        <label for="tipotramite" class="control-label">Nombre Tipo de Tramite:<span class="required">*</span></label>
                         <div class="controls">
                                            <input id="nombretipotramite"  class="span8" type="text" name="nombrearea" value="<?php echo $datatipotramite->nombretipotramite; ?>"  readonly/>
                                            <input id="tipotramite" class="span8" type="hidden" name="tipotramite" value="<?php echo $datadocumento->tipotramite_id;?>"  />

                                         </div>
                                        </div>



                    <div class="control-group" style="margin-left: 35px">
                                            <label for="dniaprobacion" class="control-label">DNI Usuario:</label>
                                             <div class="controls">
                                           <input id="dniaprobacion" type="text" name="dniaprobacion" value="<?php echo $datausuario[0]->dni; ?>"  readonly/>
                                </div>                                                   

                     </div>
                     <div class="control-group" style="margin-left: 35px">
                        <label for="idareaactual" class="control-label">Area Actual:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="nombrearea1"  type="text" name="nombrearea1" value="<?php echo $dataarea->nombrearea; ?>"  readonly/>
                                            <input id="idareaactual" class="span6" type="hidden" name="idareaactual" value="<?php echo $dataarea->idarea; ?>"  />
                                        </div> 
                                        </div>




                     
                     <div class="control-group" style="margin-left: 35px">
                        <label for="codsecuenactual" class="control-label">Codigo Secuencia Actual:<span class="required">*</span></label>
                        <div class="controls">
                                            <input id="extra_param_field"  type="text" name="extra_param_field" value="<?php echo $result->codsecuenciatramite; ?>"  readonly/>
                                        </div> 
                                        </div>


        <div class="control-group" style="margin-left: 35px">
                    <div class="span12" style="padding: 1%; margin-left: 40px">

                                        <div class="span6">
                                            <label for="descripcionarea">Observaciones:</label>
                                            <textarea class="span12" name="observaciones" id="observaciones" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"><?php echo $result->observaciones;
  // MySQL datetime format
?></textarea>
                                        </div>                                          
                                        </div>
                                         </div>
    <div class="control-group" style="margin-left: 35px">
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




<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".money").maskMoney(); 

     $('#recebido').click(function(event) {
        var flag = $(this).is(':checked');
        if(flag == true){
          $('#divRecebimento').show();
        }
        else{
          $('#divRecebimento').hide();
        }
     });

     $(document).on('click', '#btn-faturar', function(event) {
       event.preventDefault();
         valor = $('#total-iteraciondocumento').val();
         valor = valor.replace(',', '' );
         $('#valor').val(valor);
     });


     $("#pasosiguiente").change(function () {
  
     $("#nombrearea2").val($(this).val());  
var price = $(this).children('option:selected').data('price');
    $('#idareasiguiente').val(price);

}).change();

     
   

     $("#Tipotramite").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTipotramite",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idTipotramite").val(ui.item.id);
                 $("#estoque").val(ui.item.estoque);
                 $("#preco").val(ui.item.preco);
                 $("#quantidade").focus();
                 

            }
      });



      $("#Area").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteArea",
            minLength: 2,
            select: function( event, ui ) {

                 $("#area_id").val(ui.item.id);


            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

                 $("#usuarios_id").val(ui.item.id);


            }
      });



      $("#formiteraciondocumento").validate({
          rules:{
             Area: {required:true},
             tecnico: {required:true},
             dataiteraciondocumento: {required:true}
          },
          messages:{
             Area: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataiteraciondocumento: {required: 'Campo Requerido.'}
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





     

       $(document).on('click', 'a', function(event) {
            var idTipotramite = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var Tipotramite = $(this).attr('prodAcao');
            if((idTipotramite % 1) == 0){
                $("#divtipotramite").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/iteraciondocumento/excluirTipotramite",
                  data: "idTipotramite="+idTipotramite+"&quantidade="+quantidade+"&Tipotramite="+Tipotramite,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divtipotramite" ).load("<?php echo current_url();?> #divtipotramite" );
                        
                    }
                    else{
                        alert('Ocurrio un error al eliminar un producto.');
                    }
                  }
                  });
                  return false;
            }
            
       });

       $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });




});

</script>

