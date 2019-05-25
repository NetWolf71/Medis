<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
    <title><?php echo $title; ?></title>

    <style type="text/css">


    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    #body{
        margin: 0 15px 0 15px;
    }
    
    p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }
    
    #container{
        margin: 10px;
        border: 1px solid #D0D0D0;
        -webkit-box-shadow: 0 0 8px #D0D0D0;
    }
    /******************************************/
    .success{color: green; font-size:13px;} .error{color: red; font-size:13px;} 
    </style>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css');?>"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>" />
<script type="text/javascript" src="http://localhost/medis/assets/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="http://localhost/medis/assets/js/jquery-ui.js"></script> 
   
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker( "option", "dateFormat", 'dd/mm/yy');    // Le pasamos el formato de la fecha
    });
</script>
</head>
<body>
<div id="container">
  <h1></h1>

<?php echo form_open('CalendarioController/verify_date'); ?>
<p>Fecha:<input type="text" name="datepicker" value="" id="datepicker"></p>
<span>formato: DD/MM/YYYY</span>
 <?php echo form_submit('date','Verificar');?>
<?php echo form_close()?>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>