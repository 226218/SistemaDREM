<a href="<?php echo base_url()?>index.php/usuarios/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Usuario</a>
<?php
if(!$results){?>
        <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
        </span>
        <h5>Usuarios</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>NIF</th>
            <th>Teléfono</th>
            <th>Área</th>
            <th>Nivel</th>
            <th>Cargo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>    
        <tr>
            <td colspan="5">Ningún Usuario Encontrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>


<?php } else{?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Usuarios</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>NIF</th>
            <th>Teléfono</th>
            <th>Area</th>
            <th>Nivel</th>
            <th>Cargo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $areaact = $this->usuarios_model->getarea($r->idarea);
           
            echo '<tr>';
            echo '<td>'.$r->idUsuarios.'</td>';
            echo '<td>'.$r->nombres.'</td>';
            echo '<td>'.$r->apellidopaterno.'</td>';
            echo '<td>'.$r->telefono.'</td>';
            echo '<td>'.$areaact->nombrearea.'</td>';
            echo '<td>'.$r->permiso.'</td>';
            echo '<td>'.$r->cargo.'</td>';
            echo '<td> <a href="'.base_url().'index.php/usuarios/editar/'.$r->idUsuarios.'" class="btn btn-info tip-top" title="Editar Usuario"><i class="icon-pencil icon-white"></i></a>  </td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>

	
<?php echo $this->pagination->create_links();}?>
