<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
      <link rel="stylesheet" href="<?=base_url()?>assets/css/citas/estilos.css" />
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/pepper-grinder/jquery-ui.css" />
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>   
      <script type="text/javascript" src="<?=base_url()?>assets/js/citas/funciones.js"></script>

    <?=$calendario?>
    <input type="hidden" value="<?=$this->uri->segment(3)?>" class="year" />
    <input type="hidden" value="<?=$this->uri->segment(4)?>" class="month" />
    <div id="midiv"></div>
	</br>
	</br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>