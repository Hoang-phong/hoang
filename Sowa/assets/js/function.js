 // slideShow fade
 $("document").ready(
     function() {
         $(".slideShow .pic:gt(0)").hide();
         setInterval(function() {
             $(".slideShow > .pic:first")
                 .fadeOut(1000)
                 .next()
                 .fadeIn(1000)
                 .end()
                 .appendTo(".slideShow");
         }, 3000)

     })
 //SCROLL TO TOP
 // When the user scrolls down 20px from the top of the document, show the button
 window.onscroll = function() {
     scrollFunction()
 };

 function scrollFunction() {
     if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
         document.getElementById("myBtn").style.display = "block";
     } else {
         document.getElementById("myBtn").style.display = "none";
     }
 }

 // When the user clicks on the button, scroll to the top of the document
 function topFunction() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
 }
 // Scroll fade section
 $(function() {
     $('.list-mv02').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
         console.log(isInView);
         if (isInView) {
             $(this).stop().addClass('mv02');
         } else {
             $(this).stop().removeClass('mv02');
         }
     });
     $('.list-mv03').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
         console.log(isInView);
         if (isInView) {
             $(this).stop().addClass('mv03');
         } else {
             $(this).stop().removeClass('mv03');
         }
     });

 });
 // js lightbox
     $(document).ready(function(){
         $('.popup-link').magnificPopup({
        type: 'image'
      });
      });
 
