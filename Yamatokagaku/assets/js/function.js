 // click dropdown menu mobile
        $(document).ready(function() {
         $("#nav-toggle").click(function() {
           $(".menubar").slideToggle(500);
         })
         $("#ywins-toggle").click(function() {
           $(".menu-ywins").slideToggle(500);
         })
        });
         //end click dropdown menu mobile
         //SCROLL TO TOP
         // When the user scrolls down 20px from the top of the document, show the button
         window.onscroll = function() {scrollFunction()};

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