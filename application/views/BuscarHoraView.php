<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

        <?= form_open(base_url().'index.php/controllerComboBoxes/hacerAlgo'); ?>
            <select id="id_especialidad" name="id_especialidad">
                <option value="0">Especialidades</option>
                <?php 
                    foreach ($id_especialidad as $i) {
                        echo '<option value="'. $i->id_especialidad .'">'. $i->nombre .'</option>';
                    }
                ?>
            </select>
            <br/>
            <br/>
            <select id="id_pers" name="id_pers">
                <option value="0">Médicos</option>
            </select>
            <br/>
            <br/>
            <button>Aceptar</button>
        </form>
        
        <script type="text/javascript">   
            $(document).ready(function() {                       
                $("#id_especialidad").change(function() {
                    $("#id_especialidad option:selected").each(function() {
                        idEstado = $('#id_especialidad').val();
                        $.post("<?php echo base_url(); ?>index.php/ControllerComboBoxes/fillCiudades", {
                            id_especialidad : id_especialidad
                        }, function(data) {
                            $("#id_pers").html(data);
                        });
                    });
                });
            });
        </script>


<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>