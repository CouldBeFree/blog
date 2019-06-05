(function($) {

    $('#true_loadmore').click(function(){
        $(this).text('Loading...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if( data ) {
                    $('#true_loadmore').text('Load more').before(data);
                    current_page++;
                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });

    // Ajax for search

    $('#true_loadmore2').on( 'click', function() {
        var $input = $('input[name="s"]');
        var query = $input.val();
        var $content = jQuery('#target');
        console.log(ajaxurl);
        $.ajax({
            type : 'post',
            url : ajaxurl,
            data : {
                action : 'load_search_results',
                s : query,
                page : current_page
            },
            success : function( response ) {
                $content.append(response);
                current_page++;
                if (current_page == max_pages){
                    $(".search-button").remove();
                }
            }
        });

        return false;
    });

    // Open/close search block

    $('#search-btn').click(function () {

       $('.search-block').toggleClass('open');
       $('.search-block__item').toggleClass('toggle');

        if($('#target-icon').hasClass('icon-magnifying-glass')){
            $('#target-icon').removeClass('icon-magnifying-glass');
            $('#target-icon').addClass('icon-close');
        } else{
            $('#target-icon').addClass('icon-magnifying-glass');
            $('#target-icon').removeClass('icon-close');
        }
    });
    
    $('.burger-menu').click(function () {
        $('#menu-main-nav').toggleClass('active');
    });

    $('.sidebar-mail>input').focus(function() {
        $(this).attr('placeholder', 'Enter your email')
    }).blur(function() {
        $(this).attr('placeholder', 'Join our newsletter!')
    });

    $('#searchsubmit').click(function () {
        var search = $('#search');

        setTimeout(function () {
            search.val('');
        }, 100);

        if(search.val() === ''){
            return false
        }
    });

})(jQuery);
