(function ($){
    $(".delete").on("submit",function(){
        return confirm("Etes vous certain, cette action est irréversible ?");
    });
})(jQuery)