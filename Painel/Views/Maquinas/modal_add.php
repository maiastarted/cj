<!-- ---------------------------------------------------------- -->
<div class="modal" id="add8-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form id="add-form" name="add-form" class="form-horizontal">
                    <input type="hidden" class="form-control" id="mode" name="mode" value="add">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="form-group custom-file">
                            <input type="file" class="form-control custom-file-input" id="prodImg" name="prodImg"
                                accept="image/*">
                            <label class="custom-file-label" for="prodImg"
                                id="imgLabel"></label>
                        </div>

                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required=""> -->
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn bt_novo" id="btn-save" value="create">
                            Gravar
                        </button>
                        <button type="button" class="btn bt_novo" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>