$(document).ready(function(){
    $('.edit').click(function(){
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": base_url+"/api/user?id="+$(this).data('id'),
            "method": "GET",
        };
        
        $.ajax(settings).done(function (response) {
            console.log(response);
            var fields = ['id','name','email','birth_date','cell_phone','document','city_id'];
            for(i in fields){
                $("#editModal [name='"+fields[i]+"']").val(response[fields[i]]);
            }
        });
    });
    $('.delete').click(function(){
        $("#deleteModal [name='id']").val($(this).data('id'));
    });
});