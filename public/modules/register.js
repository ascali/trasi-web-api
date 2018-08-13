function save()
{
    $('#btnSave').text('saving...'); //change button text
    // $('#btnSave').attr('disabled',true); //set button disable 
    var url = base_url+"/api/v1/register";

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
            	alert('Success Register Data ');
            	location.reload();
            }
            else
            {
                alert('Error Something wrong');
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
            var isError = JSON.parse(jqXHR.responseText);
            console.log(isError);
        	$(".help-box-nik").text(isError.nik["0"]).css('color','red');
        	$(".help-box-username").text(isError.username["0"]).css('color','red');
        	$(".help-box-longname").text(isError.longname["0"]).css('color','red');
        	$(".help-box-email").text(isError.email["0"]).css('color','red');

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}