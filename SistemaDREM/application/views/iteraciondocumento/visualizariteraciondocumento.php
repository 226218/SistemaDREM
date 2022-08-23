<?php $areaact = $this->iteraciondocumento_model->getarea($result->idareaactual);
             $areasec = $this->iteraciondocumento_model->getarea($result->idareasiguiente);

             $documento = $this->iteraciondocumento_model->getdocumentos($result->iddocumento);


   $dnidesencriptado = $this->iteraciondocumento_model->getdnidesencriptado($result->dniaprobacion);

  $nombreaprobado = $this->iteraciondocumento_model->getUsuariosDNI($dnidesencriptado);

    ?>         
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Datos Iteracion Documento</a></li>
        </ul>
    </div>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-retweet"></i></span><h5>Datos de Iteracion del Documento</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Nombre Documento</strong></td>
                            <td><?php echo $documento->nombredocumento; ?></td>
                        </tr>
                         <tr>
                            <td style="text-align: right"><strong>Area Actual</strong></td>
                            <td><?php echo $areaact->nombrearea; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Aprobado por: </strong></td>
                            <td><?php echo $nombreaprobado[0]->cargo.": ".$nombreaprobado[0]->nombres." ".$nombreaprobado[0]->apellidopaterno." ".$nombreaprobado[0]->apellidomaterno;  ?></td>
                        </tr>
                       
                        <tr>
                            <td style="text-align: right"><strong>Area Siguiente</strong></td>
                            <td><?php if($result->idareasiguiente== null ) {echo '-';} else {echo  $areasec->nombrearea;} ?></td>
                        </tr>
                   <tr>
                            <td style="text-align: right"><strong>Fecha de Entrada al Area</strong></td>
                            <td><?php echo $result->fechaingreso; ?></td>
                        </tr>
                         <tr>
                            <td style="text-align: right"><strong>Fecha de Salida del Area</strong></td>
                            <td><?php if($result->fechaaprobacion== null ){echo '-';} if($result->fechaaprobacion!= null ) {echo  $result->fechaaprobacion;} ?></td>
                        </tr>
                                   <tr>
                            <td style="text-align: right"><strong>Estado de Tramite</strong></td>
                            <td><?php  if($result->estadotramite=='T'){echo 'Tramitando';} elseif($result->estadotramite=='ED'){echo 'Esperando Documentacion';} elseif($result->estadotramite=='O'){echo 'Observado';} elseif($result->estadotramite=='D'){echo 'Derivado';}  elseif($result->estadotramite=='F'){echo 'Finalizado';}  ?></td>
                        </tr>

           <tr>
                            <td style="text-align: right"><strong>Nombre Completo remitente</strong></td>
                            <td><?php  echo $documento->nombresremitente. ' '.$documento->apellidopaternoremitente.' '.$documento->apellidomaternoremitente; ?></td>
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


