<!-- notice modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel">How Do You Become an Affiliate?</h5>
            </div>
            <div class="modal-body">

            <!-- <div class="card"> -->
                <div class="card-content">
                    <form method="post" action="javascript:void(0)" id="form" class="form-horizontal">
                    <div class="row">
                        <label class="col-md-3 label-on-left">Role Name</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="rolename" id="roleName" required="">
                                <span class="help-box-rolename"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="role_id" id="roleId">
                    <input type="hidden" name="updated_by" id="updatedBy">
                </div>
            <!-- </div> -->

            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-fill btn-round btn-rose" id="btnSave" onclick="save()">Submit</button>
                <button data-dismiss="modal" class="btn btn-fill btn-round">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->