document.addEventListener("DOMContentLoaded", () => {
  const content = document.getElementById("content");
  const links = document.querySelectorAll("[data-page]");
  const body = document.body;
  
  const pages = {
    home: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/avangers.png" alt="avengers">
          </div>
          <div class="movie-info">
            <p class="kategorit">2023 | PG-13 | 2h 29min | Action/Sci-fi</p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=6ZfuNTqbHE8" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck1.jpg')",
    },
    page1: {
      html: `
       <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/deadpool.png" alt="deadpool">
          </div>
          <div class="movie-info">
           <p class="kategorit">2024 | R | 2h 7min | Action/Comedy </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=73_1biulkYk" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck2.jpg')",
    },
    page2: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/gladiator.png" alt="title">
          </div>
          <div class="movie-info">
           <p class="kategorit">2024 | R | 2h 28min | Action/Adventure </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=4rgYUipGJNo" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck3.jpg')",
    },
    page3: {
      html: `
        <div class="card">
          <div class="title">
             <img class="titulli" src="../dist/images/home/sonic.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">2024 | PG-13 | 1h 50min | Action/Comedy </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=qSu6i2iFMO0" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck4.jpg')",
    },
    page4: {
      html: `
        <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/spider.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">2021 | PG-13 | 2h 28min | Action/Sci-fi </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=JfVOs4VSpmA" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck5.jpg')",
    },
    page5: {
      html: `
       <div class="card">
          <div class="title">
            <img class="titulli" src="../dist/images/home/godfather.png" alt="title">
          </div>
          <div class="movie-info">
          <p class="kategorit">1972 | R | 2h 55min | Crime </p>
          </div>
          <div class="description">
            <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
          </div>
            <div class="watch-now">
              <a href="https://www.youtube.com/watch?v=UaVTIH8mujA" class="watch-now-btn watch-now-red">Trailer</a>
            </div>
          </div>
        </div>`,
      background: "url('../dist/images/home/bck6.jpg')",
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
























