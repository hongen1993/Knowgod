  $(".whoIs").click(function(){
    $(".whoIs").attr('id', 'enterWhoIs');
    setTimeout(function () {
      window.location.href= '/pages/whoIs.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
  
    });
  
  $(".listenTo").click(function(){
    $(".listenTo").attr('id', 'enterListenTo');
   setTimeout(function () {
    window.location.href= '/pages/predications.php';
    //will redirect to your blog page
    }, 2000); //will call the function after 2 secs.

  });

  $(".listenToCH").click(function(){
    $(".listenToCH").attr('id', 'enterListenToCH');
   setTimeout(function () {
    window.location.href= '/pages/predicationsCH.php';
    //will redirect to your blog page
    }, 2000); //will call the function after 2 secs.

  });

  $(".contactUs").click(function(){
    $(".contactUs").attr('id', 'enterWhoIs')
    setTimeout(function () {
      window.location.href= '/pages/contactUs.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
    });

  $(".aboutUs").click(function(){
    $(".aboutUs").attr('id', 'enterWhoIs')
    setTimeout(function () {
      window.location.href= '/pages/pastor.php';
      //will redirect to your blog page
      }, 2000); //will call the function after 2 secs.
  
    });
    $(".verify").click(function(){
        window.location.href= '/account/user-verification.php';
        //will redirect to your blog page
      });