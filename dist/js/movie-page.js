
const params = new URLSearchParams(window.location.search);
const movie = params.get("movie");

const moviesData = {
  "kraven": {
    title: "Kraven the Hunter",
    image: "/dist/images/movie-play/img1.jpg",
    description: "Kraven the Hunter is a 2024 action-packed origin story that delves into the transformation of Sergei Kravinoff into one of Marvel's most iconic villains.",
    cast: [
      { name: "Aaron Taylor-Johnson", role: "Kraven", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Russell Crowe", role: "Nikolai Kravinoff", photo: "/dist/images/cast/RussellCrowe.jpg" },
      { name: "Ariana DeBose", role: "Calypso Ezili", photo: "/dist/images/cast/ArianaDeBose.jpg" },
      { name: "Fred Hechinger", role: "Dmitri Kravinoff", photo: "/dist/images/cast/FredHechinger.jpg" }
    ],
    releaseDate: " December 13, 2024",
    languages: "English",
    ratings: "5.4/10 on IMDb",
    genre: "Action, Thriller"
  },
  "redone": {
    title: "Red One",
    image: "/dist/images/movie-play/img2.jpg",
    description: "Red One is a 2024 American Christmas action film directed by Jake Kasdan. The story follows Callum Drift, the head of Santa Claus's security detail, who teams up with hacker Jack O'Malley to rescue a kidnapped Santa Claus on Christmas Eve. ",
    cast: [
      { name: "Dwayne Johnson", role: "Callum Drift", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Chris Evans", role: "Jack O'Malley", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Lucy Liu", role: "Zoe Harlow", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "J.K. Simmons", role: "Santa Claus", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "November 15, 2024",
    languages: "English",
    ratings: " 2.5 out of 5",
    genre: "Action, Adventure, Comedy"
  },
  "elevation": {
    title: "Elevation",
    image: "/dist/images/movie-play/img3.jpg",
    description: "Elevation is a 2024 American post-apocalyptic action thriller directed by George Nolfi. The film is set in a world where humanity's survivors must reside above 8,000 feet to avoid deadly creatures known as Reapers. The story follows Will, a single father, who, along with scientist Nina and friend Katie, ventures below the safe altitude to secure essential supplies and search for a means to combat the Reapers. ",
    cast: [
      { name: "Anthony Mackie", role: "Will", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Morena Baccarin", role: "Nina", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Maddie Hasson", role: "Katie", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Danny Boyd Jr.", role: "Hunter", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "November 15, 2024",
    languages: "English",
    ratings: " 2.5 out of 5",
    genre: "Action, Adventure, Comedy"
  },
  "avatar": {
    title: "Avatar",
    image: "images/avatar.jpg",
    description: "An epic sci-fi film set on Pandora.",
    cast: [
      { name: "Sam Worthington", role: "Jake Sully", photo: "images/cast1.jpg" },
      { name: "Zoe Saldana", role: "Neytiri", photo: "images/cast2.jpg" },
      { name: "Sigourney Weaver", role: "Dr. Grace Augustine", photo: "images/cast3.jpg" },
      { name: "Stephen Lang", role: "Colonel Quaritch", photo: "images/cast4.jpg" },
      { name: "Michelle Rodriguez", role: "Trudy Chacón", photo: "images/cast5.jpg" }
    ],
    releaseDate: "2009",
    languages: "English, Spanish, French",
    ratings: "4.6/5",
    genre: "Action, Adventure, Fantasy"
  }
};

if (moviesData[movie]) {
  document.getElementById("movie-title").textContent = moviesData[movie].title;
  document.getElementById("movie-image").src = moviesData[movie].image;
  document.getElementById("movie-description").textContent = moviesData[movie].description;


  moviesData[movie].cast.forEach((cast, index) => {
    document.getElementById(`cast-photo-${index + 1}`).src = cast.photo;
    document.getElementById(`cast-name-${index + 1}`).textContent = cast.name;
    document.getElementById(`cast-role-${index + 1}`).textContent = `(${cast.role})`;
  });


  document.getElementById("release-date").textContent = moviesData[movie].releaseDate;
  document.getElementById("available-languages").textContent = moviesData[movie].languages;
  document.getElementById("ratings").textContent = moviesData[movie].ratings;
  document.getElementById("genre").textContent = moviesData[movie].genre;
} else {
  document.getElementById("movie-title").textContent = "Movie Not Found";
}