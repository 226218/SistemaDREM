

<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-paste"></i>
         </span>
        <h5>Tipo de Tramite</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre de Tipo de Tramite</th>
            <th>Descripcion de Tipo de Tramite</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="5">Ningún Tipo de Tramite Registrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>

<?php } else{?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon" style="width:14px;">
            <i class="icon-paste" ></i>
         </span>
        <h5>Tipo de Tramite</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion Documento</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idtipotramite.'</td>';
            echo '<td width="5%">'.$r->nombretipotramite.'</td>';
            echo '<td width="35%">'.mb_strimwidth($r->descripciontipotramite,0,180,'....').'</td>';
            echo '<td width="28%"> <img width="250" height="300" src="'.$r->imagen.'"></td>';
            
            echo '<td style="white-space: nowrap;  padding-right: 45px;">';
            if($this->permission->checkPermission($this->session->userdata('permiso'),'vTipotramite')){
                echo '<a style="margin-right: 2%; width: 25%;" href="'.base_url().'index.php/tipotramite/visualizar/'.$r->idtipotramite.'" class="btn tip-top" title="Visualizar Tipo de Tramite"><i class="icon-eject"><br>Abrir</i></a>  '; 
            }
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eTipotramite')){
                echo '<a style="margin-right: 2%; width: 25%;" href="'.base_url().'index.php/tipotramite/editar/'.$r->idtipotramite.'" class="btn tip-top" title="Editar Tipo de Tramite"><i class="icon-pencil"><br>Modificar</i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permiso'),'dTipotramite')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" Tipotramite="'.$r->idtipotramite.'" style="margin-right: 2%; width: 25%;" class="btn btn-danger tip-top" title="Eliminar Tipo de Tramite"><i class="icon-remove icon-white"><br>Eliminar</i></a>'; 
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

<?php if($this->permission->checkPermission($this->session->userdata('permiso'),'aTipotramite')){ ?>
    <a href="<?php echo base_url();?>index.php/tipotramite/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Tipo de Tramite</a>
<?php } ?>


<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/tipotramite/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Tipo de Tramite</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idTipotramite" name="id" value="" />
    <h5 style="text-align: center">Desea realmente eliminar este Tipo de Tramite?</h5>
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
        
        var Tipotramite = $(this).attr('Tipotramite');
        $('#idTipotramite').val(Tipotramite);

    });

});

</script>