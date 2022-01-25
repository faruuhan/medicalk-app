<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  
	  <form class="form-horizontal" id="obat_form" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url("obat/submit"); ?>">
      <div class="modal-body">
	  <input type="hidden" name="idobat">
        <div class="form-group">
    <label class="control-label col-sm-4">Nama Obat : </label>
    <div class="col-sm-12">
      <input type="text" class="form-control" placeholder="Nama Obat" name="namaobat">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4"> Harga : </label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  placeholder="Harga" name="harga">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4">Stok : </label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  placeholder="Stok" name="stok">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4">Expired : </label>
    <div class="col-sm-12">
      <input type="date" class="form-control"   name="expired">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4">Supplier : </label>
    <div class="col-sm-12">
      <select name="idvendor" class="form-control">
		<?php 
			foreach($vendor as $row){
				echo"<option value='".$row->idvendor."'>".
				$row->nama."</option>";
			}
		
		?>
	  </select>
    </div>
  </div>
  </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="proses" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
