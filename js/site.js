$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if (textfield.val() != "") {
                    //$("body").scrollTo("#output");
                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                    "height":"0",
                    "padding":"0",
                    "margin":"0",
                    "opacity":"0"
                    });
                    //change button text 
                    $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function(){
                    $("input").css({
                    "height":"auto",
                    "padding":"10px",
                    "opacity":"1"
                    }).val("");
                    });
                    
                    //show avatar
                    $(".avatar").css({
                        "background-image": "url('http://2.bp.blogspot.com/-G1vh_uLbyM8/U5W__nOU6eI/AAAAAAAAIIg/v1y8V_TEduI/s1600/coffee-smiley.png')"
                    });
                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                }
                //console.log(textfield.val());

            });
});

// $(document).ready(function(){
//     $('.wizard-card-register').bootstrapWizard({
        
//         onInit : function(tab, navigation, index){
            
//            //check number of tabs and fill the entire row
//            var $total = navigation.find('li').length;
//            $width = 100/$total;
           
//            $display_width = $(document).width();
           
//            if($display_width < 600 && $total > 3){
//                $width = 50;
//            }
           
//            navigation.find('li').css('width',$width + '%');
           
//         },
//         onTabClick : function(tab, navigation, index){
//             // Disable the posibility to click on tabs
//             //return validateTab(index);
//             return true;
//         }
//     })
// });