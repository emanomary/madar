
$(document).ready(function(){
    $('#name').keyup(function(e){
        var str = $('#name').val();
        str = str.replace(/\s+/g, '-');//rplace stapces with dash
        $('#slug').val(str);
        $('#slug').attr('placeholder', str);
    });
});

/*********************************************************************/
$(document).ready(function () {
    $('input:radio[name="type"]').on('change',function () {
        if(this.checked && this.value=='2')
        {
            $('#category_list').show();
        }
        else
        {
            $('#category_list').hide();
        }
    });
});
