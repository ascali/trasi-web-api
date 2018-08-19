<!-- notice modal -->
<div class="modal fade" id="formModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                    <!-- <div class="row">
                        <label class="col-md-3 label-on-left">In Charge Police</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker in_charge_police" data-style="select-with-transition" title="Choose Police" name="in_charge_police" id="in_charge_police" required="">
                                        <option disabled> Choose Police</option>
                                </select>
                                <span class="help-box-in_charge_police"></span>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <label class="col-md-3 label-on-left">In Charge Police</label>
                        <div class="col-md-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="in_charge_police" id="in_charge_police" required="">
                                <span class="help-box-in_charge_police"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="complaint_id" id="complaint_id">
                    <input type="hidden" name="updated_by" id="updated_by">
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