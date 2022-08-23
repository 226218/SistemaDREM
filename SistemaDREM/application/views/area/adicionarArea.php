<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-sitemap"></i>
                </span>
                <h5>Registro de Area</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                     <form action="<?php echo current_url(); ?>" id="formArea" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nombrearea" class="control-label">Nombre Area<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombrearea" type="text" name="nombrearea" value="<?php echo set_value('nombrearea'); ?>"  />
                        </div>
                    </div>
                     <div class="span12" style="padding: 1%; margin-left: 20">

                                        <div class="span6">
                                            <label for="descripcionarea">Descripción de Area</label>
                                            <textarea class="span12" name="descripcionarea" id="descripcionarea" cols="30" rows="7"> </textarea>
                                                                                  
                                        </div>
                                        

                     </div>


                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/area" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
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
                  nombrearea:{ required: true},
                  descripcionarea:{ required: true},
            },
            messages:{
                  nombrearea :{ required: 'Campo Requerido.'},
                  descripcionarea :{ required: 'Campo Requerido.'},
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