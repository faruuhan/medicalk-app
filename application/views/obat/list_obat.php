<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Add New Obat
</button>

<!-- Button trigger modal -->
<button type="button" id="reload" class="btn btn-primary">Reload</button>

<hr>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id Obat</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Expired</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id Obat</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Expired</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

<script>
$(document).ready(function(){
    var table = $('#example').DataTable({
        "ajax": "<?php echo site_url('obat/listobat'); ?>",
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button type='button' class='btn btn-danger'>Delete</button>"
        } ]
    });
    
    $('#example tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $.ajax({
              type: 'POST',
              url: '<?php echo site_url('obat/Delete'); ?>',
              data: {data},
              dataType: 'json',
              beforeSend:function(){
                  
              },success:function(res){
                  alert(res.data.messages);
                  
                  if(res.data.status)
                        table.ajax.reload();
              }
        });
    } );
    
    $('#reload').click(function(){
        table.ajax.reload();
    });
    
    $("#proses").click(function(){
		 $.ajax({
			 url:'<?php echo site_url('obat/submit'); ?>',
			 type:'POST',
			 data:$("#obat_form").serialize(),
			 dataType:'json',
			 beforeSend:function(){
				 $("#proses").attr("disabled", "disabled");
				 $('#proses').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
			 },
			 success:function(res){
				 $('#proses').html('Save');
				 $("#proses").removeAttr('disabled');
				 alert(res.messages);
				 if(res.status){
				     $('input[name=namaobat]').val('');
				     table.ajax.reload();
				     $('#exampleModalScrollable').modal('toggle');
				 }
			 }
		 });
	 });
});
</script>

<?php $this->load->view('obat/form_obat'); ?>