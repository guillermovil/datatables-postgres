<html>
<title>Comprobantes a vincular</title>
<link rel='stylesheet' type='text/css' href='media/css/jquery.dataTables.css'>
<script type='text/javascript' language='javascript' src='media/js/jquery.js'></script>
<script type='text/javascript' language='javascript' src='media/js/jquery.dataTables.js'></script>
<script type='text/javascript' language='javascript'>
$(document).ready(function() {
	var table = $('#example').DataTable({
		'processing': true,
		'paging': true,
		'pagingType': 'full_numbers', //full
		'serverSide': true,
		'language': {  
		   'url': 'media/js/language.spanish.json'  
		 },            
		'ajax': 'ejemplo_fact_process.php',
		columnDefs: [
			{ width: 50, targets: [0, 1] },
			{ width: 50, targets: [-1, -2]}			
		]			
	}); 
});

</script>
	<center><b><font size='+1' color='red'>Comprobantes del mes sin facturar</font></b></center>
	<table id="example" class="display" cellspacing="0" width="100%">
	 <thead>
		<tr>
		  <th>Comprobante</th>
		  <th>Fecha</th>
		  <th>Apellido</th>
		  <th>Nombre</th>
		  <th>DNI</th>
		  <th>Clave</th>
		</tr>
	 </thead>
	</table>    
</html>
