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
      setTimeout(autoPlay, 10000); 
    }

    
    document.querySelector('.prev').addEventListener('click', () => changeSlide(-1));
    document.querySelector('.next').addEventListener('click', () => changeSlide(1));

    
    showSlide(slideIndex);
    autoPlay();

  let currentPage = 1;
    function changePage(page) {
        currentPage = page;
        updateButtons();
        console.log("Switched to page " + page);
    }
    function updateButtons() {
      document.querySelectorAll(".page").forEach(btn => btn.classList.remove("active"));
      document.querySelectorAll(".page")[currentPage].classList.add("active");
  }
  document.getElementById("prev").addEventListener("click", () => {
      if (currentPage > 1) changePage(currentPage - 1);
  });
  document.getElementById("next").addEventListener("click", () => {
      if (currentPage < 3) changePage(currentPage + 1);
  });
  updateButtons();