<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Mis Datos</a></li>
            
            <div class="buttons">
                    <a title="Icon Title" class="btn btn-mini btn-info" href="<?php echo base_url()?>index.php/conecte/editarDados/<?php echo $result->idarea?>"><i class="icon-pencil icon-white"></i> Editar</a>
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
                                            <span class="icon"><i class="icon-list"></i></span><h5>Datos Personales</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Nombre</strong></td>
                                                    <td><?php echo $result->nomeArea ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>DNI/NIE/NIF</strong></td>
                                                    <td><?php echo $result->documento ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Fecha de Registro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->fechaCreacion)) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Contactos</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGTwo">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Teléfono</strong></td>
                                                    <td><?php echo $result->telefono ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Tel. Móvil</strong></td>
                                                    <td><?php echo $result->celular ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Email</strong></td>
                                                    <td><?php echo $result->email ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Dirección</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGThree">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Dirección</strong></td>
                                                    <td><?php echo $result->rua ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Número</strong></td>
                                                    <td><?php echo $result->numero ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Barrio</strong></td>
                                                    <td><?php echo $result->bairro ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Ciudad</strong></td>
                                                    <td><?php echo $result->cidade ?> 
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>País</strong></td>
                                                    <td><?php echo $result->estado ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>CP</strong></td>
                                                    <td><?php echo $result->cep ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

          
        </div> 
    </div>
</div>