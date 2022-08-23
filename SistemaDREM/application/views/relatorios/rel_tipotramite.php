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
                    <li><a href="<?php echo base_url()?>index.php/relatorios/tipotramiteRapid"><i class="icon-user"></i> <small>Todos los Tipos de Tramite</small></a></li>
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

                    <form action="<?php echo base_url()?>index.php/relatorios/tipotramiteCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Codigo o Palabra Clave del tramite:</label>
                                <input type="text" name="busquedapalabra" class="span12" />
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