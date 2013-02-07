
    jQuery(document).ready(function(){
        jQuery('.nav-links').mouseover(function(){
           $(this).animate({  
                opacity: 1  
            }, 200 );  
        });
        jQuery('.nav-links').mouseout(function(){
           $(this).animate({  
                opacity: 0.6
            }, 200 );  
        });
    
    });



