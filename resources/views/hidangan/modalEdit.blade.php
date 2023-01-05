<div class="modal fade myModal" id="modalEditHidangan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Hidangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form name="form" class="myForm" method="post"
                    action="{{ route('dashboard.hidangan.update') }}" id="formEditHidangan"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @include('hidangan.formHidangan')
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id="id_hidangan"
                                    placeholder="Harga Hidangan" />
                                <input type="hidden" class="form-control" name="old_gambar_hidangan"
                                    id="old_gambar_hidangan" placeholder="Harga Hidangan" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group" id="image-area">

                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btnUpdateHidangan" class="btn btn-primary">Perbarui</button>
            </div>
            </form>
        </div>
    </div>
</div>
