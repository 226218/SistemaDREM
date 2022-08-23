  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_ls span3"> <a href="<?php echo base_url()?>index.php/conecte/compras"><i class="icon-shopping-cart"></i> Compras</a></li>
      <li class="bg_lg span3"> <a href="<?php echo base_url()?>index.php/conecte/conta"><i class="icon-star"></i> Mi Cuenta</a></li>
    </ul>
  </div>
 

  <div class="span12" style="margin-left: 0">
      

      <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Últimas Compras</h5></div>
          <div class="widget-content">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Fecha de Venta</th>
                          <th>Responsable</th>
                          <th>Facturado</th>
                          <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      if($compras != null){
                          foreach ($compras as $p) {
                              if($p->faturado == 1){$faturado = 'Si';} else{$faturado = 'No';}
                              echo '<tr>';
                              echo '<td>'.$p->iditeraciondocumento.'</td>';
                              echo '<td>'.date('d/m/Y',strtotime($p->dataiteraciondocumento)).'</td>';
                              echo '<td>'.$p->nombres.'</td>';
                              echo '<td>'.$faturado.'</td>';
                              echo '<td> <a href="'.base_url().'index.php/conecte/visualizarCompra/'.$p->iditeraciondocumento.'" class="btn"> <i class="icon-collapse-top" ></i> </a></td>';
                              echo '</tr>';
                          }
                      }
                      else{
                          echo '<tr><td colspan="5">Ninguna venta encontrada.</td></tr>';
                      }    

                      ?>
                  </tbody>
              </table>
          </div>
      </div>
    
  </div>
