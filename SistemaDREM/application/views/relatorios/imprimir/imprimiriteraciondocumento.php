  <head>
    <title>RMA O.S</title>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/blue.css" class="skin-color" />
    <script type="text/javascript"  src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

  <body style="background-color: transparent">

<?php


$this->load->model('Relatorios_model');

$iddelusuario=$this->session->userdata('id');

    $query = $this->db->query("SELECT * FROM usuarios WHERE idUsuarios='".$iddelusuario."'");
$result1 = $query->result_array();

 


 $query1 = $this->db->query("SELECT * FROM area WHERE idarea='".$result1[0]['idarea']."'");
$result2 = $query1->result_array();





?>


      <div class="container-fluid">

          <div class="row-fluid">
              <div class="span12">

                  <div class="widget-box">
                      <div class="widget-title">
                          <img src="<?php echo base_url()?>assets/img/dremlogo.jpg" alt="Logo" width="100" height="100"  style="margin:0; display: inline-block;
    float: left;
"/>
                         <h4 style="text-align: center">Sistema DREM REPORTES <br>REPORTE DE Iteracion Documento <br>REPORTE GENERADO POR <?php echo $result2[0]['nombrearea']; ?> </h4>
                         
                          
                      </div>
                      <div class="widget-content nopadding">

                  <table class="table table-bordered">
                      <thead>
                          <tr>
                            <th style="font-size: 1.2em; padding: 5px;">#ID</th>
                              <th style="font-size: 1.2em; padding: 5px;">Documento</th>
                              <th style="font-size: 1.2em; padding: 5px;">Estado</th>
                              <th style="font-size: 1.2em; padding: 5px;">Area Actual</th>
                              <th style="font-size: 1.2em; padding: 5px;">Area Siguiente</th>
                              <th style="font-size: 1.2em; padding: 5px;">Aprobado por</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($iteraciondocumento as $p) {
$valconsareasig='';

 $query2 = $this->db->query("SELECT * FROM documentos WHERE iddocumento='".$p->iddocumento."'");
$result3 = $query2->result_array();



 $query3 = $this->db->query("SELECT * FROM tipotramite WHERE idtipotramite='".$result3[0]['tipotramite_id']."'");
$result4 = $query3->result_array();


 $consareaact = $this->db->query("SELECT * FROM area WHERE idarea='".$p->idareaactual."'");
$valconsareaact = $consareaact->result_array();


if($p->idareasiguiente!=null)
{
 $consareasig = $this->db->query("SELECT * FROM area WHERE idarea='".$p->idareasiguiente."'");

$valconsareasig1 = $consareasig->result_array();
$valconsareasig=$valconsareasig1[0]['nombrearea'];
}
if($p->idareasiguiente==null)
{
$valconsareasig='-';
}




//NOMBRE DNI

$dni=$p->dniaprobacion;

$CI =& get_instance();
$CI->load->library('encrypt');



$cantidad=$this->db->count_all('usuarios');
$desencriptado='0';
    
for($i = 0;$i<=$cantidad;$i++)
{
$query = $this->db->query("SELECT dni FROM usuarios where idUsuarios = ".$i." LIMIT 1");
$row = $query->row();

 @$dniencrip= $CI->encrypt->sha1(($row->dni));

if($dni==$dniencrip)
{
@$desencriptado=$row->dni;
}
else{


}


}

$nombrecompleto='';

if($desencriptado!='0')
{
  $consnombreapeapro = $this->db->query("SELECT * FROM usuarios WHERE dni='".$desencriptado."'");
  $nombreapeapro = $consnombreapeapro->result_array();
  $nombrecompleto= $nombreapeapro[0]['nombres'].' '.$nombreapeapro[0]['apellidopaterno'].' '.$nombreapeapro[0]['apellidomaterno'];
}











                              echo '<tr>';
                               echo '<td>' . $p->iditeraciondocumento . '</td>';
                               echo '<td> <b>Nombre Documento:</b> '.$result3[0]['nombredocumento']. '<br><b>Tipo de Documento: </b>' .$result4[0]['nombretipotramite']. '<br><b>Descripcion: </b>' .mb_strimwidth($result3[0]['descripciondocumento'],0,100,'....'). '</td>';
 if($p->estadotramite=='T') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/alert.png"><br>Tramitando</td>';  }
            
 if($p->estadotramite=='D') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/check.png"><br>Derivado</td>';  }

 if($p->estadotramite=='ED') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/esperandodocumento.png"><br>Esperando Documentacion</td>';  }

 if($p->estadotramite=='O') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/observado.png"><br>Observado</td>';  }


 if($p->estadotramite=='F') { echo '<td width="50"> <img width="100" height="50" src="'.base_url().'assets/img/finalizado.png"><br>Finalizado</td>';  }

                              echo '<td>' . $valconsareaact[0]['nombrearea'] . '</td>';
                              echo '<td>' . $valconsareasig. '</td>';
                              echo '<td>' . $nombrecompleto. '</td>';
                              

                              echo '</tr>';
                          }
                          ?>
                      </tbody>
                  </table>

                  </div>

              </div>
               <h5 style="text-align: right">Fecha del reporte: <?php echo date('H:i:s d/m/Y',strtotime('-7 hours')) ;?></h5>

          </div>



      </div>
</div>




            <!-- Arquivos js-->

            <script src="<?php echo base_url();?>js/excanvas.min.js"></script>
            <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.flot.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.flot.resize.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.peity.min.js"></script>
            <script src="<?php echo base_url();?>js/fullcalendar.min.js"></script>
            <script src="<?php echo base_url();?>js/sosmc.js"></script>
            <script src="<?php echo base_url();?>js/dashboard.js"></script>
  </body>
</html>







