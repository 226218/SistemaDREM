<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                <h5>Editar Tipo de Tramite</h5>
            </div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formTipotramite" method="post" enctype="multipart/form-data" class="form-horizontal" >
                     <div class="control-group">
                        <?php echo form_hidden('idtipotramite',$result->idtipotramite) ?>
                        <label for="nombretipotramite" class="control-label">Tipo de Tramite<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombretipotramite" type="text" name="nombretipotramite" value="<?php echo $result->nombretipotramite; ?>"  />
                        </div>
                    </div>

                     <div class="control-group" >

                                        <div class="span6" style="padding: 1%; margin-left: 20">
                                            <label for="descripciontipotramite">Descripcion del Tipo de Tramite*</label>
                                            <textarea class="span12" name="descripciontipotramite" id="descripciontipotramite" cols="25" rows="6" style="margin-left: 40px; width: 691px; height: 129px;"><?php echo $result->descripciontipotramite;  ?> </textarea>
                                                                                  
                                        </div>
                                        

                     </div>
<br>

    <div class="control-group"> <img width="250" height="300" style="margin-left: 50px;  border-width: 2px;
  border-style: solid;
  border-color: black;"src="<?php echo $result->imagen;?>">
         </div>
                    
                       <div class="control-group">
                        <label for="preco" class="control-label">Archivo*</label>
                        <div class="controls">
                            <input id="image" type="file" name="userfile" accept="image/*" /> (png|jpg|jpeg) 10MB LIMITE
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
                                <a href="<?php echo base_url() ?>index.php/tipotramite" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

         </div>
     </div>
</div>

<script src="<?php echo base_url()?>js/additional-methods.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".money").maskMoney();

        $('#formTipotramite').validate({
            rules :{
                  nombretipotramite: { required: true},
                  descripciontipotramite: { required: true},
                  
                  },
            messages:{
                  nombretipotramite: { required: 'Campo Requerido.'},
                  descripciontipotramite: {required: 'Campo Requerido.'},
                 
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


    $( "#userfile" ).validate({
  rules: {
    field: {
      
      accept: "image/*"

    }
  }
});

</script>




