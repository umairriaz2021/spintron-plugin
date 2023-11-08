jQuery(document).ready(function($){
$('#div_schedule button').each(function(){
    $(this).on('click',function(){
        var dayName = $(this).text().toLowerCase();
        var url = `https://spinitron.com/api/shows?start=${dayName}`;
        
        $.ajax({
             url,
             type:'GET',
             headers: {
                'Authorization': 'Bearer QLWLIVrGxB6FEfoGopdxJBCO'
              },
             crossDomain: true,
             success:function(res)
             {
                  console.log(res);
             }
        })
    })
})

})