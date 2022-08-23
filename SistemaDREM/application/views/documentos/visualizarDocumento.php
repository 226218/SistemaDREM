<?php 


             $tipotramite = $this->documentos_model->gettipotramite($result->tipotramite_id);


    ?>         
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Datos del Documento</a></li>
        </ul>
    </div>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon icon-file-alt"></i></span><h5>Datos de Documento</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Nombre Documento</strong></td>
                            <td><?php echo $result->nombredocumento; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Tipo de Tramite</strong></td>
                            <td><?php echo $tipotramite->nombretipotramite; ?></td>
                        </tr>
                       
                        <tr>
                            <td style="text-align: right"><strong>Fecha de Entrada al Area</strong></td>
                            <td><?php echo $result->fechaingreso; ?></td>
                        </tr>
                         <tr>
                            <td style="text-align: right"><strong>Fecha de Salida del Area</strong></td>
                            <td><?php if($result->fechafin==null){echo '-';} else{ echo $result->fechafin;} ?></td>
                        </tr>
                                   <tr>
                            <td style="text-align: right"><strong>Estado de Tramite</strong></td>
                            <td><?php if($result->estado=='T'){echo 'Tramitando';} elseif($result->estado=='ED'){echo 'Esperando Documentacion';} elseif($result->estado=='O'){echo 'Observado';} elseif($result->estado=='D'){echo 'Derivado';}  elseif($result->estado=='F'){echo 'Finalizado';} ?></td>
                        </tr>

           <tr>
                            <td style="text-align: right"><strong>Nombre Completo remitente</strong></td>
                            <td><?php  echo $result->nombresremitente. ' '.$result->apellidopaternoremitente.' '.$result->apellidomaternoremitente; ?></td>
                         </tr>
                              <tr>
                            <td style="text-align: right"><strong>DNI remitente</strong></td>
                            <td><?php  echo $result->dniremitente; ?></td>
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

