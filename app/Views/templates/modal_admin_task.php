<div class="modal fade" id="adminTask" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="add-to-cart-modal__header">Task editor
                    <button class="close" type="button" data-dismiss="modal" aria-label="Закрыть"> <span aria-hidden="true">&times;</span></button>
                </h4>
                <form method="POST" action="/modify">
                    <input type="hidden" class="taskId" id="idInput" name="id">
                    <input type="hidden" id="nameInput" name="name">
                    <input type="hidden" id="emailInput" name="email">
                    <div class="form-group">
                        <label for="text" id="textLabel">Text</label>
                        <textarea name="text" lass="form-control" id="textInput" placeholder="Some text" id="text" cols="30" rows="10" style="display:block; width: 100%"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-light btn-block"">Save task</button>
                    </div>
                </form>

                <div class="form-group">
                    <div class="row">
                        <div class="col text-right">
                            <form method="POST" action="/close">
                                <input type="hidden" class="taskId" id="taskId" name="id">
                                <button type="submit" class="btn btn-success">Close task</button>
                            </form>
                        </div>
                        <div class="col">
                            <form method="POST" action="/delete">
                                <input type="hidden" class="taskId" id="taskId" name="id">
                                <button type="submit" class="btn btn-danger">Delete task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>