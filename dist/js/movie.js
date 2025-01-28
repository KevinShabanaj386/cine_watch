let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');

    
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
    }

    
    function changeSlide(n) {
      slideIndex = (slideIndex + n + slides.length) % slides.length;
      showSlide(slideIndex);
    }

    
    function autoPlay() {
      changeSlide(1);
      setTimeout(autoPlay, 7000); 
    }

    
    document.querySelector('.prev').addEventListener('click', () => changeSlide(-1));
    document.querySelector('.next').addEventListener('click', () => changeSlide(1));

    
    showSlide(slideIndex);
    autoPlay();