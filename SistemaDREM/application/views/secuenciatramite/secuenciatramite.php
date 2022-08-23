
<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Secuencia Tramite</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Tipo Tramite </th>
            <th>Nombre de Secuencia</th>
            <th>Secuencia Previa</th>
            <th>Estado Secuencia </th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ninguna Secuencia Registrada</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{
$iddelusuario=$this->session->userdata('id');
$datausuario = $this->secuenciatramite_model->getUsuarios($this->session->userdata('id'));


  ?>


<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-list-ol"></i>
         </span>
        <h5>Secuencia de Tramites</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
              <th>Codigo de Secuencia Tramite </th>
            <th>Nombre de Secuencia</th>
            <th>Secuencia Previa</th>
            <th>Tipo de Tramite </th>
             <th>Accion </th>
        </tr> 
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
         

         $datausuario = $this->secuenciatramite_model->getUsuarios($this->session->userdata('id'));
$permisocargo= $datausuario[0]->permisos_id;


$nombretipotramite = $this->secuenciatramite_model->gettipotramite($r->tipotramite_id);

                  echo '<tr>';
                  echo '<td>'.$r->idsecuenciatramite.'</td>';
            
            echo '<td width="10%">'.$r->codsecuenciatramite.'</td>';
             echo '<td >'.mb_strimwidth($r->nombresecuencia,0,50,'....').'</td>';
            echo '<td width="10%">'.$r->codsecuenciaprevia.'</td>';
             echo '<td width="25%">'.mb_strimwidth($nombretipotramite->nombretipotramite,0,50,'....').'</td>';
                  echo '<td>';
if($this->permission->checkPermission($this->session->userdata('permiso'),'esecuenciatramite') ){
                echo '<a style="margin-right: 2%; width: 20%;" href="'.base_url().'index.php/secuenciatramite/visualizar/'.$r->idsecuenciatramite.'" class="btn tip-top" title="Abrir Secuencia Tramite"><i class="icon-eject"> <br>Abrir</i></a>'; 
            }
          
   if($this->permission->checkPermission($this->session->userdata('permiso'),'vsecuenciatramite')){
                echo '<a style="margin-right: 2%; width: 20%;" href="'.base_url().'index.php/secuenciatramite/editar/'.$r->idsecuenciatramite.'" class="btn tip-top" title="Editar Secuencia Tramite"><i class="icon-pencil"><br>Editar</i></a>'; 
            }
           
            
if($this->permission->checkPermission($this->session->userdata('permiso'),'dsecuenciatramite') && $permisocargo=='0' || $permisocargo=='1'){
               echo '<a href="#modal-excluir" role="button" data-toggle="modal" secuenciatramite="'.$r->codsecuenciatramite.'" style="margin-right: 2%; width: 25%;" class="btn btn-danger tip-top" title="Eliminar Secuencia Tramite"><i class="icon-remove"><br>Eliminar</i></a>'; 
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

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo current_url(); ?>">
        <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'asecuenciatramite')){ ?>
             <div class="span3">
                    <a href="<?php echo base_url()?>index.php/secuenciatramite/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Secuencia de Tramite</a>
 </div>  
        <?php } ?>

         <div class="span5">
            <input type="text" name="nombresec"  id="nombresec"  placeholder="Escriba el codigo de secuencia a buscar" class="span12" value="<?php echo $this->input->get('nombresec'); ?>" >        
        </div>
         <div class="span1">
            <button class="span12 btn"> <i class="icon-search"></i> </button>
        </div>

         </form>
</div>


<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/secuenciatramite/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Secuencia de Tramite</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="codsecuenciatramite" name="id" value="" />
    <h5 style="text-align: center">Desea realmente eliminar esta Secuencia de Tramite?</h5>
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
        
        var secuenciatramite = $(this).attr('secuenciatramite');
        $('#codsecuenciatramite').val(secuenciatramite);

    });

});

</script>