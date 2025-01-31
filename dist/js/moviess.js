let currentPage = 3;  

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
