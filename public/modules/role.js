var save_method;
var table;
$(document).ready(function() {
	table = $('#datatables').DataTable({
		"pagingType": "full_numbers",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		responsive: true,
		language: {
		search: "_INPUT_",
		searchPlaceholder: "Search records",
		},
		"processing": true,
		// "order": [],
			"ajax": {
						"url": base_url+"/api/v1/role/all",
				        "type": "GET"
		        	},
		    "aoColumns": [	
                            {
                                "data": "rolename"
                            },
                            {
                                "data": "created_at"
                            },
                            {
                                "data": "updated_at"
                            },
                            {
                                "data": "updated_by"
                            },
			    			{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id = row.role_id;
                                    var action = edit ? '<a href="javascript:void(0)" onclick="edit('+id+',true);" class="btn btn-simple btn-warning btn-icon edit" title="Edit Data"><i class="material-icons">dvr</i></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="javascript:void(0)" onclick="del('+id+',true);" class="btn btn-simple btn-danger btn-icon remove" title="Delete Data"><i class="material-icons">close</i></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}
					   ]

	});

	$('.card .material-datatables label').addClass('form-group');
	$('#updatedBy').val(session.data.email);
});

function reload_table()
{
  // window.location.reload()
  table.ajax.reload(null,false); //reload datatable ajax 
}

function add()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#formModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Role'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

}

function edit(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"/api/v1/role/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
        	$('#roleId').val(dataRow.data.role_id);
            $('#roleName').val(dataRow.data.rolename);
            $('#updatedBy').val(session.data.email);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Role'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"/api/v1/role/delete/"+ id,
            type: "POST",
            dataType: "JSON",
            success: function(dataRow)
            {
                //if success reload ajax table
                $('#formModal').modal('hide');
                reload_table();
                alert('Success Delete Data');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = base_url+"/api/v1/role/create";
    } else {
        url = base_url+"/api/v1/role/update";
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status == true) //if success close modal and reload ajax table
            {
                $('#formModal').modal('hide');
                reload_table();
            }
            else
            {
            	$('#formModal').modal('hide');
                reload_table();
                alert('Error Something wrong');
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
            alert('Success Saving Data');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
        	// console.log(JSON.parse(jqXHR.responseText));
        	var isError = JSON.parse(jqXHR.responseText);
        	$(".help-box-rolename").html("<small>"+isError.rolename[0]+"</small>").css('color','red');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
