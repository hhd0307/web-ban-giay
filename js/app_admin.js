$(document).ready(function() {
    
    // Xoa thể loại
    $('.theloai .delete').click(function() {
        let Id = $(this).parent().parent().attr('Id');
        let href = $(this).attr('data-href');
        $.ajax({
            url: href,
            type: 'GET',
        }).done(function(ketqua) {
            $('tr[Id='+Id+']').html("");
        });
    });
});