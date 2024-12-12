<?php
  $data 						= json_decode($_GET['data']);
  $rm 							= str_replace('"','', json_encode($data->rm));
  $unit     				= str_replace('"','', json_encode($data->unit));
  $id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
  $id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>

<script type="text/javascript">
var no_rm   				= "<?php echo $rm; ?>";
var id_unit   			= "<?php echo $unit; ?>";
var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
var id_transaksi   	= "<?php echo $id_transaksi; ?>";
var listperawat 		= [];

</script>