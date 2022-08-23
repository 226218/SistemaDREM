<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Datos del Area</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'eArea')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/area/editar/'.$result->idarea.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
            </div>
        </ul>
    </div>
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Datos de Area</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Codigo Area</strong></td>
                                                    <td><?php echo $result->idarea ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Nombre del Area</strong></td>
                                                    <td><?php echo $result->nombrearea ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Descripcion del Area</strong></td>
                                                    <td><?php echo $result->descripcionarea ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                            </div>
                        </div>



          
        </div>


        <!--Tab 2-->
        
    </div>
</div>