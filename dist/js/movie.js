let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.style.display = i === index ? 'block' : 'none';
  });
}

function changeSlide(n) {
  slideIndex = (slideIndex + n + totalSlides) % totalSlides;
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
    if (page < 1 || page > 3) return;  
    currentPage = page;
    updateButtons();  
    console.log("Switched to page " + page);
    
    if (page === 1) {
        window.location.href = 'movie.php'; 
    } else if (page === 2) {
        window.location.href = 'movie1.php'; 
    } else if (page === 3) {
        window.location.href = 'movie2.php'; 
    }
}


function updateButtons() {
    document.querySelectorAll(".page").forEach(btn => btn.classList.remove("active"));
    document.querySelector(".page" + currentPage).classList.add("active");
}

document.getElementById("prev").addEventListener("click", () => {
    if (currentPage > 1) {
        changePage(currentPage - 1);
    }
});

document.getElementById("next").addEventListener("click", () => {
    if (currentPage < 3) {
        changePage(currentPage + 1);
    }
});

document.querySelector('.page1').addEventListener('click', () => changePage(1));
document.querySelector('.page2').addEventListener('click', () => changePage(2));
document.querySelector('.page3').addEventListener('click', () => changePage(3));

updateButtons();  

document.addEventListener("DOMContentLoaded", function () {
    const genreButton = document.querySelector(".dropbtn");
    const dropdownContent = document.querySelector(".dropdown-content");

    // Initially hide the dropdown content
    dropdownContent.style.display = "none";

    // Toggle dropdown visibility on click
    genreButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default anchor behavior
        dropdownContent.style.display = dropdownContent.style.display === "none" ? "block" : "none";
    });

    // Close dropdown if clicking outside
    document.addEventListener("click", function (event) {
        if (!genreButton.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.style.display = "none";
        }
    });
});


