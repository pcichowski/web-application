const navSlide = () => {
    const przycisk = document.querySelector(".przycisk_listy");
    const nav = document.querySelector(".navbar");
    const navLinks = document.querySelectorAll(".navbar li");

    przycisk.addEventListener('click', () => {
            nav.classList.toggle('nav_active');

            przycisk.classList.toggle('toggle');

            navLinks.forEach((link,index) => {
                if(link.style.animation){
                    link.style.animation = '';
                }else{
                        link.style.animation = `navbarFade 0.5s ease forwards ${index / 7 + 0.3}s`;
                }
            });
        });

}

var btn = $('#do-gory');
  
$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
  btn.addClass('show');
} else {
  btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});

navSlide();
