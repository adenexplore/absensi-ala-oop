<div class="modal fade" id="tambahRayon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rayon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Rayon</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Rayon" name="rayon" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='tambahRayon' class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>