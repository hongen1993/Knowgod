$('.next').click(function(){

    $('.stepOne').addClass('stepOneB')
/*     $('.stepOne').removeClass('stepOne')
 */

    $('.stepTwo').addClass('stepTwoB')
/*     $('.stepTwo').removeClass('stepTwo')
 */

});

$('.back').click(function(){

     $('.stepOne').removeClass('stepOneB')

     $('.stepTwo').removeClass('stepTwoB')
});


$('.nextB').click(function(){

    $('.stepTwo').removeClass('stepTwoB')

    $('.stepThree').addClass('stepThreeB')

});

$('.backB').click(function(){

    $('.stepTwo').addClass('stepTwoB')

    $('.stepThree').removeClass('stepThreeB')

});

/* progress stage */

$(".next").click(function(){
    if($(".step-wrapper li:last-child").hasClass('completed')){
      alert("completed");
       return
    }
      $(".step-wrapper li.active").addClass("completed").removeClass("active").next('li').addClass("active");  
  });
  $(".nextB").click(function(){
    if($(".step-wrapper li:last-child").hasClass('completed')){
      alert("completed");
       return
    }
      $(".step-wrapper li.active").addClass("completed").removeClass("active").next('li').addClass("active");  
  });
  $(".back").click(function(){
    if($(".step-wrapper li:first-child").hasClass('active')){
      alert("Already on first step");
       return
    }
      $(".step-wrapper li.active").removeClass("active completed").prev('li').addClass("active").removeClass('completed');
    if($(".step-wrapper li:last-child").hasClass('completed')){
      $(".step-wrapper li:last-child").removeClass('completed').addClass('active')
    }
  });
    
  $(".backB").click(function(){
    if($(".step-wrapper li:first-child").hasClass('active')){
      alert("Already on first step");
       return
    }
      $(".step-wrapper li.active").removeClass("active completed").prev('li').addClass("active").removeClass('completed');
    if($(".step-wrapper li:last-child").hasClass('completed')){
      $(".step-wrapper li:last-child").removeClass('completed').addClass('active')
    }
  });
  