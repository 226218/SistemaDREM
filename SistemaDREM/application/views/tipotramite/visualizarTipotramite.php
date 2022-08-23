<div class="accordion" id="collapse-group">
    <div class="accordion-group widget-box">
        <div class="accordion-heading">
            <div class="widget-title">
                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                    <span class="icon"><i class="icon-list"></i></span><h5>Datos de Tipo de Tramite</h5>
                </a>
            </div>
        </div>
        <div class="collapse in accordion-body">
            <div class="widget-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>nombretipotramite</strong></td>
                            <td><?php echo $result->nombretipotramite ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>descripciontipotramite</strong></td>
                            <td><?php echo $result->descripciontipotramite ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Imagen</strong></td>
                            <td> <img  src=" <?php echo $result->imagen; ?>"></td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

