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
                         <h4 style="text-align: center">Sistema DREM REPORTES <br>REPORTE DE AREA <br>REPORTE GENERADO POR <?php echo $result2[0]['nombrearea']; ?></h4>
                          <h4 style="text-align: center"></h4>
                      </div>
                      <div class="widget-content nopadding">

                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th style="font-size: 1.2em; padding: 5px;">ID Área </th>
                              <th style="font-size: 1.2em; padding: 5px;">Nombre del Área</th>
                              <th style="font-size: 1.2em; padding: 5px;">Descripcion del Área</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                     
                          foreach ($area as $p) {
                              echo '<tr>';
                              echo '<td>' .$p->idarea. '</td>';
                              echo '<td>' .$p->nombrearea. '</td>';
                              echo '<td>'.$p->descripcionarea . '</td>';
                              echo '</tr>';
                          }
                          ?>
                      </tbody>
                  </table>

                  </div>

              </div>
                  <h5 style="text-align: right">Fecha del reporte: <?php
      echo date('H:i:s d/m/Y',strtotime('-7 hours')) ;?></h5>

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

