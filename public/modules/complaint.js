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
                                "data": "description"
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
                            		return row.last_position;
                            	}
                            },
                            /*{
                                "data": "updated_at"
                            },
                            {
                                "data": "updated_by"
                            }*/
			    			/*{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id = row.user_id;
                                    var action = edit ? '<a href="javascript:void(0)" onclick="edit('+id+',true);" class="btn btn-simple btn-warning btn-icon edit" title="Edit Data"><i class="material-icons">dvr</i></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="javascript:void(0)" onclick="del('+id+',true);" class="btn btn-simple btn-danger btn-icon remove" title="Delete Data"><i class="material-icons">close</i></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}*/
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
