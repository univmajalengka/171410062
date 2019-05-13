<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-10">

            <?= form_error('judul', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('pengarang', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('penerbit', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('tahun', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('isbn', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('jumlah', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('rak', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('input', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBukuModal">Tambah Buku</a>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Jumlah Buku</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $b['judul']; ?></td>
                            <td><?= $b['pengarang']; ?></td>
                            <td><?= $b['penerbit']; ?></td>
                            <td><?= $b['tahun_terbit']; ?></td>
                            <td><?= $b['isbn']; ?></td>
                            <td><?= $b['jumlah_buku']; ?></td>
                            <td><a href="" class="badge badge-success">edit</a></td>
                            <td><a href="" class="badge badge-danger">hapus</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" role="dialog" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/buku'); ?> " method="post">
                <div class="modal-body ">
                    <div class="form-group ">

                        <input type="text" class="form-control mb-3" id="judul" name="judul" placeholder="Judul buku">
                        <input type="text" class="form-control mb-3" id="pengarang" name="pengarang" placeholder="Pengarang">
                        <input type="text" class="form-control mb-3" id="penerbit" name="penerbit" placeholder="Penerbit">
                        <input type="text" class="form-control mb-3" id="tahun" name="tahun" placeholder="Tahun terbit">
                        <input type="text" class="form-control mb-3" id="isbn" name="isbn" placeholder="ISBN">
                        <input type="text" class="form-control mb-3" id="jumlah" name="jumlah" placeholder="Jumlah buku">
                        <select class="form-control mb-3" id="rak" name="rak" placeholder="Rak buku">
                            <option value="rak1">Rak1</option>
                            <option value="rak2">Rak2</option>
                            <option value="rak3">Rak3</option>
                        </select>
                        <input type="date" class="form-control mb-3" id="input" name="input" placeholder="Tanggal input">


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>