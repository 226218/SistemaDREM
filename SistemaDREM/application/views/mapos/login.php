<!DOCTYPE html>
<html lang="pt-br">
    
<head>
        <title>Sistema Tramite Documentario DREM</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
       <?php $palabra="a";?>
        <div id="loginbox">            
            <form  class="form-vertical" id="formLogin" method="post" action="<?php echo base_url()?>index.php/mapos/verificarLogin">
                  <?php if($this->session->flashdata('error') != null){?>
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $this->session->flashdata('error');?>
                       </div>
                  <?php }?>
                <div class="control-group normal_text"> <h3><img src="<?php echo base_url()?>assets/img/dremlogo.jpg" alt="Logo" width="350" height="350" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lr"><i class="icon-user"></i></span><input id="email" name="email" type="text" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock""></i></span><input name="contrasenha" type="password" placeholder="Contraseña" />
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="text-align: center">
                    <button class="btn btn-info btn-large"/> Iniciar</button>
                </div>
            </form>
       
        </div>
        
        
        
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/validate.js"></script>



 <!-- setTimeout(function(){document.location.href = "<?php echo base_url();?>index.php/mapos"},600); -->
                           
        <script type="text/javascript">
            $(document).ready(function(){

                $('#email').focus();
                $("#formLogin").validate({
                     rules :{
                          email: { required: true, email: true},
                          contrasenha: { required: true}
                    },
                    messages:{
                          email: { required: 'Campo Requerido.', email: 'Escriba un Email válido'},
                          contrasenha: {required: 'Campo Requerido.'}
                    },
                   submitHandler: function( form ){       
                         var dados = $( form ).serialize();
                         
                    
                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url();?>index.php/mapos/verificarLogin?ajax=true",
                          data: dados,
                          dataType: 'json',
                          success: function(data)
                          {
                               
                            if(data.result == true)
                             {
                             
                               document.location.href = "<?php echo base_url();?>index.php/mapos";
                          
                            }
                            else{
                                $('#call-modal').trigger('click');

                            }
                             
                          }
                          ,
        error: function() {
            alert('Logueando');
             document.location.href = "<?php echo base_url();?>index.php/mapos";
        }
                          });

                          return false;
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



        <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>

        <div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="myModalLabel">RMA O.S</h4>
          </div>
          <div class="modal-body">
            <h5 style="text-align: center"><?php echo base_url();?> <?php echo $palabra;?> Los datos de acesso son incorretos, por favor vuelva a intentarlo!</h5>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

          </div>
        </div>

<!-- 
        <a href="#notification1" id="call-logueo" role="button" class="btn" data-toggle="logueo" style="display: none ">notification</a>

        <div id="notification1" class="logueo hide fade" tabindex="-1" role="dialog" aria-labelledby="mylogueoLabel" aria-hidden="true">
          <div class="logueo-header">
            <button type="button" class="close" data-dismiss="logueo" aria-hidden="true">×</button>
            <h4 id="mylogueoLabel">RMA O.S</h4>
          </div>
          <div class="logueo-body">
            <h5 style="text-align: center"><?php echo base_url();?> <?php echo $palabra;?> Los datos de acesso son correctos, accediendo!</h5>
          </div>
          <div class="logueo-footer">
            <button class="btn btn-primary" data-dismiss="logueo" aria-hidden="true">Cerrar</button>

          </div>
        </div>
 -->

    </body>

</html>









