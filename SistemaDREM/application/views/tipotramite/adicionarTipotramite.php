<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                <h5>Registrar Tipo de Tramite</h5>
            </div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formTipotramite"  enctype="multipart/form-data" method="post" class="form-horizontal" >
                     <div class="control-group">
                        <label for="nombretipotramite" class="control-label">Tipo de Tramite<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombretipotramite" type="text" name="nombretipotramite" value=""  />
                        </div>
                    </div>

                        
                   <div class="span12" style="padding: 1%; margin-left: 20">

                                        <div class="span6">
                                            <label for="descripciontipotramite">Descripcion del Tipo de Tramite*</label>
                                            <textarea class="span12" name="descripciontipotramite" id="descripciontipotramite" cols="25" rows="6" style="margin: 0px; width: 691px; height: 129px;"> </textarea>
                                                                                  
                                        </div>
                                        

                     </div>


                    <div class="control-group">
                        <label for="imagen" class="control-label"><span >Archivo*</span></label>
                        <div class="controls">
                            <input id="imagen" type="file" name="userfile"  accept=".png, .jpg, .jpeg, .pdf, .JPG, .JPEG, .PNG, .PDF"/> (png|jpg|jpeg|pdf|PNG|JPG|JPEG|PDF) 10MB LIMITE
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/tipotramite" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>

                    
                </form>
            </div>

         </div>
     </div>
</div>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
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
</script>



