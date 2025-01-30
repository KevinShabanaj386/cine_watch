const params = new URLSearchParams(window.location.search);
const show = params.get("show");

const showsData = {
  "RickandMorty": {
    title: "Rick and Morty",
    image: "/dist/images/show-play/img1.jpg",
    description: "A sci-fi animated series that follows the misadventures of an eccentric, alcoholic scientist, Rick Sanchez, and his good-hearted but easily distressed grandson, Morty Smith. The show explores parallel universes, extraterrestrial worlds, and bizarre adventures that often lead to dark and thought-provoking consequences.",
    seasons: {
      1: 11,
      2: 10,
      3: 10,
      4: 10,
      5: 10,
      6: 10,
      7: 10
    },
    languages: "English, Albanian, Russian",
    cast: [
      { name: "Justin Roiland", role: "Rick Sanchez", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Chris Parnell", role: "Jerry Smith", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Spencer Grammer", role: "Summer Smith", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Sarah Chalke", role: "Beth Smith", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "December 2, 2013",
    ratings: "4.9 out of 5",
    genre: "Animated, Sci-Fi, Comedy, Adventure, Dark Humor",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheSopranos": {
    title: "The Sopranos",
    image: "/dist/images/show-play/img2.jpg",
    description: "A groundbreaking drama series that follows the life of Tony Soprano, a New Jersey mob boss, as he tries to balance his criminal empire with his personal life. The show delves into Tony’s struggles with family, mental health, and his position as a mafia leader, exploring themes of power, loyalty, and the American dream.",
    seasons: {
      1: 13,
      2: 13,
      3: 12,
      4: 13,
      5: 9,
      6: 21
    },
    languages: "English",
    cast: [
      { name: "James Gandolfini", role: "Tony Soprano", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Edie Falco", role: "Carmela Soprano", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Michael Imperioli", role: "Christopher Moltisanti", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Lorraine Bracco", role: "Dr. Jennifer Melfi", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 10, 1999",
    ratings: "5 out of 5",
    genre: "Crime, Drama, Psychological Thriller",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
};


if (showsData[show]) {
  const showData = showsData[show];

  document.getElementById("show-title").textContent = showData.title;
  document.getElementById("show-image").src = showData.image;
  document.getElementById("show-description").textContent = showData.description;
  document.getElementById("languages").textContent = showData.languages;
  document.getElementById("ratings").textContent = showData.ratings;
  document.getElementById("genre").textContent = showData.genre;
  
  
  document.getElementById("release-date").textContent = showData.releaseDate;

  
  const castContainer = document.getElementById("cast-container");
  showData.cast.forEach((castMember) => {
    const castItem = document.createElement("div");
    castItem.classList.add("cast-item");

    const castImg = document.createElement("img");
    castImg.classList.add("cast-photo");
    castImg.src = castMember.photo;
    castImg.alt = castMember.name;

    const castNameRole = document.createElement("div");
    castNameRole.classList.add("emrat");
    
    const castName = document.createElement("p");
    castName.textContent = castMember.name;

    const castRole = document.createElement("p");
    castRole.textContent = `(${castMember.role})`;

    castNameRole.appendChild(castName);
    castNameRole.appendChild(castRole);
    
    castItem.appendChild(castImg);
    castItem.appendChild(castNameRole);

    castContainer.appendChild(castItem);
  });

  
  const seasonDropdown = document.getElementById("season");
  for (let season in showData.seasons) {
    let option = document.createElement("option");
    option.value = season;
    option.textContent = `Season ${season}`;
    seasonDropdown.appendChild(option);
  }

  
  seasonDropdown.addEventListener('change', function() {
    showEpisodes(seasonDropdown.value);
  });

  
  showEpisodes(1);

} else {
  document.getElementById("show-title").textContent = "Show Not Found";
}


function showEpisodes(season) {
  const episodeContainer = document.getElementById("episode-container");
  episodeContainer.innerHTML = "";  

  const episodeCount = showsData[show].seasons[season]; 

  
  for (let i = 1; i <= episodeCount; i++) {
    let button = document.createElement("button");
    button.className = "episode-button";
    button.innerText = `Ep ${i}`;
    episodeContainer.appendChild(button);
  }
}
