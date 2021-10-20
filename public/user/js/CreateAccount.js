function CopyItem(ele) {
    var ul = $($(ele).attr("data-ul").toString());
    var ulOther = $($(ele).attr("data-ul").toString() + "-other");
    var baseItem = ul.first("li").first();
    console.log(baseItem.html());
    ulOther.append(baseItem.html());
}

function RemoveItem(ele) {
    var item = $(ele);
    item.closest("li").fadeOut(300, function () {
        $(this).remove();
    })
}

// $(".other-cat label").click(function () {
//     var inp = $(".other-cat input");
//     inp.toggleClass("other-cat-closed");
// });

$('#o-t').change(function() {
    if(this.checked) {
        $(".o-t-i").removeClass("other-cat-closed");
    }else{
        $(".o-t-i").addClass("other-cat-closed");
    }      
});

$(".tabs-parent button").click(function () {
    if (!$(this).hasClass("tab-active")) {
        $(".tab-active").removeClass("tab-active");
        $(this).addClass("tab-active");
        var pageId = $(this).attr("data-page-id");
        $(".page-active").fadeOut(200, function(){
            $(this).removeClass("page-active");
            $(pageId.toString()).fadeIn(200, function(){
                $(this).addClass("page-active");
            });
        });
        
    }
});