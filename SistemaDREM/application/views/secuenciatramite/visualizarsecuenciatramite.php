<?php 

/*
$areaact = $this->iteraciondocumento_model->getarea($result->idareaactual);
             $areasec = $this->iteraciondocumento_model->getarea($result->idareasiguiente);

             $documento = $this->iteraciondocumento_model->getdocumentos($result->iddocumento);


   $dnidesencriptado = $this->iteraciondocumento_model->getdnidesencriptado($result->dniaprobacion);
   */


         $iddelusuario=$this->session->userdata('id');
$datausuario = $this->secuenciatramite_model->getUsuarios($this->session->userdata('id')); 
$dataarea = $this->secuenciatramite_model->getarea($datausuario[0]->idarea); 

$nombrearea = $this->secuenciatramite_model->nombrearea($result->idarea); 

$nombretipotramite = $this->secuenciatramite_model->nombretipotramite($result->tipotramite_id); 

$valor ='';
$nomb ='';
    ?>         
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Datos Tramite Documentario</a></li>
        </ul>
    </div>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Datos de Tramite Documentario</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                            <td style="text-align: right"><strong>Tipo de Tramite</strong></td>
                            <td><?php echo $nombretipotramite[0]->nombretipotramite    ; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Codigo de Secuencia de Tramite</strong></td>
                            <td><?php echo $result->codsecuenciatramite; ?></td>
                        </tr>
                        <tr>

                            <td style="text-align: right"><strong>Nombre de Secuencia</strong></td>
                            <td><?php echo $result->nombresecuencia; ?></td>
                        </tr>
                       
                        <tr>
                            <td style="text-align: right"><strong>Estado de Tramite</strong></td>
                            <td><?php 

                                  if($result->estadoaccionsecuencia== 'T' ) {echo 'Tramitando';} if($result->estadoaccionsecuencia== 'ED' ) {echo 'Esperando Documentacion';} 
                                  if($result->estadoaccionsecuencia== 'O' ) {echo 'Observado';} if($result->estadoaccionsecuencia== 'F' ) {echo 'Finallizado';}  ?></td>
                        </tr>
                   <tr>
                            <td style="text-align: right"><strong>Nombre de Area donde se realiza el proceso :</strong></td>
                            <td><?php echo $nombrearea[0]->nombrearea;  ?></td>
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


