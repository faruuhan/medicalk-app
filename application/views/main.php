 <!DOCTYPE html>
<html lang="en">
<head>
  <title>My Web</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-4.2.1-dist/css/bootstrap.litera.min.css">
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/DataTables/datatables.min.css"/>
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/DataTables/datatables.min.js"></script>
</head>
<body>
<?php $this->load->view('menu'); ?><br>
<div class="container">
<div class="card bg-light">
  <div class="card-header"><?php echo $this->uri->segment(1); ?></div>
  <div class="card-body">
    	<?php $this->load->view($page); ?>
  </div>
</div>

</div>
</body>
</html> 