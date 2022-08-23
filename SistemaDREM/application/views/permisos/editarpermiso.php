<?php $permisos = unserialize($result->permisos);?>
<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url();?>index.php/permisos/editar" id="formpermiso" method="post">

    <div class="span12" style="margin-left: 0">
        
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-lock"></i>
                </span>
                <h5>Editar Permisos</h5>
            </div>
            <div class="widget-content">
                
                <div class="span4">
                    <label>Nombre del Permiso</label>
                    <input name="cargo" type="text" id="cargo" class="span12" value="<?php echo $result->cargo;?>" />
                    <input type="hidden" name="idPermiso" value="<?php echo $result->idpermiso; ?>">

                </div>

                <div class="span3">
                    <label>Situación</label>
                    
                    <select name="estadopermiso" id="estadopermiso" class="span12">
                        <?php if($result->estadopermiso == 1){$sim = 'selected'; $nao ='';}else{$sim = ''; $nao ='selected';}?>
                        <option value="1" <?php echo $sim;?>>Activo</option>
                        <option value="0" <?php echo $nao;?>>Inactivo</option>
                    </select>

                </div>
                <div class="span4">
                    <br/>
                    <label>
                        <input name="" type="checkbox" value="1" id="marcarTodos" />
                        <span class="lbl"> Marcar Todos</span>
                
                    </label>
                    <br/>
                </div>
                <div class="control-group">
                    <label for="documento" class="control-label"></label>
                    <div class="controls">
                </div>
                </div>                               
                        <table class="table table-bordered">
                            <tbody>
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['vArea'])){ if($permisos['vArea'] == '1'){echo 'checked';}}?> name="vArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['aArea'])){ if($permisos['aArea'] == '1'){echo 'checked';}}?> name="aArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['eArea'])){ if($permisos['eArea'] == '1'){echo 'checked';}}?> name="eArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Area</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['dArea'])){ if($permisos['dArea'] == '1'){echo 'checked';}}?> name="dArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Area</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['vTipotramite'])){ if($permisos['vTipotramite'] == '1'){echo 'checked';}}?> name="vTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['aTipotramite'])){ if($permisos['aTipotramite'] == '1'){echo 'checked';}}?> name="aTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['eTipotramite'])){ if($permisos['eTipotramite'] == '1'){echo 'checked';}}?> name="eTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Tipo de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['dTipotramite'])){ if($permisos['dTipotramite'] == '1'){echo 'checked';}}?> name="dTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Tipo de Tramite</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['vDocumento'])){ if($permisos['vDocumento'] == '1'){echo 'checked';}}?> name="vDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['aDocumento'])){ if($permisos['aDocumento'] == '1'){echo 'checked';}}?> name="aDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['eDocumento'])){ if($permisos['eDocumento'] == '1'){echo 'checked';}}?> name="eDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['dDocumento'])){ if($permisos['dDocumento'] == '1'){echo 'checked';}}?> name="dDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Documento</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                              
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['viteraciondocumento'])){ if($permisos['viteraciondocumento'] == '1'){echo 'checked';}}?> name="viteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['aiteraciondocumento'])){ if($permisos['aiteraciondocumento'] == '1'){echo 'checked';}}?> name="aiteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['eiteraciondocumento'])){ if($permisos['eiteraciondocumento'] == '1'){echo 'checked';}}?> name="eiteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Iteracion de Documento</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['diteraciondocumento'])){ if($permisos['diteraciondocumento'] == '1'){echo 'checked';}}?> name="diteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Iteracion de Documento</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['vsecuenciatramite'])){ if($permisos['vsecuenciatramite'] == '1'){echo 'checked';}}?> name="vsecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['asecuenciatramite'])){ if($permisos['asecuenciatramite'] == '1'){echo 'checked';}}?> name="asecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['esecuenciatramite'])){ if($permisos['esecuenciatramite'] == '1'){echo 'checked';}}?> name="esecuenciatramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Secuencia de Tramite</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                             <input <?php if(isset($permisos['dsecuenciatramite'])){ if($permisos['dsecuenciatramite'] == '1'){echo 'checked';}}?> name="dsecuenciatramite" class="marcar" type="checkbox" value="1" />
                                           <span class="lbl"> Eliminar Secuencia de Tramite</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>
                               <tr>

                                    <td>
                                        
                                        <label>
                                            <input <?php if(isset($permisos['eSeguimiento'])){ if($permisos['eSeguimiento'] == '1'){echo 'checked';}}?> name="eSeguimiento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Enviar Seguimiento</span>
                                        </label>
                                    </td>

                                 
                                </tr>
                                
                            

                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['rArea'])){ if($permisos['rArea'] == '1'){echo 'checked';}}?> name="rArea" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Area</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['rDocumento'])){ if($permisos['rDocumento'] == '1'){echo 'checked';}}?> name="rDocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Documentos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['rTipotramite'])){ if($permisos['rTipotramite'] == '1'){echo 'checked';}}?> name="rTipotramite" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Tipo de Tramites</span>
                                        </label>
                                    </td>
                                     <td>
                                        <label>
                                            <input <?php if(isset($permisos['riteraciondocumento'])){ if($permisos['riteraciondocumento'] == '1'){echo 'checked';}}?> name="riteraciondocumento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> reporte de Seguimiento de Documento</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['cUsuario'])){ if($permisos['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Usuario</span>
                                        </label>
                                    </td>


                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['cpermiso'])){ if($permisos['cpermiso'] == '1'){echo 'checked';}}?> name="cpermiso" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Permisos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permisos['cBackup'])){ if($permisos['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="marcar" type="checkbox" value="1" />
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
                        <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
                        <a href="<?php echo base_url() ?>index.php/permisos" id="" class="btn"><i class="icon-arrow-left"></i> Volverr</a>
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
            nome: {required: true}
        },
        messages:{
            nome: {required: 'Campo obrigatório'}
        }
    });     

        

    });
</script>
