(function($){
    $(document).ready(function(){
        $(".srs_popup").each(function(){
            var image = $(this).find("img").attr("src");
            $(this).attr("href", image);
        });
    });
})(jQuery);