<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('barang.temuan.create')}}" id="createBarangTemuan" method="POST" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Temuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="no_polisi">No Polisi</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" required
                            placeholder="B6699DB">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required
                            placeholder="Jakarta Pusat">
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control" id="spesifikasi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input accept="image/*" type="file" name="foto" class="custom-file-input" id="foto" required>
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" >Tambah</button>
                </div>
            </form>
       </div>
    </div>
 </div>