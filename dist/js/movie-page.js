
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
    genre: "Animation, Action, Adventure, Science Fiction"
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
  "HacksawRidge": {
    title: "Hacksaw Ridge",
    image: "/dist/images/movie-play/img17.jpg",
    description: "Hacksaw Ridge is based on the true story of Desmond Doss, a U.S. Army medic who served in the Battle of Okinawa during World War II. Doss, a devout Seventh-day Adventist, refuses to carry a weapon due to his religious beliefs but is determined to save lives on the battlefield. His bravery and heroism lead to him becoming the first conscientious objector to receive the Medal of Honor.",
    cast: [
      { name: "Andrew Garfield", role: "Desmond Doss", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Vince Vaughn", role: "Sgt. Howell", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Sam Worthington", role: " Captain Glover", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Luke Bracey", role: "Smitty Ryker", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "November 4, 2016",
    languages: "English",
    ratings: "4.7 out of 5",
    genre: "Biography, Drama, War"
  },
  "TopGunMaverick": {
    title: "Top Gun: Maverick",
    image: "/dist/images/movie-play/img18.jpg",
    description: "Top Gun: Maverick follows Pete Maverick Mitchell, now a seasoned Navy captain, who is tasked with training a new generation of Top Gun pilots for a dangerous mission. As Maverick confronts his past and faces the challenges of being an instructor, he forms a bond with Lt. Bradley Rooster Bradshaw, the son of his late friend Goose.",
    cast: [
      { name: "Tom Cruise", role: "Maverick", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Miles Teller", role: "Rooster", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Jennifer Connelly", role: "Penny Benjamin", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Jon Hamm", role: "Cyclone", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "May 27, 2022",
    languages: "English, with dubbed versions in various languages",
    ratings: "4.7 out of 5",
    genre: "Action, Drama, Thriller"
  },
  "Scarface": {
    title: "Scarface",
    image: "/dist/images/movie-play/img19.jpg",
    description: "Scarface tells the story of Tony Montana, a Cuban immigrant who rises to power in the Miami drug trade. Through ambition, violence, and betrayal, Montana becomes a ruthless drug lord, ultimately leading to his downfall. The film explores themes of power, greed, and corruption.",
    cast: [
      { name: "Al Pacino", role: " Tony Montana", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Michelle Pfeiffer", role: "Elvira Hancock", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Steven Bauer", role: "Manny Ribera", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Robert Loggia", role: "Frank Lopez", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 9, 1983",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Crime, Drama, Thriller"
  },
  "GoodWillHunting": {
    title: "Good Will Hunting",
    image: "/dist/images/movie-play/img20.jpg",
    description: "Good Will Hunting follows Will Hunting, a janitor at MIT who is also a self-taught mathematical genius. After assaulting a police officer, Will avoids jail time by studying mathematics and undergoing therapy. With the help of his therapist, Sean Maguire, Will confronts his troubled past and his fear of reaching his full potential.",
    cast: [
      { name: "Matt Damon", role: " Will Hunting", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Robin Williams", role: " Sean Maguire", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Ben Affleck", role: " Chuckie Sullivan", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Minnie Driver", role: "Skylar", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 5, 1997",
    languages: "English",
    ratings: "4.8 out of 5",
    genre: "Drama, Romance"
  },
  "Joker": {
    title: "Joker",
    image: "/dist/images/movie-play/img21.jpg",
    description: "Joker is an origin story about Arthur Fleck, a failed comedian and mentally ill man living in Gotham City. Struggling with rejection, isolation, and poverty, Arthur’s descent into madness transforms him into the infamous criminal mastermind known as the Joker. The film explores themes of mental illness, societal neglect, and the impact of trauma.",
    cast: [
      { name: "Joaquin Phoenix", role: "Joker", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Robert De Niro", role: "Murray Franklin", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Zazie Beetz", role: "Sophie Dumond", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Frances Conroy", role: "Penny Fleck", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "October 4, 2019",
    languages: "English",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Thriller"
  },
  "TheTrumanShow": {
    title: "The Truman Show",
    image: "/dist/images/movie-play/img21.jpg",
    description: "The Truman Show follows Truman Burbank, an ordinary man who unknowingly lives his entire life as the star of a 24/7 televised reality show. As Truman begins to notice oddities in his surroundings, he starts to question the nature of his reality and seeks to escape the world created for him by the show's producers.",
    cast: [
      { name: "Jim Carrey", role: "Truman Burbank", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Laura Linney", role: "Meryl Burbank", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Ed Harris", role: "Christof", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Noah Emmerich", role: "Marlon", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "June 5, 1998",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Drama, Science Fiction, Comedy"
  },
  "Togo": {
    title: "Togo",
    image: "/dist/images/movie-play/img23.jpg",
    description: "Togo is based on the true story of the 1925 serum run to Nome, Alaska, also known as the Great Race of Mercy. The film focuses on the bond between sled dog Togo and his owner, Leonhard Seppala. Togo, despite being small and considered too old, leads the team on a dangerous and heroic journey to deliver life-saving medicine to a town plagued by a diphtheria outbreak.",
    cast: [
      { name: "Willem Dafoe", role: " Leonhard Seppala", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Julianne Nicholson", role: " Constance Seppala", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Christopher Heyerdahl", role: "Walt", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Michael Gaston", role: "Jocko", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 20, 2019",
    languages: "English",
    ratings: "4.5 out of 5",
    genre: "Adventure, Drama, Family"
  },
  "Prisoners": {
    title: "Prisoners",
    image: "/dist/images/movie-play/img24.jpg",
    description: "Prisoners is a psychological thriller about a father, Keller Dover, whose daughter and her friend go missing. As the police investigation stalls, Dover takes matters into his own hands and kidnaps a man he believes knows where the girls are. The film delves into themes of morality, justice, and the lengths a parent will go to for their child.",
    cast: [
      { name: "Hugh Jackman", role: "Keller Dover", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Jake Gyllenhaal", role: " Detective Loki", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Viola Davis", role: "Nancy Birch", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Maria Bello", role: "Grace Dover", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "September 20, 2013",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Crime, Drama, Mystery, Thriller"
  },
  "WALLE": {
    title: "WALL·E",
    image: "/dist/images/movie-play/img25.jpg",
    description: "WALL·E is an animated science fiction film set in a distant future where Earth has been abandoned due to pollution and waste. WALL·E, a lonely garbage-compacting robot, spends his days cleaning up the planet. His life changes when he discovers a small plant and meets EVE, a sleek robot sent to find signs of life. The two embark on an adventure that could change the fate of humanity.",
    cast: [
      { name: "Ben Burtt", role: "WALL·E", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Elissa Knight", role: "EVE ", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Jeff Garlin", role: " M-O", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "John Ratzenberger", role: "John", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "June 27, 2008",
    languages: "English",
    ratings: "4.8 out of 5",
    genre: "Animation, Adventure, Family, Science Fiction"
  },
  "Oppenheimer": {
    title: "Oppenheimer",
    image: "/dist/images/movie-play/img26.jpg",
    description: "Oppenheimer is a biographical drama about J. Robert Oppenheimer, the theoretical physicist who is credited with being the father of the atomic bomb for his role in the Manhattan Project. The film delves into his personal and professional life, the moral dilemmas surrounding the development of nuclear weapons, and the complex legacy he left behind.",
    cast: [
      { name: "Cillian Murphy", role: "J. Robert Oppenheimer", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Emily Blunt", role: "Katherine Oppenheimer ", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Matt Damon", role: "Leslie Groves", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Robert Downey Jr", role: "Lewis Strauss", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "July 21, 2023",
    languages: "English, with dubbed versions in various languages",
    ratings: "4.7 out of 5",
    genre: "Biography, Drama, History"
  },
  "TheWolfofWallStreet": {
    title: "The Wolf of Wall Street",
    image: "/dist/images/movie-play/img27.jpg",
    description: "The Wolf of Wall Street is a biographical black comedy that follows Jordan Belfort, a stockbroker who rises to immense wealth and power through illegal and unethical practices on Wall Street. The film chronicles his excesses, scandals, and eventual downfall, highlighting the moral consequences of greed and corruption.",
    cast: [
      { name: "Leonardo DiCaprio", role: "Jordan Belfort", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Jonah Hill", role: "Donnie Azoff", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Margot Robbie", role: "Naomi Lapaglia", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Matthew McConaughey", role: " Mark Hanna", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 25, 2013",
    languages: "English",
    ratings: "4.5 out of 5",
    genre: "Biography, Comedy, Crime, Drama"
  },
  "Titanic": {
    title: "Titanic",
    image: "/dist/images/movie-play/img28.jpg",
    description: "Titanic is an epic romance and disaster film that centers around the ill-fated maiden voyage of the RMS Titanic. The story follows Jack and Rose, two passengers from different social backgrounds who fall in love during the voyage. As the ship tragically sinks after hitting an iceberg, their love is put to the ultimate test amidst the chaos and loss.",
    cast: [
      { name: "Leonardo DiCaprio", role: "Jack Dawson", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Kate Winslet", role: "Rose DeWitt Bukater", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Billy Zane", role: "Cal", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Danny Nucci", role: "Fabio", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 19, 1997",
    languages: "English",
    ratings: "4.8 out of 5",
    genre: "Drama, Romance"
  },
  "ThePursuitofHappyness": {
    title: "The Pursuit of Happyness",
    image: "/dist/images/movie-play/img29.jpg",
    description: "The Pursuit of Happyness is a biographical drama about Chris Gardner, a struggling salesman who faces homelessness while trying to provide a better life for his young son. Despite countless setbacks, Chris refuses to give up on his dreams of a better future, leading him to pursue a competitive internship at a prestigious brokerage firm.",
    cast: [
      { name: "Will Smith", role: "Chris Gardner", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Jaden Smith", role: "Christopher Gardner", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Thandie Newton", role: "Linda", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Brian Howe", role: " Jay Twistle", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 15, 2006",
    languages: "English",
    ratings: "4.7 out of 5",
    genre: "Biography, Drama"
  },
  "HowtoTrainYourDragon": {
    title: "How to Train Your Dragon",
    image: "/dist/images/movie-play/img30.jpg",
    description: "How to Train Your Dragon is an animated fantasy film about a young Viking named Hiccup who lives on the island of Berk, where dragons are seen as enemies. However, Hiccup befriends a dragon named Toothless, leading to a change in the way his village views these creatures. Together, they embark on an adventure that challenges the long-standing beliefs about dragons.",
    cast: [
      { name: "Jay Baruchel", role: "Hiccup ", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Gerard Butler", role: "Stoick the Vast", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "America Ferrera", role: "Astrid Hofferson", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Craig Ferguson", role: "Gobber the Belch", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "March 26, 2010",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Animation, Action, Adventure, Family, Fantasy"
  },
  "TheDarkKnightRises": {
    title: "The Dark Knight Rises",
    image: "/dist/images/movie-play/img31.jpg",
    description: "The Dark Knight Rises is the conclusion to Christopher Nolan's Batman trilogy. Set eight years after the events of The Dark Knight, Gotham City has been relatively peaceful. However, a new foe, Bane, emerges, aiming to destroy the city and its symbol of hope, Batman. Bruce Wayne must confront his past and physical limitations to rise again and protect Gotham.",
    cast: [
      { name: "Christian Bale", role: "Bruce Wayne ", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Tom Hardy", role: "Bane", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Anne Hathaway", role: "Selina Kyle", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Gary Oldman", role: "James Gordon", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "July 20, 2012",
    languages: "English",
    ratings: "4.5 out of 5",
    genre: "Action, Adventure, Thriller"
  },
  "RainMan": {
    title: "Rain Man",
    image: "/dist/images/movie-play/img32.jpg",
    description: "Rain Man is a drama about Charlie Babbitt, a man who discovers that his estranged brother, Raymond, is an autistic savant with exceptional memory and mathematical abilities. Charlie, initially motivated by his inheritance, embarks on a road trip with Raymond, leading to a deep bond and an emotional journey of self-discovery.",
    cast: [
      { name: "Dustin Hoffman", role: "Raymond Babbitt ", photo: "/dist/images/cast/DwayneJohnson.jpg" },
      { name: "Tom Cruise", role: "Charlie Babbitt", photo: "/dist/images/cast/ChrisEvans.jpg" },
      { name: "Valeria Golino", role: "Susanna", photo: "/dist/images/cast/LucyLiu.jpg" },
      { name: "Jerry Molen", role: " Dr. Bruner", photo: "/dist/images/cast/J.K.Simmons.jpg" }
    ],
    releaseDate: "December 16, 1988",
    languages: "English",
    ratings: "4.6 out of 5",
    genre: "Drama"
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