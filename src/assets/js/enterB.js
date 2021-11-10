$(document).ready( function enterB(){
    
    /* Logo effect */ 
    
    $('.logoIntro').delay(500).queue(function(logoOn){$(this).css('display', 'block');logoOn();});
    
    /* Verse effect */
    
    $('.efectoMB').delay(1000).queue(function(displayBlock){$(this).css('display', 'block');displayBlock();});
    $('.lineborder').delay(5000).queue(function(displayBlock){$(this).css('border-right', 'none');displayBlock();});
    
    $('.efectoMTB').delay(5200).queue(function(displayBlockB){$(this).css('display', 'block');displayBlockB();});
    $('.lineborderTwo').delay(9500).queue(function(displayBlock){$(this).css('border-right', 'none');displayBlock();});
    
    $('.efectoMThreeB').delay(9500).queue(function(displayBlockC){$(this).css('display', 'block');displayBlockC();});
    $('.lineborderThree').delay(12000).queue(function(displayBlock){$(this).css('border-right', 'none');displayBlock();});
    
    $('.efectoMFB').delay(12000).queue(function(displayBlockD){$(this).css('display', 'block');displayBlockD();});
    $('.lineborderFour').delay(16500).queue(function(displayBlock){$(this).css('border-right', 'none');displayBlock();});
    
    $('.efectoMB').delay(14000).queue(function(dissappear){$(this).addClass('dissappear');dissappear();});
    $('.efectoMTB').delay(10000).queue(function(dissappearB){$(this).addClass('dissappear');dissappearB();});
    $('.efectoMThreeB').delay(6000).queue(function(dissappearC){$(this).addClass('dissappear');dissappearC();});
    $('.efectoMFB').delay(4000).queue(function(dissappearD){$(this).addClass('dissappear');dissappearD();});
    
    $('.content').delay(5000).queue(function(opaco){$(this).css('opacity', '0');opaco();});
    
    /*     $('.crossDisplayOn').delay(6300).queue(function(crossOn){$(this).css('display', 'block');crossOn();});
    */
    
    /* Menu */
    
    $('.whoIs').delay(18000).queue(function(menuA){$(this).css('display', 'block');menuA();});
    $('.listenTo').delay(18500).queue(function(menuB){$(this).css('display', 'block');menuB();});
    $('.contactUs').delay(19000).queue(function(menuC){$(this).css('display', 'block');menuC();});
    $('.aboutUs').delay(19500).queue(function(menuD){$(this).css('display', 'block');menuD();});
    
    $('#skipB').delay(18000).queue(function(menuE){$(this).css('display', 'none');menuE();});

    }
)