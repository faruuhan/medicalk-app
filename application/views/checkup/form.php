<?php echo form_open('checkup/submit'); ?>
    <fieldset>
        <legend>Informasi Data Dokter</legend>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Dokter ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="dokter_id" value="<?php echo $this->session->userdata('userAlias'); ?>" readonly>
            </div>
        </div>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Nama Dokter</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="dokter_name" value="<?php echo $this->session->userdata('namaPengguna'); ?>" readonly>
            </div>
        </div>
       
    </fieldset>
   
    <fieldset>
        <legend>Informasi Data Pasien</legend>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Pasien Id</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" id="pasienid" name="pasienid" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#pasienModal">Browse</button>
                  </div>
                </div>
            </div>
        </div>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Nama Pasien</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="pasienName" name="pasienName">
            </div>
        </div>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="alamat" name="alamat">
            </div>
        </div>
    </fieldset>
   
    <fieldset>
        <legend>Information Checkup</legend>
        <div class="form-group row">           
            <label  class="col-sm-2 col-form-label">Tgl Checkup</label>
            <div class="col-sm-10">
                <input type="date"  class="form-control">
            </div>
        </div>
       
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Keluhan</label>
            <div class="col-sm-10">
                <textarea  class="form-control"></textarea>
            </div>
        </div>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Diagnosa</label>
            <div class="col-sm-10">
                <textarea  class="form-control"></textarea>
            </div>
        </div>
       
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Obat</label>
            <div class="col-sm-10">
                <div style="float:right;padding:10px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#obatModal">Add Item</button>
                    <button type="button" class="btn btn-secondary">Submit Data</button>
                </div>
               
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID OBAT</th>
                      <th scope="col">NAMA OBAT</th>
                      <th scope="col">QTY</th>
                      <th scope="col">SATUAN</th>
                      <th scope="col">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <th scope="row">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </th>
                            <td id="idobat">Mark</td>
                            <td id="namaobat">Mark</td>
                            <td id="qty">Mark</td>
                            <td id="satuan">Mark</td>
                            <td id="total">Mark</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>
   
<?php echo form_close(); ?>
 
 
 
<!-- Modal -->
<div class="modal fade" id="pasienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Pencarian Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                
            <?php foreach($pasien as $row){ ?>
                <tr>
                    <td><?php echo $row->idpasien; ?></td>
                    <td><?php echo $row->namapasien; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    
                    <td><button type="button" data-alamat="<?php echo $row->alamat; ?>" data-nama="<?php echo $row->namapasien; ?>"data-id="<?php echo $row->idpasien; ?>" class="btnSelect btn btn-primary">Select</button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="obatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Pencarian Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
            <thead>
                <tr>
                    <th>Id Obat</th>
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                
            <?php foreach($obat as $row){ ?>
                <tr>
                    <td><?php echo $row->idobat; ?></td>
                    <td><?php echo $row->namaobat; ?></td>
                    <td><?php echo $row->stok; ?></td>
                    <td><?php echo $row->harga; ?></td>
                    
                    <td><button type="button" data-idobat="<?php echo $row->idobat; ?>" data-namaobat="<?php echo $row->namaobat; ?>" data-stok="<?php echo $row->stok; ?>" data-harga="<?php echo $row->harga; ?>" class="btnSelect btn btn-primary">Select</button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        
        $('.btnSelect').click(function(){
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var alamat = $(this).data('alamat');
            
            $('#pasienid').val(id);
            $('#pasienName').val(nama);
            $('#alamat').val(alamat);
            
            $('#pasienModal').modal('toggle');

        });
    });
</script>