window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle('down', window.scrollY > 0);

      //change logo
      var logo = document.querySelector(".brand img");
      if (window.scrollY>0) {
          logo.setAttribute('src', 'img/logo.png');
      }else{
          logo.setAttribute('src', 'img/logo.png');
      }

  });

  //javascript for responsive navigation sidebar menu
  var menu = document.querySelector('.menu');
  var menuBtn = document.querySelector('.menu-btn');
  var closeBtn = document.querySelector('.close-btn');

  menuBtn.addEventListener("click", () => {
    menu.classList.add('active');
  });

  closeBtn.addEventListener("click", () => {
    menu.classList.remove('active');
  });


  const enlaces = document.querySelectorAll('.menu a');

  enlaces.forEach( function( enlace ){
      enlace.addEventListener('click', function(e){
          e.preventDefault();

          const seccion = document.querySelector(e.target.attributes.href.value);
          seccion.scrollIntoView({
              behavior: 'smooth'
          });

      });
  });