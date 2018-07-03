 // click dropdown menu mobile
        $(document).ready(function() {
     	$("#nav-toggle").on('click', function() {
     		$(this).toggleClass("is-open");
     	});
         $("#nav-toggle").click(function() {
           $(".c-navibar").slideToggle(500);
         })
         function changeOverImage(element) {
		    var url = $(element).prop('src'),
		        url_over = $(element).data('change-over');

		    $(element)
		        .prop('src', url_over)
		        .data('change-over', url);
		}

		$(document).delegate('img[data-change-over]', 'mouseover', function() {
		    changeOverImage(this);
		});
		$(document).delegate('img[data-change-over]', 'mouseout', function() {
		    changeOverImage(this);
		});
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