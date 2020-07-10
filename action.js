$(document).ready(function(){
    console.log("hi");
    $(".navshowhide").on("click",function(){
        var main=$(".mainpage");
        var side=$(".sidebar");
        if(main.hasClass("leftPadding")){
            side.hide();
        }
        else
            side.show();
        main.toggleClass("leftPadding");
    });
});

function notSignedIn(){
    alert("You must be signed in");
}