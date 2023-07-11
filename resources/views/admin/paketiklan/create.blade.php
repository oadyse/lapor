<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('paket-iklan.create')}}" id="createBarangTemuan" method="POST" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                            placeholder="Jakarta Pusat">
                        </div>
                        <div class="form-group">
                            <label for="periode">Periode (Hari)</label>
                            <input type="text" class="form-control" id="periode" name="periode" required
                            placeholder="30">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required
                            placeholder="30">
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