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
						"url": base_url+"/api/v1/user/all?api_token="+session.data.api_token,
				        "type": "GET"
		        	},
		    "aoColumns": [	
                            {
                                "data": "nik"
                            },
                            {
                            	"data": null,
                            	"mRender": function(data, type, row){
                            		return row.username + ' '+ row.longname;
                            	}
                            },
                            {
                            	"data": null,
                            	"mRender": function(data, type, row){
                            		return row.pob + ', '+ row.dob;
                            	}
                            },
                            {
                            	"data": null,
                            	"mRender": function(data, type, row){
                            		return row.gender==0?'Wanita':'Pria';
                            	}
                            },
                            {
                            	"data": "phone"
                            },
                            {
                            	"data": null,
                            	"mRender": function(data, type, row){
                            		return row.role_id==2?'Police':'Citizens';
                            	}
                            },
                            {
                            	"data": null,
                            	"mRender": function(data, type, row){
                            		return row.last_position;
                            	}
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
                                    var id = row.user_id;
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
    $('.modal-title').text('Form Input User'); // Set Title to Bootstrap modal title
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
        url : base_url+"/api/v1/user/"+id+"?api_token="+session.data.api_token,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
        	$('#activation').val(dataRow.data[0].activation);
            $('#roleId').val(dataRow.data[0].role_id);
            $('#nik').val(dataRow.data[0].nik);

        	$('#username').val(dataRow.data[0].username);
            $('#longname').val(dataRow.data[0].longname);
            // $('#password').val(dataRow.data[0].password);

        	$('#gender').val(dataRow.data[0].gender);
            $('#pob').val(dataRow.data[0].pob);
            $('#dob').val(dataRow.data[0].dob);

        	$('#email').val(dataRow.data[0].email);
            $('#phone').val(dataRow.data[0].phone);
            $('#userId').val(dataRow.data[0].user_id);
            
            $('#updatedBy').val(session.data.email);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit User'); // Set title to Bootstrap modal title

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
            url : base_url+"/api/v1/user/delete/"+id+"?api_token="+session.data.api_token,
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
    // $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = base_url+"/api/v1/user/create?api_token="+session.data.api_token;
    } else {
        url = base_url+"/api/v1/user/update?api_token="+session.data.api_token;
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
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
            alert('Success Saving Data ');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
            var isError = JSON.parse(jqXHR.responseText);
            console.log(isError);
        	$(".help-box-activation").text(isError.activation["0"]).css('color','red');
        	$(".help-box-role_id").text(isError.role_id["0"]).css('color','red');
        	$(".help-box-nik").text(isError.nik["0"]).css('color','red');
        	$(".help-box-username").text(isError.username["0"]).css('color','red');
        	$(".help-box-longname").text(isError.longname["0"]).css('color','red');
        	// $(".help-box-password").text(isError.password["0"]).css('color','red');
        	$(".help-box-gender").text(isError.gender["0"]).css('color','red');
        	$(".help-box-pob").text(isError.pob["0"]).css('color','red');
        	$(".help-box-dob").text(isError.dob["0"]).css('color','red');
        	$(".help-box-phone").text(isError.phone["0"]).css('color','red');
        	$(".help-box-email").text(isError.email["0"]).css('color','red');

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
