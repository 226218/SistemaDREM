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



      <div class="container-fluid">
    
          <div class="row-fluid">
              <div class="span12">

                  <div class="widget-box">
                      <div class="widget-title">
                          <h4 style="text-align: center">area</h4>
                      </div>
                      <div class="widget-content nopadding">

                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th style="font-size: 1.2em; padding: 5px;">Nombre</th>
                              <th style="font-size: 1.2em; padding: 5px;">DNI/NIE/NIF</th>
                              <th style="font-size: 1.2em; padding: 5px;">Teléfono</th>
                              <th style="font-size: 1.2em; padding: 5px;">Email</th>
                              <th style="font-size: 1.2em; padding: 5px;">Registrado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($area as $c) {
                              $fechaCreacion = date('d/m/Y', strtotime($c->fechaCreacion));
                              echo '<tr>';
                              echo '<td>' . $c->nomeArea . '</td>';
                              echo '<td>' . $c->documento . '</td>';
                              echo '<td>' . $c->telefono . '</td>';
                              echo '<td>' . $c->email . '</td>';
                              echo '<td>' . $fechaCreacion . '</td>';
                              echo '</tr>';
                          }
                          ?>
                      </tbody>
                  </table>
                  
                  </div>
                   
              </div>
                  <h5 style="text-align: right">Fecha del reporte: <?php echo date('d/m/Y');?></h5>

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







