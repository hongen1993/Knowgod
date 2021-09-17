$(".whoIs").click(function(){
    $(".whoIs").attr('id', 'enterWhoIs');
    setTimeout(function () {
      window.location.href= '/whoIs.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
  
    });

  $(".listenTo").click(function(){
    $(".listenTo").attr('id', 'enterListenTo');
   setTimeout(function () {
    window.location.href= '/predications.php';
    //will redirect to your blog page
    }, 2000); //will call the function after 2 secs.

  });

  $(".contactUs").click(function(){
    $(".contactUs").attr('id', 'enterWhoIs')
    setTimeout(function () {
      window.location.href= '/contactUs.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
    });

  $(".aboutUs").click(function(){
    $(".aboutUs").attr('id', 'enterWhoIs')
    setTimeout(function () {
      window.location.href= '/pastor.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
  
    });