
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
    releaseDate: "November 8, 2024",
    languages: "English",
    ratings: " 2.5 out of 5",
    genre: "Action, Thriller, Science Fiction"
  },
  "CarryOn": {
    title: "Carry-On",
    image: "/dist/images/movie-play/img4.jpg",
    description: "Carry-On is a 2024 American action thriller directed by Jaume Collet-Serra. The film follows Ethan Kopek, a young TSA agent who is blackmailed by a mysterious traveler into allowing a dangerous package onto a Christmas Eve flight, leading to a tense and suspenseful narrative. ",
    cast: [
      { name: "Taron Egerton", role: "Ethan Kopek", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Jason Bateman", role: "Ellis", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Sofia Carson", role: "Mia", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Danielle Deadwyler", role: "Detective Franklin", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 13, 2024",
    languages: "English",
    ratings: " 3.5 out of 5",
    genre: "Action, Thriller"
  },
  "SonictheHedgehog": {
    title: "Sonic the Hedgehog",
    image: "/dist/images/movie-play/img5.jpg",
    description: "Sonic the Hedgehog (2020) is a live-action/CGI hybrid adventure film based on the popular video game franchise by SEGA. The story follows Sonic, a speedy blue hedgehog who arrives on Earth and tries to escape government forces with the help of a small-town sheriff, Tom Wachowski. Meanwhile, the evil scientist Dr. Robotnik hunts Sonic, hoping to harness his powers for world domination. ",
    cast: [
      { name: "Ben Schwartz", role: "Sonic the Hedgehog", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "James Marsden", role: "Tom Wachowski", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Jim Carrey", role: " Dr. Robotnik", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Lee Majdoub ", role: "Agent Stone", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "February 14, 2020",
    languages: "English",
    ratings: " 4.2 out of 5",
    genre: "Action, Adventure, Comedy, Family"
  },
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