<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('iklan.create')}}" id="createBarangTemuan" method="POST" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Iklan</h5>
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
                            <label for="paket">Paket</label>
                            <select name="paket" class="form-control" id="paket">
                                @foreach ($paket as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
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