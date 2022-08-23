<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url();?>index.php/permisos/adicionar" id="formpermiso" method="post">

    <div class="span12" style="margin-left: 0">
        
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-lock"></i>
                </span>
                <h5>Registrar Permisos</h5>
            </div>
            <div class="widget-content">
                
                <div class="span6">
                    <label>Nombre del Permiso</label>
                    <input name="cargo" type="text" id="cargo" class="span12" />

                </div>
                <div class="span6">
                    <br/>
                    <label>
                        <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                        <span class="lbl"> Marcar Todos</span>

                    </label>
                    <br/>
                </div>

                <div class="control-group">
                    <label for="documento" class="control-label"></label>
                    <div class="controls">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vArea" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Area</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="dArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Area</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vTipotramite" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Tipo de Tramite</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vDocumento" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Documento</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input name="viteraciondocumento" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aiteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eiteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="diteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Iteracion de Documento</span>
                                        </label>
                                    </td>
                                 
                                </tr>


                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vsecuenciatramite" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="asecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="esecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dsecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Secuencia de Tramite</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                               <tr><td colspan="4"></td></tr>     
                                
                                     <tr>

                                    <td>
                                        <label>
                                            <input name="eSeguimiento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Enviar Seguimiento</span>
                                        </label>
                                    </td>

                                 
                                </tr>

                                
                               

                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="rArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Documentos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Tipo de Tramites</span>
                                        </label>
                                    </td>
                                   <td>
                                        <label>
                                            <input name="riteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Seguimiento de Documento</span>
                                        </label>
                                    </td>
                                </tr>


  <tr><td colspan="4"></td></tr>
                              

                              

                                <tr>

                                    <td>
                                        <label>
                                            <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Usuario</span>
                                        </label>
                                    </td>


                                    <td>
                                        <label>
                                            <input name="cpermiso" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Permisos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Backup</span>
                                        </label>
                                    </td>
                                 
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>

              
    
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                        <a href="<?php echo base_url() ?>index.php/permisos" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
           
            </div>
        </div>

                   
    </div>

</form>

</div>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

          $("#marcarTodos").click(function(){

           $('input:checkbox').not(this).prop('checked', this.checked);
        });   
       

 
    $("#formpermiso").validate({
        rules :{
            cargo: {required: true}
        },
        messages:{
            cargo: {required: 'Campo Obligatorio'}
        }
    });     

        

    });
</script>
