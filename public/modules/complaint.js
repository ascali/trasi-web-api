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
						"url": base_url+"/api/v1/complaint/all?api_token="+session.data.api_token,
				        "type": "GET"
		        	},
		    "aoColumns": [	
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    return row.complaint_type=="1"?'SOS':'Else Crime';
                                }
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    return row.complaint_status=="0"?'Need Help':'Helped';
                                }
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var row = " Latitude: "+row.latitude+' - Longitude: '+row.longitude;
                                    return row;
                                }
                            },
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
                            	"data": "in_charge_police"
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
                            		return row.address;
                            	}
                            },
                            /*{
                                "data": "updated_at"
                            },
                            {
                                "data": "updated_by"
                            }*/
			    			{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var action = row.complaint_status==1?'<font color=red><b>Under Control</b></font>':'<a href="javascript:void(0)" onclick="edit('+row.complaint_id+',true);" class="btn btn-simple btn-warning btn-icon edit" title="Edit Data"><i class="material-icons">dvr</i></a>';
                                    return action;
                                    /*var id = row.user_id;
                                    var action = edit ? '<a href="javascript:void(0)" onclick="edit('+id+',true);" class="btn btn-simple btn-warning btn-icon edit" title="Edit Data"><i class="material-icons">dvr</i></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="javascript:void(0)" onclick="del('+id+',true);" class="btn btn-simple btn-danger btn-icon remove" title="Delete Data"><i class="material-icons">close</i></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  */
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


function edit(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');
    $.ajax({
        url : base_url+"/api/v1/user/role/2?api_token="+session.data.api_token,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            console.log('dataRow user role', dataRow);
                console.log('aa',dataRow.data.length);

            // $(".in_charge_police").append('<option selected disabled>Choose Police </option>');
            // for (var i = 0; i < dataRow.data.length; i++) {
            //     // var data = ;
            //     $(".in_charge_police").append('<option value="'+dataRow.data[i].username+' '+dataRow.data[i].longname+'">'+dataRow.data[i].username+' '+dataRow.data[i].longname+'</option>');
            // }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"/api/v1/complaint/"+id+"?api_token="+session.data.api_token,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            console.log('dataRow', dataRow);
            $('#complaint_id').val(dataRow.data[0].complaint_id);
            $('#in_charge_police').val(dataRow.data[0].in_charge_police);
            $('#updatedBy').val('Admin');
            $('#formModals').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Input Police'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = base_url+"/api/v1/complaint/update?api_token="+session.data.api_token;

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            console.log(data);
            if(data.status == true) //if success close modal and reload ajax table
            {
                $('#formModals').modal('hide');
                reload_table();
            }
            else
            {
                $('#formModals').modal('hide');
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
            $(".help-box-category").html("<small>"+isError.category[0]+"</small>").css('color','red');
            $(".help-box-title").html("<small>"+isError.title[0]+"</small>").css('color','red');
            $(".help-box-main").html("<small>"+isError.main[0]+"</small>").css('color','red');
            $(".help-box-image").html("<small>"+isError.image[0]+"</small>").css('color','red');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
