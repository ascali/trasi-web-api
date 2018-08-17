<!-- notice modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel">How Do You Become an Affiliate?</h5>
            </div>
            <div data-spy="scroll" class="modal-body" data-offset="0">
            <!-- <div class="card"> -->
                <div class="card-content">
                    <form method="post" action="javascript:void(0)" id="form" class="form-horizontal">
                    <div class="row">
                        <label class="col-md-3 label-on-left">Status Activation</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Choose Status" name="activation" id="activation">
                                        <option disabled> Choose Status</option>
                                        <option value="1">Active </option>
                                        <option value="0">Not Active</option>
                                    </select>
                                <span class="help-box-activation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">Role User</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Choose Role" name="role_id" id="roleId">
                                        <option disabled> Choose Role</option>
                                        <option value="1">Administrator </option>
                                        <option value="2">Police</option>
                                        <option selected value="3">User Citizens</option>
                                    </select>
                                <span class="help-box-role_id"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">NIK</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="nik" id="nik" minlength="16" maxlength="17" required="">
                                <span class="help-box-nik"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">First Name</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="username" id="username" required="">
                                <span class="help-box-username"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">Long Name</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="longname" id="longname" required="">
                                <span class="help-box-longname"></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <label class="col-md-3 label-on-left">Password</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="password" id="password" val required="">
                                <span class="help-box-password"></span>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <label class="col-md-3 label-on-left">Gender</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="gender" id="gender">
                                        <!-- <option disabled> Choose Gender</option> -->
                                        <option value=1>Pria</option>
                                        <option value=0>Wanita</option>
                                    </select>
                                <span class="help-box-gender"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">Place, Date Of Birth</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <div class="row">
                                    <label class="control-label"></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="pob" id="pob" required="">
                                        <span class="help-box-pob-pob"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control datepicker" name="dob" id="dob" required="" />
                                        <span class="help-box-dob"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">Email</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="email" class="form-control" name="email" id="email" required="">
                                <span class="help-box-email"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 label-on-left">Phone</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="phone" id="phone" required="">
                                <span class="help-box-phone"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" id="userId">
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
<!-- end notice modal