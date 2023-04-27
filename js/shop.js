$(function(){

    var navDr = 1000;

    $("#top ul li a")
            .hover(function(){
                $(this).css({
                    backgroundColor: "#483d8b",
                    color: "#ffffff",
                    border: "none"
                },navDr);
            },
            function(){
                $(this).css({
                    backgroundColor: "",
                    color: "",
                    border: ""
                },navDr);
            });


        $('.over').each(function() {
        let topLine_off = $(this).attr('src');
        let topLine_on = $(this).attr('src').replace('off', 'on');
        $(this).hover(
            function () {
                $(this).attr('src', topLine_on);
            },
            function () {
                $(this).attr('src', topLine_off);
            }
        );
    
    });


});