/*-------------------------------
        Side Nav
------------------------------------ */

    $(".nav-btn").click(function(){
        $("#side-nav").css('width','90px');
        $("#side-nav").css('padding-top','71px');
        $("#side-nav").css('border-top-right-radius','154px');
        $("#side-nav").css('border-bottom-right-radius','154px');
        $(".navbar ul").css('margin-top','31px');
        $("#main-content").css('width','92%');
        $("#main-content").css('margin-left','168px');
        $("#table #main-content").css('margin-left','120px');
        $(".logo").css('display', 'none');
        $(".nav-btn").css('display','block');
        $(".fa-bars").css('visibility', 'visible');
         $(".fa-bars").css('margin-left', '-10px');
         $(".link-a").css('visibility', 'hidden');
         $(".link-a").css('height', '25px');
         $(".icons").css('visibility', 'visible');
         $(".icons").css('margin-left', '0');
          $(".nav-btn1").css('display','block');
          $(".nav-btn").css('display','none');
          $(this).find('.nav-btn').toggleClass('rotate');
      });

      $(".nav-btn1").click(function(){
        $("#side-nav").css('width','324px');
        $("#side-nav").css('padding-top','46px');
        $("#side-nav").css('border-top-right-radius','139px');
        $("#side-nav").css('border-bottom-right-radius','139px');
        $(".navbar ul").css('margin-top','0px');
        $("#main-content").css('width','82%');
        $("#main-content").css('margin-left','337px');
        $("#table #main-content").css('margin-left','280px');
        $(".logo").css('visibility', 'visible');
        $(".logo").css('display','block');
         $(".link-a").css('visibility', 'visible');
         $(".icons").css('visibility', 'visible');
         $(".nav-btn").css('display','block');
          $(".nav-btn1").css('display','none');
     });

     /*-------------------------------
            #Dropdown Menu
  ------------------------------ */
     

    $(document).ready(function(){
      $('.has-sub').on('click', function(){
          $(this).next('.link-sub').slideToggle();
          $(this).find('.dropdown').toggleClass('rotate');
        });

        $('.profile').click(function(){
          $('.profile-links').toggle();
        });
      });
    

