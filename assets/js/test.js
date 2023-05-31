jQuery(document).ready(function($){
    $('li.blocks-gallery-item figure img').on('click', function(){
        var photo_id = $(this).data('id');
        console.log(photo_id);
        if (photo_id) {
            window.location.href = 'https://seolab.dp.ua';
        }
    })
})