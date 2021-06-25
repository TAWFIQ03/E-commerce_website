jQuery(document).ready(function($) {
    $('.controls#ibsen-img-container-grid_layout li img').click(function(){
        $('.controls#ibsen-img-container-grid_layout li').each(function(){
            $(this).find('img').removeClass ('ibsen-radio-img-selected') ;
    });
    $(this).addClass ('ibsen-radio-img-selected') ;
    });
});
