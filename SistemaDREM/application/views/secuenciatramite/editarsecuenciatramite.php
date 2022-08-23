<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>


<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Editar Secuencia Tramite</h5>
            </div>
            <div class="widget-content nopadding">


                    <div class="tab-content">
                 
                            <div class="span12" id="divEditariteraciondocumento">
                                
                                     <form action="<?php echo current_url(); ?>" id="formeditarsecuenciatramite" enctype="multipart/form-data" method="post" class="form-horizontal" >
                                        <?php echo form_hidden('idsecuenciatramite',$result->idsecuenciatramite) ?>



             <div class="control-group" >


                      <label for="tipotramite"  class="control-label">ID de Secuencia de Tramite:<span class="required">*</span></label>

                         <div class="controls">
                                            <input id="idsecuenciatramite" class="span6" type="text" name="idsecuenciatramite" value="<?php echo $result->idsecuenciatramite; ?>"  readonly/>
                                         
                                         </div>
                                         <br>
   </div>   


 <div class="control-group" >


                      <label for="tipotramite"  class="control-label">Codigo de Secuencia de Tramite:<span class="required">*</span></label>

                         <div class="controls">
                                            <input id="codsecuenciatramite" class="span6" type="text" name="codsecuenciatramite" value=" <?php echo $result->codsecuenciatramite; ?>"  />
                                         
                                         </div>
                                         <br>
   </div>   

        <div class="control-group" >


                      <label for="tipotramite"  class="control-label">Nombre de Secuencia de Tramite:<span class="required">*</span></label>

                         <div class="controls">
                                            <input id="idsecuenciatramite" class="span6" type="text" name="nombresecuencia" value=" <?php echo $result->nombresecuencia; ?>"  />
                                         
                                         </div>
                                         <br>
   </div>  



     <div class="control-group" >
  <label for="codsecuenciaprevia" class="control-label">Codigo de la Secuencia Previa  :</label>
                                             <div class="controls">
                                            

                                    
                                           <input id="nombrecodsecuenciaprevia" class="span6" type="text" name="nombrecodsecuenciaprevia" value="<?php 
                                        if($result->codsecuenciaprevia!=null)
{
                                                  $nombresecueeenciaprevia= $this->secuenciatramite_model->getnombresecuenciaprevia($result->codsecuenciaprevia);


                                         echo $nombresecueeenciaprevia[0]['nombresecuencia']; } ?>"  />
                                         <br>
<br>
                                            <input id="codsecuenciaprevia"  type="text" name="codsecuenciaprevia" value="<?php echo $result->codsecuenciaprevia; ?>"  readonly/>
                                             
                                </div>                                                   
  </div>
                   <br>



          <?php
                                                     $iddelusuario=$this->session->userdata('id');
$datausuario = $this->secuenciatramite_model->getUsuarios($this->session->userdata('id')); 
$dataarea = $this->secuenciatramite_model->getarea($datausuario[0]->idarea); 
$nombretipotramiteee=  $this->secuenciatramite_model->gettipotramite($result->tipotramite_id); 
?>

 <div class="control-group">


                      <label for="tipotramite" class="control-label">Nombre del Tipo de Tramite:<span class="required">*</span></label>

                         <div class="controls">
                                            <input id="tipotramite" class="span6" type="text" name="tipotramite" value=" <?php echo $nombretipotramiteee->nombretipotramite; ?>"  readonly/>
                                            <input id="tipotramite_id" class="span6" type="hidden" name="tipotramite_id" value="<?php echo $result->tipotramite_id; ?>"  />
                                         </div>
                                         <br>
   </div>


 <div class="control-group">
             <label for="estadoaccionsecuencia" class="control-label">Estado:<span class="required">*</span></label>
                        <div class="controls">
                          <select name="estadoaccionsecuencia" id="estadoaccionsecuencia">
<?php 
$estadoa='';
$estadob='';
$estadoc='';
$estadod='';
if($result->estadoaccionsecuencia=='T')
{

$estadoa='selected';
}
if($result->estadoaccionsecuencia=='ED')
{
$estadob='selected';

}
if($result->estadoaccionsecuencia=='O')
{
$estadoc='selected';

}
if($result->estadoaccionsecuencia=='F')
{
$estadod='selected';

}


 ?>

                             <option value="T" <?php echo $estadoa;?> >Tramitando</option>
                               <option value="ED" <?php echo $estadob;?> >Esperando Documentacion</option>
                                <option value="O"<?php echo $estadoc;?> >Observado</option>
                                  <option value="F" <?php echo $estadod;?> >Finalizado</option>
                                </select>
                                  </div>                           
                                 </div>
                                    
                        <div class="control-group">            

                                   <label for="idarea" class="control-label">Nombre de Area donde se realiza el proceso: <span class="required">*</span></label>
                            <div class="controls">

                            <select name="idarea" id="idarea">
                               <?php


  $todasareas = $this->secuenciatramite_model->getTodasAreas(); 
foreach($todasareas as $row){ 

$valor = $row['idarea'];
$nomb = $row['nombrearea'];  
?>
                              <option value="<?php  echo $valor; ?>" <?php if($result->idarea==$valor){echo "selected";} ?>><?php  echo $nomb; }?></option>
                    </select>
                    <span>  Area donde se encuentra el documento en este tramite</span>
                        </div>

   </div>
<br>

                                                        <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Editar</button>
                                <a href="<?php echo base_url() ?>index.php/secuenciatramite" id="btnEditar" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>

                                   
                                 

                                </form>
                                
                               
                               

                            </div>

                        

                    </div>

            
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
     


 $("#nombrecodsecuenciaprevia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/secuenciatramite/autoCompletePreviaSecuenciatramite",
            minLength: 1,
            select: function( event, ui ) {

                 $("#codsecuenciaprevia").val(ui.item.codsecuenciatramite);
                

            }
      });



  

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




      $("#formtipotramite").validate({
          rules:{
             quantidade: {required:true}
          },
          messages:{
             quantidade: {required: 'Introduzca la cantidad'}
          },
          submitHandler: function( form ){
             var quantidade = parseInt($("#quantidade").val());
             var estoque = parseInt($("#estoque").val());
             if(estoque < quantidade){
                alert('Usted no tiene bastante stock.');
             }
             else{
                 var dados = $( form ).serialize();
                $("#divtipotramite").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/iteraciondocumento/adicionarTipotramite",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $("#divtipotramite" ).load("<?php echo current_url();?> #divtipotramite" );
                        $("#quantidade").val('');
                        $("#Tipotramite").val('').focus();
                    }
                    else{
                        alert('Ocurrio un error al agregar un producto.');
                    }
                  }
                  });

                  return false;
                }

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

