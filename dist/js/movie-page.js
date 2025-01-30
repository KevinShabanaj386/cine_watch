
const params = new URLSearchParams(window.location.search);
const movie = params.get("movie");

const moviesData = {
  "MufasaTheLionKing": {
    title: "Mufasa: The Lion King",
    image: "/dist/images/movie-play/1.jpg",
    description: "Mufasa: The Lion King is a prequel to the 2019 film, exploring the origins of Mufasa, the beloved king of the Pride Lands. The story follows Mufasa's journey from an orphaned cub to a wise and just ruler, delving into his relationships with key characters and the challenges he faced to ascend to the throne.",
    cast: [
      { name: "Aaron Pierre", role: "Mufasa", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Kelvin Harrison Jr.", role: "Taka", photo: "/dist/images/cast/RussellCrowe.jpg" },
      { name: "Tiffany Boone", role: "Sarabi", photo: "/dist/images/cast/ArianaDeBose.jpg" },
      { name: "Mads Mikkelsen", role: "Obasi", photo: "/dist/images/cast/FredHechinger.jpg" }
    ],
    releaseDate: "December 20, 2024",
    languages: "English, with dubbed versions in various languages",
    ratings: "4.2 out of 5",
    genre: "Animation, Adventure, Drama"
  },
  "BadBoysRideorDie": {
    title: "Bad Boys: Ride or Die",
    image: "/dist/images/movie-play/2.jpg",
    description: "Bad Boys: Ride or Die is the fourth installment in the Bad Boys franchise, featuring detectives Mike Lowrey and Marcus Burnett. The film follows the duo as they attempt to clear the name of their late Captain, Conrad Howard, who has been falsely accused of conspiracy. Their investigation leads them into a dangerous world of drug cartels and corruption.",
    cast: [
      { name: "Will Smith", role: "Mike Lowrey", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Martin Lawrence", role: "Marcus Burnett", photo: "/dist/images/cast/RussellCrowe.jpg" },
      { name: "Vanessa Hudgens", role: "Detective Kelly", photo: "/dist/images/cast/ArianaDeBose.jpg" },
      { name: "Alexander Ludwig", role: "Agent Ryan", photo: "/dist/images/cast/FredHechinger.jpg" }
    ],
    releaseDate: "June 7, 2024",
    languages: "English, with dubbed versions in various languages",
    ratings: "4.3 out of 5",
    genre: "Action, Comedy, Crime"
  },
  "Interstellar": {
    title: "Interstellar",
    image: "/dist/images/movie-play/3.jpg",
    description: "Interstellar follows a group of astronauts who travel through a wormhole near Saturn in search of a new habitable planet for humanity, as Earth faces environmental collapse. The film explores themes of love, time, and the survival of the human race, with stunning visuals and complex scientific concepts.",
    cast: [
      { name: "Matthew McConaughey", role: "Cooper", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Anne Hathaway", role: "Dr. Amelia Brand", photo: "/dist/images/cast/RussellCrowe.jpg" },
      { name: "Jessica Chastain", role: "Murph Cooper", photo: "/dist/images/cast/ArianaDeBose.jpg" },
      { name: "Michael Caine", role: "Professor", photo: "/dist/images/cast/FredHechinger.jpg" }
    ],
    releaseDate: "November 7, 2014",
    languages: "English, with dubbed versions in various languages",
    ratings: "4.8 out of 5",
    genre: "Adventure, Drama, Science Fiction"
  },
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
  "GoodFellas": {
    title: "GoodFellas",
    image: "/dist/images/movie-play/img6.jpg",
    description: "GoodFellas (1990) is a legendary crime drama directed by Martin Scorsese, based on the true story of Henry Hill, a young man who rises through the ranks of the mob, only to see his life spiral out of control due to crime, betrayal, and drugs. The film is widely considered one of the greatest gangster movies of all time. ",
    cast: [
      { name: "Ray Liotta", role: "Henry Hill", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Robert De Niro", role: "James Conway", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Joe Pesci", role: " Tommy DeVito", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Lorraine Bracco ", role: " Karen Hill", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "September 19, 1990 ",
    languages: "English",
    ratings: " 4.8 out of 5",
    genre: "Crime, Drama, Biography"
  },
  "TheDarkKnight": {
    title: "The Dark Knight",
    image: "/dist/images/movie-play/img7.jpg",
    description: "The Dark Knight (2008) is a legendary superhero film directed by Christopher Nolan, widely regarded as one of the greatest films ever made. It follows Batman as he faces his greatest challenge yet: The Joker, a chaotic and unpredictable criminal mastermind who seeks to plunge Gotham into anarchy. ",
    cast: [
      { name: "Christian Bale", role: "Bruce Wayne", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Heath Ledger", role: "The Joker", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Aaron Eckhart", role: " Harvey Dent", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Maggie Gyllenhaal ", role: "Rachel Dawes", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "July 18, 2008",
    languages: "English",
    ratings: " 4.9 out of 5",
    genre: "Action, Crime, Drama, Thriller"
  },
  "ForrestGump": {
    title: "Forrest Gump",
    image: "/dist/images/movie-play/img8.jpg",
    description: "Forrest Gump (1994) is a heartwarming drama directed by Robert Zemeckis, based on the novel by Winston Groom. The film follows Forrest Gump, a kind-hearted man with a low IQ, who unwittingly influences major historical events while pursuing his lifelong love, Jenny Curran. His journey takes him through the Vietnam War, the civil rights movement, and even a career in shrimp fishing, all with his simple yet profound perspective on life. ",
    cast: [
      { name: "Tom Hanks", role: "Forrest Gump", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Robin Wright", role: "Jenny Curran", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Gary Sinise", role: "Lieutenant Dan Taylor", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Sally Field", role: "Mrs. Gump", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "July 6, 1994",
    languages: "English",
    ratings: " 4.8 out of 5",
    genre: "Drama, Romance, Comedy"
  },
  "FightClub": {
    title: "Fight Club",
    image: "/dist/images/movie-play/img9.jpg",
    description: "Fight Club (1999) is a mind-bending psychological thriller directed by David Fincher, based on the novel by Chuck Palahniuk. The film follows an unnamed narrator, a disillusioned office worker who forms an underground fight club with the enigmatic and rebellious Tyler Durden. As their club grows, it evolves into something far more dangerous, leading to shocking revelations. ",
    cast: [
      { name: "Edward Norton", role: "The Narrator", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Brad Pitt", role: "Tyler Durden", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Helena Bonham Carter", role: "Marla Singer", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Meat Loaf", role: "Bob", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "October 15, 1999",
    languages: "English",
    ratings: " 4.7 out of 5",
    genre: "Drama, Thriller, Psychological"
  },
  "SpiderManIntotheSpiderVerse": {
    title: "Spider-Man: Into the Spider-Verse",
    image: "/dist/images/movie-play/img10.jpg",
    description: "Spider-Man: Into the Spider-Verse follows teenager Miles Morales as he becomes Spider-Man and discovers multiple parallel universes, each with its own Spider-Man. Miles teams up with various Spider-People from different dimensions to stop a villain from destroying all of reality. ",
    cast: [
      { name: "Shameik Moore", role: " Miles Morales ", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Jake Johnson", role: "Peter B. Parker", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Hailee Steinfeld", role: "Gwen Stacy", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Mahershala Ali", role: "Uncle Aaron", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 14, 2018",
    languages: "English, Spanish, French,",
    ratings: " 4.8 out of 5",
    genre: "Animation, Action, Adventure, Science Fiction, Superhero"
  },
  "Inception": {
    title: "Inception",
    image: "/dist/images/movie-play/img11.jpg",
    description: "Inception follows a team of thieves who specialize in stealing secrets by entering people's dreams. The leader, Dom Cobb, is offered a chance to have his criminal record erased if he can successfully plant an idea into someone's subconscious—a process known as inception. ",
    cast: [
      { name: "Leonardo DiCaprio", role: " Dom Cobb", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Joseph Gordon-Levitt", role: "Arthur", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Ellen Page", role: "Ariadne", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Tom Hardy", role: "Eames", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "July 16, 2010",
    languages: "English",
    ratings: " 4.7 out of 5",
    genre: "Action, Adventure, Science Fiction, Thriller"
  },
  "Whiplash": {
    title: "Whiplash",
    image: "/dist/images/movie-play/img12.jpg",
    description: "Whiplash tells the story of a young and ambitious jazz drummer, Andrew Neiman, who strives for perfection under the intense and abusive mentorship of a ruthless music instructor, Terence Fletcher. The film explores themes of ambition, obsession, and the cost of greatness. ",
    cast: [
      { name: "Miles Teller", role: " Andrew Neiman", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "J.K. Simmons", role: "Terence Fletcher", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Melissa Benoist", role: "Nicole", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Paul Reiser", role: "Jim Neiman", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "October 10, 2014",
    languages: "English",
    ratings: "4.8 out of 5",
    genre: "Drama, Music"
  },
  "AvengersEndgame": {
    title: "Avengers: Endgame",
    image: "/dist/images/movie-play/img13.jpg",
    description: "Avengers: Endgame follows the aftermath of Avengers: Infinity War, where the Avengers must band together to undo the destruction caused by Thanos. With half of all life in the universe erased, the Avengers plan to travel through time to retrieve the Infinity Stones and reverse the damage, leading to an epic final showdown.",
    cast: [
      { name: "Robert Downey Jr", role: "Tony Stark", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "J.K. Simmons", role: "Terence Fletcher", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Chris Evans", role: "Bruce Banner", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Chris Hemsworth", role: "Thor", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "April 26, 2019",
    languages: "English, with dubbed versions in multiple languages",
    ratings: "4.9 out of 5",
    genre: "Action, Adventure, Science Fiction, Superhero"
  },
  "ShutterIsland": {
    title: "Shutter Island",
    image: "/dist/images/movie-play/img14.jpg",
    description: "Shutter Island follows U.S. Marshal Teddy Daniels as he is sent to a mental institution for the criminally insane on Shutter Island to investigate the disappearance of a patient. As he digs deeper into the case, he uncovers disturbing secrets, leading to a shocking revelation about his own identity and the island’s dark past.",
    cast: [
      { name: "Leonardo DiCaprio", role: " Teddy Daniels", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Mark Ruffalo", role: "Chuck Aule", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Ben Kingsley", role: "Dr. John Cawley", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Michelle Williams", role: "Dolores Chanal", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "February 19, 2010",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Mystery, Thriller, Psychological Horror"
  },
  "TheMatrix": {
    title: "The Matrix",
    image: "/dist/images/movie-play/img15.jpg",
    description: "The Matrix follows computer hacker Neo, who discovers that the world he lives in is a simulated reality controlled by intelligent machines. With the help of a group of rebels, Neo begins to uncover the truth about the Matrix and his role in the war between humans and machines.",
    cast: [
      { name: "Keanu Reeves", role: "Neo / Thomas Anderson", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Laurence Fishburne", role: "Morpheus", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Carrie-Anne Moss", role: "Trinity", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Hugo Weaving", role: "Agent Smith", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "March 31, 1999",
    languages: "English",
    ratings: "4.8 out of 5",
    genre: "Action, Science Fiction"
  },
  "TheDeparted": {
    title: "The Departed",
    image: "/dist/images/movie-play/img16.jpg",
    description: "The Departed is a crime thriller about an undercover cop, Billy Costigan, and a mole in the police force, Colin Sullivan, who are both trying to uncover each other’s identity while working for the Irish mob. The tense cat-and-mouse game leads to a shocking and explosive climax.",
    cast: [
      { name: "Leonardo DiCaprio", role: "Billy Costigan", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Matt Damon", role: "Colin Sullivan", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Jack Nicholson", role: "Frank Costello", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Mark Wahlberg", role: "Sergeant Dignam", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "October 6, 2006",
    languages: "English",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Thriller"
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