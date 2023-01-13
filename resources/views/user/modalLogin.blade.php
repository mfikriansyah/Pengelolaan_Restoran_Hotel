<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login Untuk Order</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('login') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Username</label>
                        <input type="text" class="form-control" name="username" id="harga_hidangan"
                            placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label for="judul">Password</label>
                        <input type="password" class="form-control" name="password" id="stok_hidangan"
                            placeholder="Password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>