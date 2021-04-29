$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
    
    
    $('input[name="city_id"]').keyUp(function(){
        alert('va');
    });
    const settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?countryIds=EC&namePrefix=QUI",
        "method": "GET",
        "headers": {
            "x-rapidapi-key": "a30b49dcf9mshb32bb1d24ef73f7p136170jsn0eea6c823cc5",
            "x-rapidapi-host": "wft-geo-db.p.rapidapi.com"
        }
    };
    
    $.ajax(settings).done(function (response) {
        console.log(response);
    });
});