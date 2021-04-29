$(document).ready(function()
{
    $('#rolePermissions').hide();
    $('select[name="role_id"]').on('change',function (e) {
        var role_id = $(this).val();
        if(role_id)
        {
            $.ajax({
                url: '/users/getPermissions/'+role_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    /*console.log(data);*/
                    $('#userPermissions').hide();
                    $('#rolePermissions').show();
                    $('#permissionsList').empty();
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var permission =
                                '<div class="animated-checkbox col-sm-4">'+
                                '<label>'+
                                '<input type="checkbox" name="permissions[]" id="permissions_'+id+'" value="'+id+'" class="permissions mr-1">'+
                                '<span class="label-text mr-1">'+name+'</span>' +
                                '</label></div>';

                            $('#permissionsList').append(permission);
                        }
                    }
                }
            });
        }
        else {
            $('#permissionsList').empty();
        }
    });
});
