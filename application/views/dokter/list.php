<table class="table table-hover">
    <thead>
      <tr class="table-active">
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Telepon</th>
        <th scope="col">Spesialis</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($list_dokter as $row){ ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $row->iddokter; ?></td>
        <td><?php echo $row->namadokter; ?></td>
        <td><?php echo $row->telepon; ?></td>
        <td><?php echo $row->spesialis; ?></td>
        <td><?php echo anchor("dokter/index/".$row->iddokter,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
        
        <?php echo anchor("dokter/delete/".$row->iddokter,'<button type="button" class="btn btn-danger">Delete</button>'); ?></td>
      </tr>
    </tbody>
    <?php $no++; }?>
  </table>