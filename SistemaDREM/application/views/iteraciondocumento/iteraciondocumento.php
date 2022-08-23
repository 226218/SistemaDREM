
<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-retweet"></i>
         </span>
        <h5>Tramite Documento</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th> 
            <th>Fecha de Venta</th>
            <th>Area</th>
            <th>Facturado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ningun Tramite de Documento Registrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{
$iddelusuario=$this->session->userdata('id');
$datausuario = $this->iteraciondocumento_model->getUsuarios($this->session->userdata('id'));


  ?>


<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Iteración Documento</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre Documento</th>
            <th>Tipo de Tramite</th>
            <th>Nombre Completo remitente</th>
            <th>Area Actual</th>
            <th>Area Siguiente</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {

              $areaact = $this->iteraciondocumento_model->getarea($r->idareaactual);
             $areasec = $this->iteraciondocumento_model->getarea($r->idareasiguiente);
               @$nose=$areasec->idarea;
            $permisoenvio= $r->idareasiguiente;
          $permisocargo= $datausuario[0]->permisos_id;
          $usuarioarea= $datausuario[0]->idarea;




if($datausuario[0]->idarea=='0' || $datausuario[0]->idarea=='1' )
{

if($r->idareaactual!=$datausuario[0]->idarea )
{
    echo '<tr>';
            echo '<td>'.$r->iditeraciondocumento.'</td>';
             echo '<td>'.mb_strimwidth($r->nombredocumento,0,20,'....').'</td>';
            echo '<td style="width:20%;">'.mb_strimwidth($r->nombretipotramite,0,30,'....').'</td>';
             echo '<td style="width:10%;">'.$r->nombresremitente.' '.$r->apellidopaternoremitente.' '.$r->apellidomaternoremitente.'</td>';
                  
             echo '<td style="width:10%;">'.$areaact->nombrearea.'</td>';

           
           if($nose!=NULL)
             {
        
            echo '<td style="width:10%;">'  .$areasec->nombrearea. '</td>';
            }

            if($nose==NULL)
             {
            
            echo '<td> - </td>';
            }


 if($r->estadotramite=='T') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/alert.png"><br>Tramitando</td>';  }
            
 if($r->estadotramite=='D') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/check.png"><br>Derivado</td>';  }

 if($r->estadotramite=='ED') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/esperandodocumento.png"><br>Esperando Documentacion</td>';  }

 if($r->estadotramite=='O') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/observado.png"><br>Observado</td>';  }


 if($r->estadotramite=='F') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/finalizado.png"><br>Finalizado</td>';  }
            echo '<td>';



          if($permisocargo==$r->permiso || $permisocargo=='1' || $permisocargo=='0'){
           if($this->permission->checkPermission($this->session->userdata('permiso'),'eSeguimiento') && $r->estadotramite!='D' && $r->estadotramite!='F'  ){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/enviar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Enviar Seguimiento"><i class="icon-share-alt"><br>Derivar</i></a>'; 
            }
          }
        
          if($this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/visualizar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eject"><br>Abrir</i></a>'; 
            }

          
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/editar/'.$r->iditeraciondocumento.'" class="btn btn-info tip-top" title="Editar Iteracion"><i class="icon-pencil icon-white"><br>Editar</i></a>'; 
           
        } 
        
           
}




if($r->idareaactual==$datausuario[0]->idarea )
{


      echo '<tr>';
            echo '<td>'.$r->iditeraciondocumento.'</td>';
             echo '<td>'.mb_strimwidth($r->nombredocumento,0,20,'....').'</td>';
            echo '<td style="width:20%;">'.mb_strimwidth($r->nombretipotramite,0,30,'....').'</td>';
             echo '<td style="width:10%;">'.$r->nombresremitente.' '.$r->apellidopaternoremitente.' '.$r->apellidomaternoremitente.'</td>';
                  
             echo '<td style="width:10%;">'.$areaact->nombrearea.'</td>';

           
           if($nose!=NULL)
             {
        
            echo '<td style="width:10%;">'  .$areasec->nombrearea. '</td>';
            }

            if($nose==NULL)
             {
            
            echo '<td> - </td>';
            }


 if($r->estadotramite=='T') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/alert.png"><br>Tramitando</td>';  }
            
 if($r->estadotramite=='D') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/check.png"><br>Derivado</td>';  }

 if($r->estadotramite=='ED') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/esperandodocumento.png"><br>Esperando Documentacion</td>';  }

 if($r->estadotramite=='O') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/observado.png"><br>Observado</td>';  }


 if($r->estadotramite=='F') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/finalizado.png"><br>Finalizado</td>';  }
            echo '<td>';



          if($permisocargo==$r->permiso || $permisocargo=='1' || $permisocargo=='0' ){
           if($this->permission->checkPermission($this->session->userdata('permiso'),'eSeguimiento')  && $r->estadotramite!='D' && $r->estadotramite!='F'){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/enviar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Enviar Seguimiento"><i class="icon-share-alt"><br>Derivar</i></a>'; 
            }
          }
        
          if($this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/visualizar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eject"><br>Abrir</i></a>'; 
            }

          
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 20%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/editar/'.$r->iditeraciondocumento.'" class="btn btn-info tip-top" title="Editar Iteracion"><i class="icon-pencil icon-white"><br>Editar</i></a>'; 
           
        }  
      }

    }




if($r->idareaactual!=$datausuario[0]->idarea && $datausuario[0]->idarea=='2')
          {

                echo '<tr>';
            echo '<td>'.$r->iditeraciondocumento.'</td>';
             echo '<td>'.mb_strimwidth($r->nombredocumento,0,20,'....').'</td>';
            echo '<td style="width:20%;">'.mb_strimwidth($r->nombretipotramite,0,30,'....').'</td>';
             echo '<td style="width:10%;">'.$r->nombresremitente.' '.$r->apellidopaternoremitente.' '.$r->apellidomaternoremitente.'</td>';
                  
             echo '<td style="width:10%;">'.$areaact->nombrearea.'</td>';

           
           if($nose!=NULL)
             {
        
            echo '<td style="width:10%;">'  .$areasec->nombrearea. '</td>';
            }

            if($nose==NULL)
             {
            
            echo '<td> - </td>';
            }

 if($r->estadotramite=='T') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/alert.png"><br>Tramitando</td>';  }
            
 if($r->estadotramite=='D') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/check.png"><br>Derivado</td>';  }

 if($r->estadotramite=='ED') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/esperandodocumento.png"><br>Esperando Documentacion</td>';  }

 if($r->estadotramite=='O') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/observado.png"><br>Observado</td>';  }


 if($r->estadotramite=='F') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/finalizado.png"><br>Finalizado</td>';  }
            echo '<td>';

          if($permisoenvio==0){ 
          if($usuarioarea==$r->idareaactual ){
           if($this->permission->checkPermission($this->session->userdata('permiso'),'eSeguimiento')  && $r->estadotramite!='D' && $r->estadotramite!='F' ){
                echo '<a style="margin-right: 2%; width: 25%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/enviar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Enviar Seguimiento"><i class="icon-share-alt"><br>Derivar</i></a>'; 
            }
          }
        }
          if($this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 25%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/visualizar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eject"><br>Abrir</i></a>'; 
            }
            if($usuarioarea==0 || $usuarioarea==1)
            {
if($permisocargo==1 || $permisocargo==0 ){      

            if($this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
                echo '<a style="mmargin-right: 2%; width: 25%; display: inline-block;" href="'.base_url().'index.php/iteraciondocumento/editar/'.$r->iditeraciondocumento.'" class="btn btn-info tip-top" title="Editar Iteracion"><i class="icon-pencil icon-white"><br>Editar</i></a>'; 
            }
         }
    }
}




 if($r->idareaactual==$datausuario[0]->idarea && $datausuario[0]->idarea!='0' && $datausuario[0]->idarea!='1' && $datausuario[0]->idarea!='2' )
          {
                echo '<tr>';
            echo '<td>'.$r->iditeraciondocumento.'</td>';
             echo '<td>'.mb_strimwidth($r->nombredocumento,0,20,'....').'</td>';
            echo '<td style="width:20%;">'.mb_strimwidth($r->nombretipotramite,0,30,'....').'</td>';
             echo '<td style="width:10%;">'.$r->nombresremitente.' '.$r->apellidopaternoremitente.' '.$r->apellidomaternoremitente.'</td>';
                  
             echo '<td style="width:10%;">'.$areaact->nombrearea.'</td>';

           
           if($nose!=NULL)
             {
        
            echo '<td style="width:10%;">'  .$areasec->nombrearea. '</td>';
            }

            if($nose==NULL)
             {
            
            echo '<td> - </td>';
            }


 if($r->estadotramite=='T') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/alert.png"><br>Tramitando</td>';  }
            
 if($r->estadotramite=='D') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/check.png"><br>Derivado</td>';  }

 if($r->estadotramite=='ED') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/esperandodocumento.png"><br>Esperando Documentacion</td>';  }

 if($r->estadotramite=='O') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/observado.png"><br>Observado</td>';  }


 if($r->estadotramite=='F') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/finalizado.png"><br>Finalizado</td>';  }
            echo '<td>';

            if($usuarioarea==$r->idareaactual && $areasec ==null && $r->permiso== $permisocargo  && $r->estadotramite!='D' && $r->estadotramite!='F'){
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eSeguimiento') ){
                echo '<a style="margin-right: 2%; width: 25%;" href="'.base_url().'index.php/iteraciondocumento/enviar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Enviar Seguimiento"><i class="icon-share-alt"><br>Derivar</i></a>'; 
            }
          }
            if($this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 25%;" href="'.base_url().'index.php/iteraciondocumento/visualizar/'.$r->iditeraciondocumento.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eject"><br>Abrir</i></a>'; 
            }
            if($usuarioarea==0 || $usuarioarea==1)
            {
          if($permisocargo==1 || $permisocargo==0 ){
            if($this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
                echo '<a style="margin-right: 2%; width: 25%;" href="'.base_url().'index.php/iteraciondocumento/editar/'.$r->iditeraciondocumento.'" class="btn btn-info tip-top" title="Editar Iteracion"><i class="icon-pencil icon-white"><br>Editar</i></a>'; 
            }
          }
            
        }
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

 <div class="span5">
            <input type="text" name="nombredoc"  id="nombredoc"  placeholder="Escriba el nombre del documento para buscar" class="span12" value="<?php echo $this->input->get('nombredoc'); ?>" >        
        </div>
        <div class="span3">
            <input type="text" name="dniremiten"  id="dniremiten"  placeholder="Escriba el dni del remitente para buscar" class="span12" value="<?php echo $this->input->get('dnisolicitan'); ?>">
        </div>
        <div class="span1">
            <button class="span12 btn"> <i class="icon-search"></i> </button>
        </div>



<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/iteraciondocumento/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Venta</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="iditeraciondocumento" name="id" value="" />
    <h5 style="text-align: center">Desea realmente eliminar esta Venta?</h5>
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
        
        var iteraciondocumento = $(this).attr('iteraciondocumento');
        $('#iditeraciondocumento').val(iteraciondocumento);

    });

});

</script>