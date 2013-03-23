$(function(){
    //===== iButtons =====//

    $('.on_off :checkbox, .on_off :radio').iButton({
        labelOn: "",
        labelOff: "",
        enableDrag: false
    });

    $('.yes_no :checkbox, .yes_no :radio').iButton({
        labelOn: "On",
        labelOff: "Off",
        enableDrag: false
    });

    $('.enabled_disabled :checkbox, .enabled_disabled :radio').iButton({
        labelOn: "Enabled",
        labelOff: "Disabled",
        enableDrag: false
    });

    //===== Notification boxes =====//

    $(".nNote").click(function() {
        $(this).fadeTo(200, 0.00, function(){ //fade
            $(this).slideUp(200, function() { //slide up
                $(this).remove(); //then remove from the DOM
            });
        });
    });
});
