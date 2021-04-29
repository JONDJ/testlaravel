$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
    
    
    $('input[name="city_id"]').keyup(function(){
        if($(this).val().length>=3)
        {
            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?namePrefix="+$(this).val().toUpperCase(),
                "method": "GET",
                "headers": {
                    "x-rapidapi-key": "a30b49dcf9mshb32bb1d24ef73f7p136170jsn0eea6c823cc5",
                    "x-rapidapi-host": "wft-geo-db.p.rapidapi.com"
                }
            };
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                $("#cities").html('');
                $.each(response.data,function(){
                    var city = $(this)[0];
                    if(city.type === 'CITY')
                        $("#cities").append('<option value="'+city.id+'">'+city.name+', '+city.country+'</option>');
                });
            });
        }
    });
    $('.cabeceraTabla').click(function() {
        $(location).attr('href', $(this).data("id"));
    });
});