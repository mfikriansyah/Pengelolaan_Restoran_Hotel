<div class="modal fade myModal" id="modalCreateHidangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Hidangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form name="form" class="myForm" action="{{route('dashboard.hidangan.store')}}" method="post" id="formTambahHidangan" 
                enctype="multipart/form-data">
                    @csrf
                    @include('hidangan.formHidangan')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btnTambahHidangan" class="btn btn-primary">Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div>

