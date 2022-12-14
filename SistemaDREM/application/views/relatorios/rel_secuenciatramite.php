<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>reportes Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a href="<?php echo base_url()?>index.php/relatorios/iteraciondocumentoRapid"><i class="icon-tags"></i> <small>Todas los Registros de Tramite Documentario</small></a></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>reportes Personalizables</h5>
            </div>
            <div class="widget-content">
                <div class="span12 well">

                    <form action="<?php echo base_url() ?>index.php/relatorios/iteraciondocumentoCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Fecha de:</label>
                                <input type="date" name="dataInicial" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="">a:</label>
                                <input type="date"  name="dataFinal" class="span12" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Area:</label>
                                <input type="text"  id="Area" class="span12" />
                                <input type="hidden" name="Area" id="AreaHide" />

                            </div>
                            <div class="span6">
                                <label for="">Vendedor:</label>
                                <input type="text" id="tecnico"   class="span12" />
                                <input type="hidden" name="responsavel" id="responsavelHide" />
                            </div>
                        </div>
          

                        <div class="span12" style="margin-left: 0; text-align: center">
                            <input type="reset" class="btn" value="Limpiar" />
                            <button class="btn btn-inverse"><i class="icon-print icon-white"></i> Imprimir</button>
                        </div>
                    </form>
                </div>
                .
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".money").maskMoney();
        
        $("#Area").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteArea",
            minLength: 2,
            select: function( event, ui ) {

                 $("#AreaHide").val(ui.item.id);


            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

                 $("#responsavelHide").val(ui.item.id);


            }
      });

    });
</script>