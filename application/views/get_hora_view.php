
<div class="container-fluid">
 <div class="formulario_citas">
    <?php $attr = array('name' => 'form_coger_cita', 'id' => 'form_coger_cita'); ?>     
        <?=form_open(base_url("index.php/calendario/nueva_cita"), $attr) ?>
            <h5>Cita para el <?=ucfirst($dia_escogido) ?> <?=$dia ?> de <?=$mes_escogido ?> de <?=$year ?></h5><br />
            <label>Desde</label>
            <select name="hora" id="desde_hora">
                <option value="">Selecciona una hora</option>
                <?php           
                foreach($info_dia as $fila)
                {
                    if($fila->estado == 'ocupado')
                    {
                    ?>
                            
                        <option disabled="disabled" value=<?=$fila->hora_cita ?>><?=$fila->hora_cita ?> - Reservada</option>
                            
                    <?php
                    }else{  
                    ?>
                        
                        <option value=<?=$fila->hora_cita ?>><?=$fila->hora_cita ?></option>
                            
                    <?php
                    }
                }
                ?>      
            </select><br /><br />              
                        
                        
            <label>Escribe un comentario</label>                
            <textarea cols="32" id="comentario" name="textarea" rows="4" maxlength="100"></textarea><br />
                                           
            <input type="hidden" name="dia_update" value="<?=$year ?>-<?=$month ?>-<?=$dia ?>" /><br />
                                        
            <input type="hidden" name="fecha_escogida" value="<?=ucfirst($dia_escogido) ?> <?=$dia ?> de <?=$mes_escogido ?> de <?=$year ?>" />                 
                                                        
           <?=form_close();?>
    </div>
    </div>