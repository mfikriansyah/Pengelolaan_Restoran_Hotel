<div class="modal fade" id="modalEditHidangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form name="form" method="post" id="formEditHidangan" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @include('hidangan.formHidangan')
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

