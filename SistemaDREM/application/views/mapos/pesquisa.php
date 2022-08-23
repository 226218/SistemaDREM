<div class="span12" style="margin-left: 0; margin-top: 0">
    <div class="span12" style="margin-left: 0">
        <form action="<?php echo current_url()?>">
        <div class="span10" style="margin-left: 0">
            <input type="text" class="span12" name="termo" placeholder="Introduzca el término de búsqueda" />
        </div>
        <div class="span2">
            <button class="span12 btn"><i class=" icon-search"></i> Buscar</button>
        </div>
        </form>
    </div>
    <div class="span12" style="margin-left: 0; margin-top: 0">
    <!--tipotramite-->
    <div class="span6" style="margin-left: 0; margin-top: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-barcode"></i>
                </span>
                <h5>Productos</h5>

            </div>

            <div class="widget-content nopadding">

               
                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($tipotramite == null){
                            echo '<tr><td colspan="4">Ningún producto fue encontrado.</td></tr>';
                        }
                        foreach ($tipotramite as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idtipotramite . '</td>';
                            echo '<td>' . $r->nombretipotramite . '</td>';
                            echo '<td>' . $r->descripciontipotramite . '</td>';
                            
                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permiso'),'vTipotramite')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/tipotramite/visualizar/' . $r->idtipotramite . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            }
                            if($this->permission->checkPermission($this->session->userdata('permiso'),'eTipotramite')){
                                echo '<a href="' . base_url() . 'index.php/tipotramite/editar/' . $r->idtipotramite . '" class="btn btn-info tip-top" title="Editar Producto"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                            
                            echo '</td>';
                            echo '</tr>';
                        } ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--area-->
    <div class="span6">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>area</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>DNI/NIE/NIF</th>
                            <th>Teléfono</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($area == null){
                            echo '<tr><td colspan="4">Ningúm Area fue encontrado.</td></tr>';
                        }
                        foreach ($area as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idarea . '</td>';
                            echo '<td>' . $r->nombrearea . '</td>';
                            
                            echo '<td>';

                            if($this->permission->checkPermission($this->session->userdata('permiso'),'vArea')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/area/visualizar/' . $r->idarea . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            } 
                            if($this->permission->checkPermission($this->session->userdata('permiso'),'eArea')){
                                echo '<a href="' . base_url() . 'index.php/area/editar/' . $r->idarea . '" class="btn btn-info tip-top" title="Editar Area"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                            
                            
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
    
    <!--Serviços-->
    <div class="span6" style="margin-left: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-wrench"></i>
                </span>
                <h5>Servicios</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($documentos == null){
                            echo '<tr><td colspan="4">Ningún servicio fue encontrado.</td></tr>';
                        }
                        foreach ($documentos as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->iddocumentos . '</td>';
                            echo '<td>' . $r->nome . '</td>';
                            echo '<td>' . $r->preco . '</td>';
                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permiso'),'eDocumento')){
                                echo '<a href="' . base_url() . 'index.php/documentos/editar/' . $r->iddocumentos . '" class="btn btn-info tip-top" title="Editar Servicio"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                                
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--Ordens de Serviço-->
    <div class="span6">
         <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>

            </div>

           
        </div>
    </div>



</div>

