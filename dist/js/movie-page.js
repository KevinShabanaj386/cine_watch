
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
      { name: "Fred Hechinger", role: "Dmitri Kravinoff", photo: "/dist/images/cast/FredHechinger.jpg" },
      { name: "Alessandro Nivola", role: "Rhino", photo: "/dist/images/cast/AlessandroNivola.jpg" }
    ],
    releaseDate: " December 13, 2024",
    languages: "English",
    ratings: "5.4/10 on IMDb",
    genre: "Action, Thriller"
  },
  "redone": {
    title: "redone",
    image: "images/inception.jpg",
    description: "A mind-bending thriller directed by Christopher Nolan.",
    cast: [
      { name: "Leonardo DiCaprio", role: "Cobb", photo: "images/cast1.jpg" },
      { name: "Joseph Gordon-Levitt", role: "Arthur", photo: "images/cast2.jpg" },
      { name: "Ellen Page", role: "Ariadne", photo: "images/cast3.jpg" },
      { name: "Tom Hardy", role: "Eames", photo: "images/cast4.jpg" },
      { name: "Cillian Murphy", role: "Robert Fischer", photo: "images/cast5.jpg" }
    ],
    releaseDate: "2010",
    languages: "English, Italian, Japanese",
    ratings: "4.5/5",
    genre: "Action, Sci-Fi, Thriller"
  },
  "interstellar": {
    title: "Interstellar",
    image: "images/interstellar.jpg",
    description: "A sci-fi journey through space and time.",
    cast: [
      { name: "Matthew McConaughey", role: "Cooper", photo: "images/cast1.jpg" },
      { name: "Anne Hathaway", role: "Brand", photo: "images/cast2.jpg" },
      { name: "Jessica Chastain", role: "Murph", photo: "images/cast3.jpg" },
      { name: "Michael Caine", role: "Professor Brand", photo: "images/cast4.jpg" },
      { name: "Mackenzie Foy", role: "Young Murph", photo: "images/cast5.jpg" }
    ],
    releaseDate: "2014",
    languages: "English, Italian, Japanese",
    ratings: "4.8/5",
    genre: "Adventure, Drama, Sci-Fi"
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