document.addEventListener("DOMContentLoaded", () => {
  const content = document.getElementById("content");
  const links = document.querySelectorAll("[data-page]");
  const body = document.body;
  
  const pages = {
    home: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/snow.png" alt="avengers">
          </div>
          <div class="movie-info">
            <p class="kategorit">March 21 2025 | PG-13 | Fantasy, Live Action, Musical</p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=iV46TJKL8cU" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck1.jpg')",
    },
    page1: {
      html: `
       <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/captainAmerica.png" alt="deadpool">
          </div>
          <div class="movie-info">
           <p class="kategorit">February 14 2025 | PG-13 | Action-Adventure, Live Action, Science Fiction, Superhero </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=1pHDWnXmK7Y" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck2.jpg')",
    },
    page2: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/tom.png" alt="title">
          </div>
          <div class="movie-info">
           <p class="kategorit">May 23 2025 | R | Action, Adventure, Thriller </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=NOhDyUmT9z0" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck10.jpg')",
    },
    page3: {
      html: `
        <div class="card">
          <div class="title">
             <img class="titulli" src="../dist/images/home/lilo.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">May 23 2025 | PG-13 | Adventure, Comedy, Family, Live Action, Science Fiction </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=KurP5wvFq70" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck44.jpg')",
    },
    page4: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/karate.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">May 30 2025 | PG-13 | Action, Adventure, Drama </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=uPzOyzsnmio" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck55.jpg')",
    },
    page5: {
      html: `
       <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/dragon.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">June 13, 2025 | PG-13 | Adventure, Fantasy </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=5lzoxHSn0C0&t=3s" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck66.jpg')",
    },
  };

  links.forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault(); 
      const page = link.dataset.page;

      if (pages[page]) {
        content.innerHTML = pages[page].html;

        
        body.style.backgroundImage = pages[page].background;
        body.style.backgroundSize = "cover"; 
      }
    });
  });
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("watch-now-btn")) {
      event.preventDefault(); // Prevent default link behavior
      let url = event.target.getAttribute("href");
  
      // Fix: Encode the title properly if not already encoded
      if (url.includes("title=")) {
        let parts = url.split("title=");
        let encodedTitle = encodeURIComponent(parts[1]); // Encode the movie title
        url = parts[0] + "title=" + encodedTitle; // Reconstruct URL
      }
  
      window.location.href = url; // Navigate to the PHP page
    }
  });
  
});
























