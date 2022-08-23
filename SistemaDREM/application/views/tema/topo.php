
<!DOCTYPE html>
<html lang="en">
<head>
<title>DREMAPURIMAC STD</title>
<link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/dremlogo.ico" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" /> 

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>

</head>
<body>



<!--Header-part-->
<div id="header" style="background-image: url('<?php echo base_url(); ?>/assets/img/drembanner.jpg'); height:75px; background-repeat: no-repeat; background-size: 60% 75px; object-fit: fill; background-color: #8E000E;">

  <h1><a href="">DREMAPURIMAC STD</a></h1>

</div>


<!--close-Header-part--> 

<!--top-Header-menu-->


<!--start-top-serch-->
<div id="search">
  <ul class="nav">
    <br>
 <li class="bla" style="background:#e8e8e8;">  <a title="" href="<?php echo base_url();?>index.php/mapos/sair"><i class="icon icon-share-alt" style="color:#000000;"></i> <span class="text" style="color:#000000;">Salir del Sistema</span></a></li>
   </ul>
</div>
 <!--
<div id="search">
  <form action="<?php echo base_url()?>index.php/mapos/pesquisar">
    <input type="text" name="termo" placeholder="Buscar..."/>
    <button type="submit"  class="tip-bottom" title="Buscar"><i class="icon-search icon-white"></i></button>
    
  </form>
</div>
-->

<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i> Menu</a>
  <ul>

    <div class="container" style="  width:100px; margin-top: 20px; border: 5px solid #850f0f;">
      <?php $datausuario =$this->session->userdata('id');

$this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('idUsuarios',$datausuario);
      $datauser=  $this->db->get()->result();
      ?>
 <img src="<?php echo $datauser[0]->fotoperfil; ?>" width="600px" height="300px" />

</div>

<span  style="text-align: center;">
  <?php 
      $nombrecompleto =  ucfirst($datauser[0]->nombres).' '. ucfirst($datauser[0]->apellidopaterno).' '.ucfirst($datauser[0]->apellidomaterno);
   echo  $nombrecompleto;


  ?>
</span>


<?php


// $query=$this->db->select('*');
  //      $this->db->from('usuarios');
    //$datausuario=  $this->db->where('idUsuarios',$this->session->userdata('id'));


       // echo $datausuario->nombres;
?>
<br>
     <li class="" style="margin-top: 10px;"><a href="<?php echo base_url();?>index.php/mapos/miCuenta"><i class="icon icon-star"></i> <span>Mi cuenta</span></a></li>

    <li class="<?php if(isset($menuPainel)){echo 'active';};?>"><a href="<?php echo base_url()?>"><i class="icon icon-home"></i> <span>Ventana Principal</span></a></li>
    
    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'vArea')){ ?>
        <li class="<?php if(isset($menuarea)){echo 'active';};?>"><a href="<?php echo base_url()?>index.php/area"><i class="icon-sitemap"></i> <span>Area</span></a></li>
    <?php } ?>
    
    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'vTipotramite')){ ?>
        <li class="<?php if(isset($menutipotramite)){echo 'active';};?>"><a href="<?php echo base_url()?>index.php/tipotramite"><i class="icon icon-paste"></i> <span>Tipo de Tramite</span></a></li>
    <?php } ?>
    
    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'vDocumento')){ ?>
        <li class="<?php if(isset($menudocumentos)){echo 'active';};?>"><a href="<?php echo base_url()?>index.php/documentos"><i class="icon icon-file-alt"></i> <span>Documentos</span></a></li>
    <?php } ?>

  

    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){ ?>
        <li class="<?php if(isset($menuiteraciondocumento)){echo 'active';};?>"><a href="<?php echo base_url()?>index.php/iteraciondocumento"><i class="icon icon-retweet"></i> <span>Iteración Documento</span></a></li>
    <?php } ?>
   

  <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'vsecuenciatramite')){ ?>
        <li class="<?php if(isset($menusecuenciatramite)){echo 'active';};?>"><a href="<?php echo base_url()?>index.php/secuenciatramite"><i class="icon icon-list-ol"></i> <span>Secuencia Tramite</span></a></li>
    <?php } ?>
   

 

    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'rArea') || $this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite') || $this->permission->checkPermission($this->session->userdata('permiso'),'rDocumento') || $this->permission->checkPermission($this->session->userdata('permiso'),'riteraciondocumento')){ ?>
        
        <li class="submenu <?php if(isset($menuRelatorios)){echo 'active open';};?>" >
          <a href="#"><i class="icon icon-list-alt"></i> <span>Reportes</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
          <ul>

            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'rArea')){ ?>
                <li><a href="<?php echo base_url()?>index.php/relatorios/area">Area</a></li>
            <?php } ?>
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite')){ ?>
                <li><a href="<?php echo base_url()?>index.php/relatorios/tipotramite">Tipo de Tramite</a></li>
            <?php } ?>
            
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'rDocumento')){ ?>
                <li><a href="<?php echo base_url()?>index.php/relatorios/documentos">Documentos</a></li>
            <?php } ?>
            
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'riteraciondocumento')){ ?>
                <li><a href="<?php echo base_url()?>index.php/relatorios/iteraciondocumento">Iteracion Documentos</a></li>
            <?php } ?>
            
           
          </ul>
        </li>

    <?php } ?>

    <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'cUsuario')  || $this->permission->checkPermission($this->session->userdata('permiso'),'cEmitente') || $this->permission->checkPermission($this->session->userdata('permiso'),'cpermiso') || $this->permission->checkPermission($this->session->userdata('permiso'),'cBackup')){ ?>
        <li class="submenu <?php if(isset($menuConfiguracoes)){echo 'active open';};?>">
          <a href="#"><i class="icon icon-cog"></i> <span>Configuraciones</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
          <ul>
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'cUsuario')){ ?>
                <li><a href="<?php echo base_url()?>index.php/usuarios">Usuarios</a></li>
            <?php } ?>
            <!--<?php if($this->permission->checkPermission($this->session->userdata('permiso'),'cEmitente')){ ?>
                <li><a href="<?php echo base_url()?>index.php/mapos/emitente">Empresa</a></li>
            <?php } ?>-->
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'cpermiso')){ ?>
                <li><a href="<?php echo base_url()?>index.php/permisos">Permisos</a></li>
            <?php } ?>
            <?php if($this->permission->checkPermission($this->session->userdata('permiso'),'cBackup')){ ?>
                <li><a href="<?php echo base_url()?>index.php/mapos/backup">Backup</a></li>
            <?php } ?>
 
          </ul>
        </li>
    <?php } ?>
    
    
  </ul>
</div>
<br>
    <br>
<div id="content">
  <div id="content-header">

    <div id="breadcrumb"> <a href="<?php echo base_url()?>" title="DreamApurimac" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <?php if($this->uri->segment(1) != null){?><a href="<?php echo base_url().'index.php/'.$this->uri->segment(1)?>" class="tip-bottom" title="<?php echo ucfirst($this->uri->segment(1));?>"><?php echo ucfirst($this->uri->segment(1));?></a> <?php if($this->uri->segment(2) != null){?><a href="<?php echo base_url().'index.php/'.$this->uri->segment(1).'/'.$this->uri->segment(2) ?>" class="current tip-bottom" title="<?php echo ucfirst($this->uri->segment(2)); ?>"><?php echo ucfirst($this->uri->segment(2));} ?></a> <?php }?></div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
          <?php if($this->session->flashdata('error') != null){?>
                            <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php echo $this->session->flashdata('error');?>
                           </div>
                      <?php }?>

                      <?php if($this->session->flashdata('success') != null){?>
                            <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php echo $this->session->flashdata('success');?>
                           </div>
                      <?php }?>
                          
                      <?php if(isset($view)){echo $this->load->view($view);}?>


      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 &copy; Sistema Drem de Tramite Documentario </div>
</div>
<!--end-Footer-part-->


<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.js"></script> 


</body>
</html>







