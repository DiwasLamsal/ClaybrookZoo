
window.onload = function(){

  // Timeout just to test the function
  setTimeout(function(){
    document.getElementsByClassName('load')[0].style.display = "none";
  }, 10);


  var dropdown = document.getElementById('dropdown');
  dropdown.addEventListener('click', function(){
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("arrow").classList.toggle("rightArrow");
  });


}

$(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

// Scrolling Effect

$(window).on("scroll", function() {
      if($(window).scrollTop()) {
            $('nav').addClass('black');
      }

      else {
            $('nav').removeClass('black');
      }
})
