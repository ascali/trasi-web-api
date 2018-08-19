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
						"url": base_url+"/api/v1/news/all",
				        "type": "GET"
		        	},
		    "aoColumns": [	
                            {
                                "data": "category"
                            },
                            {
                                "data": "title"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    return row.main.substring(0, 50)+'... ';
                                }
                            },
                            {
                                "data": "null",
                                "mRender": function(data, type, row){
                                    var img = '<img src="'+base_url+'/image/'+row.image+'" height="40px" />';
                                    return img;
                                }
                            },
                            {
                                "data": "updated_by"
                            },
                            {
                                "data": "updated_at"
                            },
			    			{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id = row.news_id;
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
    $('.modal-title').text('Form Input News'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');
    $('#images').show();
    $('#image').show();

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
        url : base_url+"/api/v1/news/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
        	$('#news_id').val(dataRow.data.news_id);
            $('#category').val(dataRow.data.category);
            $('#title').val(dataRow.data.title);
            $('#main').val(dataRow.data.main);
            // $('#image').val(dataRow.data.image);
            $('#images').hide();
            $('#image').hide();
            $('#updatedBy').val(session.data.email);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit News'); // Set title to Bootstrap modal title

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
            url : base_url+"/api/v1/news/delete/"+ id,
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
        url = base_url+"/api/v1/news/create";
    } else {
        url = base_url+"/api/v1/news/update";
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
            $(".help-box-category").html("<small>"+isError.category[0]+"</small>").css('color','red');
            $(".help-box-title").html("<small>"+isError.title[0]+"</small>").css('color','red');
            $(".help-box-main").html("<small>"+isError.main[0]+"</small>").css('color','red');
            $(".help-box-image").html("<small>"+isError.image[0]+"</small>").css('color','red');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


$(document).ready(function (e) {

    $("#form").on('submit',(function(e) {
    e.preventDefault();
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = base_url+"/api/v1/news/create";
    } else {
        url = base_url+"/api/v1/news/update";
    }

    $("#message").empty();
    $('#loading').show();
    $.ajax({
    url: url, // Url to which the request is send
    type: "POST",             // Type of request to be send, called as method
    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false,       // The content type used when sending data to the server.
    cache: false,             // To unable request pages to be cached
    processData:false,        // To send DOMDocument or non processed data file it is set to false
    success: function(data)   // A function to be called if request succeeds
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
            console.log(data);
            alert('Error Something wrong');
        }
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button enable 
        alert('Success Saving Data');

        $('#loading').hide();
        $("#message").html(data);
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
}));

// Function to preview image after validation
$(function() {
    $("#image").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
            $('#previewing').attr('src','noimage.png');
            $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $("#image").css("color","green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
    };
});