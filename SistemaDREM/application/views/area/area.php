
<?php
if(!$results){?>
        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-sitemap"></i>
            </span>
            <h5>Area</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                         <th>#</th>
            <th>Nombre Area</th>
            <th>Descripcion Area</th>
            <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Ninguna Area Registrada</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-sitemap"></i>
         </span>
        <h5>Area</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre Area</th>
            <th>Descripcion Area</th>
            <th style="white-space: nowrap; padding-right: 20px; " >Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idarea.'</td>';
            echo '<td>'.$r->nombrearea.'</td>';
            echo '<td>'.$r->descripcionarea.'</td>';
            echo '<td style="white-space: nowrap;  padding-right: 45px;">';
            if($this->permission->checkPermission($this->session->userdata('permiso'),'vArea')){
                echo '<a href="'.base_url().'index.php/area/visualizar/'.$r->idarea.'" style="margin-right: 2%; width: 25%;" class="btn tip-top" title="Ver mas detalles"><i class="icon-eject"><br>Abrir</i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eArea')){
                echo '<a href="'.base_url().'index.php/area/editar/'.$r->idarea.'" style="margin-right: 2%; width: 25%;" class="btn tip-top" title="Editar Area"><i class="icon-pencil"><br>Modificar</i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permiso'),'dArea')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" Area="'.$r->idarea.'" style="margin-right: 2%; width: 25%;" class="btn btn-danger tip-top" title="Eliminar Area"><i class="icon-remove"><br>Borrar</i></a>'; 
            }

              
            echo '</td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
<?php echo $this->pagination->create_links();}?>


<br>

<?php if($this->permission->checkPermission($this->session->userdata('permiso'),'aArea')){ ?>
    <a href="<?php echo base_url();?>index.php/area/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Area</a>    
<?php } ?>

 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/area/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Area</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idArea" name="id" value="" />
    <h5 style="text-align: center">¿Realmente deseas eliminar este Area ?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Eliminar</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var Area = $(this).attr('Area');
        $('#idArea').val(Area);

    });

});

</script>
