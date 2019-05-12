<div class="modal fade" id="auth" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="add-to-cart-modal__header">Авторизация
                    <button class="close" type="button" data-dismiss="modal" aria-label="Закрыть"> <span aria-hidden="true">&times;</span></button>
                </h4>
                <form method="POST" action="/login">
                    <div class="form-group">
                        <label for="name">Account</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Account">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>