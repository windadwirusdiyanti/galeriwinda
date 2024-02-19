<!-- judul (card) -->
<div class="container-fluid mt-4">
    <h2 class="text-center">Data Album</h2>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="bi bi-plus-circle"></i> + Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Welcome/AlbumInsert'); ?>" method="POST">
                            <input name="album_id" type="hidden">
                        <div class="mb-3">
                            <label for="nama_album" class="form-label">Nama Album</label>
                            <input name="nama_album" type="text" class="form-control" id="test">

                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"
                                required></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">AlbumID</th>
                    <th scope="col">Nama Album</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($DataAlbum)) {
                    $no = 1;
                    foreach ($DataAlbum as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->album_id; ?></td>
                    <td><?php echo $ReadDS->nama_album; ?></td>
                    <td><?php echo $ReadDS->deskripsi; ?></td>
                    <td><?php echo $ReadDS->tanggal_dibuat; ?></td>
                    <td><?php echo $ReadDS->user_id; ?></td>
                    <td>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
    data-target="#exampleModal_<?php echo $ReadDS->album_id; ?>"> Update</button>
<a type="button" class="btn btn-danger btn-sm"
    href="<?php echo site_url('Welcome/AlbumDelete/' . $ReadDS->album_id); ?>"
    onclick="return confirm('are you sure?')">Delete</a>


<div class="modal fade" id="exampleModal_<?php echo $ReadDS->album_id; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Konten modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Welcome/AlbumUpdate/' . $ReadDS->album_id) ?>" method="post">
                    <label for="album_id" class="form-label">AlbumID</label>
                    <input type="hidden" class="form-control" id="album_id" name="album_id"
                        value="<?= $ReadDS->album_id; ?>" readonly>
                    <div class="mb-3">
                        <label for="nama_album" class="form-label">Nama Album</label>
                        <input type="text" class="form-control" id="nama_album" name="nama_album"
                            value="<?= $ReadDS->nama_album; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30"
                            rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                        <input type="date" class="form-control" id="tanggal_dibuat"
                            name="tanggal_dibuat" value="<?= $ReadDS->tanggal_dibuat; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input name="user_id" type="text" class="form-control" id="user_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- Akhir formulir -->
            </div>
        </div>
    </div>
    <!-- Akhir konten modal -->
</div>

                        </div>
                        <!-- Akhir Modal Edit -->
                        
                        
                    </td>
                        
                </tr>
                <?php
                        $no++;
                    }
                }
                ?>
            </tbody>

        </table>