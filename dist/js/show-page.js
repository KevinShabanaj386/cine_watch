document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("season").addEventListener("change", function () {
      let episodeContainer = document.getElementById("episode-container");
      episodeContainer.innerHTML = "";

      let selectedOption = this.options[this.selectedIndex];
      let episodeCount = selectedOption.getAttribute("data-episodes");

      if (episodeCount) {
          for (let i = 1; i <= episodeCount; i++) {
              let button = document.createElement("button");
              button.innerText = `Episode ${i}`;
              button.classList.add("episode-button");
              episodeContainer.appendChild(button);
          }
      }
  });
});




/*const params = new URLSearchParams(window.location.search);
const show = params.get("show");

const showsData = {
  "PeakyBlinders": {
    title: "Peaky Blinders",
    image: "../dist/images/show-play/3.jpg",
    description: "Set in post-World War I Birmingham, England, Peaky Blinders follows the Shelby crime family, led by the ambitious and cunning Thomas Shelby. The show delves into the family's rise to power as they navigate politics, law enforcement, and rival gangs in the early 20th century. Known for its stylish presentation, complex characters, and gripping storylines.",
    seasons: {
      1: 6,
      2: 6,
      3: 6,
      4: 6,
      5: 6,
      6: 6
    },
    languages: "English",
    cast: [
      { name: "Cillian Murphy", role: "Thomas Shelby", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Paul Anderson", role: "Arthur Shelby", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Helen McCrory ", role: "Polly Gray", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Tommy Flanagan", role: "Finn Shelby", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 12, 2013",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Historical Fiction, Thriller",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "BreakingBad": {
    title: "Breaking Bad",
    image: "../dist/images/show-play/2.jpg",
    description: "A critically acclaimed crime drama about Walter White, a high school chemistry teacher turned methamphetamine manufacturer after being diagnosed with terminal cancer. As he partners with a former student, Jesse Pinkman, to enter the drug trade, Walter's descent into criminality and moral corruption becomes both compelling and tragic.",
    seasons: {
      1: 13,
      2: 8,
      3: 13,
      4: 13,
      5: 16
    },
    languages: "English",
    cast: [
      { name: "Bryan Cranston", role: "Walter White", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Aaron Paul", role: "Jesse Pinkman", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Anna Gunn", role: "Skyler White", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Dean Norris", role: "Hank Schrader", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 20, 2008",
    ratings: "5 out of 5",
    genre: "Crime, Drama, Thriller, Neo-Western",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "SquidGame": {
    title: "Squid Game",
    image: "../dist/images/show-play/1.jpg",
    description: "A South Korean survival thriller where 456 financially struggling contestants participate in deadly children's games for a chance to win a massive cash prize. As the games progress, alliances, betrayals, and moral dilemmas unfold in this intense and thought-provoking series.",
    seasons: {
      1: 11,
      2: 8,
    },
    languages: "Korean",
    cast: [
      { name: "Lee Jung-jae", role: "Seong Gi-hun", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Park Hae-soo", role: "Cho Sang-woo", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Wi Ha-joon", role: "Hwang Jun-ho", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Jung Ho-yeon", role: "Kang Sae-byeok", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 17, 2021",
    ratings: "4.8 out of 5",
    genre: "Thriller, Drama, Survival, Mystery",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "RickandMorty": {
    title: "Rick and Morty",
    image: "../dist/images/show-play/img1.jpg",
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
      { name: "Justin Roiland", role: "Rick Sanchez", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Chris Parnell", role: "Jerry Smith", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Spencer Grammer", role: "Summer Smith", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Sarah Chalke", role: "Beth Smith", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "December 2, 2013",
    ratings: "4.9 out of 5",
    genre: "Animated, Sci-Fi, Comedy, Adventure, Dark Humor",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheSopranos": {
    title: "The Sopranos",
    image: "../dist/images/show-play/img2.jpg",
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
      { name: "James Gandolfini", role: "Tony Soprano", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Edie Falco", role: "Carmela Soprano", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Michael Imperioli", role: "Christopher Moltisanti", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Lorraine Bracco", role: "Dr. Jennifer Melfi", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 10, 1999",
    ratings: "5 out of 5",
    genre: "Crime, Drama, Psychological Thriller",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheLastofUs": {
    title: "The Last of Us",
    image: "../dist/images/show-play/img3.jpg",
    description: "Based on the critically acclaimed video game, The Last of Us follows Joel, a hardened survivor, as he escorts Ellie, a teenage girl immune to a deadly fungal outbreak, across a post-apocalyptic United States. The series explores themes of survival, morality, and the emotional bonds that form in a broken world.",
    seasons: {
      1: 9
    },
    languages: "English, Spanish, French",
    cast: [
      { name: "Pedro Pascal", role: "Joel Miller", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Bella Ramsey", role: "Ellie Williams", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Anna Torv", role: "Tess Servopoulos", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Gabriel Luna", role: "Tommy Miller", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 15, 2023",
    ratings: "4.7 out of 5",
    genre: "Post-Apocalyptic, Drama, Thriller, Action, Horror",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheOffice": {
    title: "The Office",
    image: "../dist/images/show-play/img4.jpg",
    description: "A mockumentary-style sitcom set in the Scranton, Pennsylvania branch of the Dunder Mifflin paper company. The series follows the daily lives of its quirky employees, led by the clueless but lovable boss, Michael Scott. The show is known for its hilarious workplace antics, awkward humor, and heartwarming moments.",
    seasons: {
      1: 6,
      2: 22,
      3: 25,
      4: 19,
      5: 28,
      6: 26,
      7: 26,
      8: 24,
      9: 25
    },
    languages: "English",
    cast: [
      { name: "Steve Carell", role: "Michael Scott", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "John Krasinski", role: "Jim Halpert", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Rainn Wilson", role: "Dwight Schrute", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Jenna Fischer", role: "Pam Beesly", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on March 24, 2005",
    ratings: "4.8 out of 5",
    genre: "Comedy, Mockumentary, Workplace Sitcom",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "Sherlock": {
    title: "Sherlock",
    image: "../dist/images/show-play/img5.jpg",
    description: "A modern adaptation of Sir Arthur Conan Doyle’s famous detective stories, Sherlock follows Sherlock Holmes, a brilliant but socially awkward detective, and his loyal friend Dr. John Watson as they solve complex crimes in present-day London. The series is known for its fast-paced storytelling, sharp dialogue, and intricate mysteries.",
    seasons: {
      1: 3,
      2: 3,
      3: 3,
      4: 3
    },
    languages: "English",
    cast: [
      { name: "Benedict Cumberbatch", role: "Sherlock Holmes", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Martin Freeman", role: "Dr. John Watson", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Andrew Scott", role: "Jim Moriarty", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Mark Gatiss", role: "Mycroft Holmes", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on July 25, 2010",
    ratings: "4.7 out of 5",
    genre: "Crime, Mystery, Thriller, Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "House": {
    title: "House",
    image: "../dist/images/show-play/img6.jpg",
    description: "A medical drama centered around Dr. Gregory House, a brilliant but misanthropic diagnostician who leads a team of doctors at Princeton-Plainsboro Teaching Hospital. House is known for his unconventional methods, sarcasm, and addiction to painkillers, but his genius in solving medical mysteries makes him indispensable.",
    seasons: {
      1: 22,
      2: 24,
      3: 24,
      4: 16,
      5: 24,
      6: 22,
      7: 23,
      8: 22
    },
    languages: "English, German, Italian",
    cast: [
      { name: "Hugh Laurie", role: "Dr. Gregory House", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Lisa Edelstein", role: "Dr. Lisa Cuddy", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Robert Sean Leonard", role: "Dr. James Wilson", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Omar Epps", role: "Dr. Eric Foreman", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on November 16, 2004",
    ratings: "4.7 out of 5",
    genre: "Medical Drama, Mystery, Procedural",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "INVINCIBLE": {
    title: "INVINCIBLE",
    image: "../dist/images/show-play/img7.jpg",
    description: "An animated superhero series based on the comic book by Robert Kirkman. The story follows Mark Grayson, a teenager who discovers he has superpowers and trains under his father, Omni-Man, the world’s most powerful hero. As Mark grows into his role as a superhero, he uncovers dark secrets that shake his perception of heroism and his family.",
    seasons: {
      1: 8,
      2: 8
    },
    languages: "English",
    cast: [
      { name: "Steven Yeun", role: "Mark Grayson", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "J.K. Simmons", role: "Nolan Grayson", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Sandra Oh", role: "Debbie Grayson", photo: "../dist/images/cast/AaronTaylor.jpg" },
      { name: "Gillian Jacobs", role: "Eve ", photo: "../dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on March 26, 2021",
    ratings: "4.8 out of 5",
    genre: "Superhero, Action, Drama, Sci-Fi, Animation",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "Toradora": {
    title: "Toradora!",
    image: "/dist/images/show-play/img8.jpg",
    description: "A romantic comedy anime that follows Ryuuji Takasu, a kind-hearted but intimidating-looking high school student, and Taiga Aisaka, a short-tempered yet adorable girl. The two form an unlikely friendship to help each other pursue their respective crushes, but their relationship becomes more complicated as they grow closer.",
    seasons: {
      1: 25
    },
    languages: "Japanese (original), with dubbed versions in English, Spanish, French, and German.",
    cast: [
      { name: "Junji Majima", role: "Ryuuji Takasu", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Rie Kugimiya", role: "Taiga Aisaka", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Yui Horie", role: "Minori Kushieda", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Hirofumi Nojima", role: "Yuusaku Kitamura ", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on October 2, 2008",
    ratings: "4.7 out of 5",
    genre: "Romance, Comedy, Slice of Life, Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheRookie": {
    title: "The Rookie",
    image: "/dist/images/show-play/img9.jpg",
    description: "A crime drama following John Nolan, a 40-year-old man who, after a life-changing event, pursues his dream of becoming a police officer. As the oldest rookie in the Los Angeles Police Department, he must prove himself while facing challenges from criminals, colleagues, and his own self-doubt.",
    seasons: {
      1: 20,
      2: 20,
      3: 14,
      4: 22,
      5: 22,
      6: 10
    },
    languages: "English",
    cast: [
      { name: "Nathan Fillion", role: "John Nolan", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Alyssa Diaz", role: "Angela Lopez", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Richard T. Jones", role: "Sergeant Wade Grey", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Melissa O’Neil", role: " Lucy Chen ", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on October 16, 2018",
    ratings: "4.4 out of 5",
    genre: "Crime, Drama, Action, Police Procedural",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheBoys": {
    title: "The Boys",
    image: "/dist/images/show-play/img10.jpg",
    description: "A dark and gritty superhero series set in a world where superheroes, or Supes, are corrupt corporate-backed celebrities rather than noble heroes. A vigilante group called The Boys fights to expose and take down the most dangerous of them, including Homelander, the psychopathic leader of The Seven. The show blends intense action, dark humor, and social commentary.",
    seasons: {
      1: 8,
      2: 8,
      3: 8
    },
    languages: "English",
    cast: [
      { name: "Karl Urban", role: " Billy Butcher", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Jack Quaid", role: "Hughie Campbell", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Antony Starr", role: "Homelander", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Erin Moriarty", role: "Annie January", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on July 26, 2019",
    ratings: "4.8 out of 5",
    genre: "Superhero, Action, Drama, Dark Comedy, Sci-Fi",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "GameofThrones": {
    title: "Game of Thrones",
    image: "/dist/images/show-play/img11.jpg",
    description: "An epic fantasy drama based on A Song of Ice and Fire by George R.R. Martin. The series follows noble families fighting for control of the Iron Throne in the Seven Kingdoms of Westeros while an ancient threat rises in the North. The show is known for its complex characters, political intrigue, large-scale battles, and shocking plot twists.",
    seasons: {
      1: 10,
      2: 10,
      3: 10,
      4: 10,
      5: 10,
      6: 10,
      7: 7,
      8: 6
    },
    languages: "English",
    cast: [
      { name: "Kit Harington", role: "Jon Snow", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Emilia Clarke", role: "Daenerys Targaryen", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Peter Dinklage", role: "Tyrion Lannister", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Lena Headey", role: "Cersei Lannister", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on April 17, 2011",
    ratings: "4.6 out of 5",
    genre: "Fantasy, Drama, Adventure, Action",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "PrisonBreak": {
    title: "Prison Break",
    image: "/dist/images/show-play/img12.jpg",
    description: "A high-stakes action thriller following Michael Scofield, a genius structural engineer who deliberately gets himself imprisoned to break his wrongfully convicted brother, Lincoln Burrows, out of death row. As they execute the daring escape, they uncover a vast conspiracy that threatens their lives.",
    seasons: {
      1: 22,
      2: 22,
      3: 13,
      4: 24,
      5: 9
    },
    languages: "English",
    cast: [
      { name: "Wentworth Miller", role: "Michael Scofield", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Dominic Purcell", role: "Lincoln Burrows", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Sarah Wayne", role: "Dr. Sara Tancredi", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Robert Knepper", role: "T-Bag", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on August 29, 2005",
    ratings: "4.5 out of 5",
    genre: "Action, Crime, Thriller, Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "Snowfall": {
    title: "Snowfall",
    image: "/dist/images/show-play/img13.jpg",
    description: "A gripping crime drama set in 1980s Los Angeles, Snowfall explores the early days of the crack cocaine epidemic and its impact on the city. The series follows Franklin Saint, a young entrepreneur who enters the drug trade, alongside a CIA operative, a Mexican crime family, and a wrestler-turned-enforcer, all navigating the dangerous world of narcotics and power struggles.",
    seasons: {
      1: 10,
      2: 10,
      3: 10,
      4: 10,
      5: 10,
      6: 10
    },
    languages: "English",
    cast: [
      { name: "Damson Idris", role: "Franklin Saint", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Carter Hudson", role: "Teddy McDonald", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Sergio Peris-Mencheta", role: "El Oso", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Isaiah John", role: "Leon Simmons", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on July 5, 2017",
    ratings: "4.6 out of 5",
    genre: "Crime, Drama, Thriller",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheWitcher": {
    title: "The Witcher",
    image: "/dist/images/show-play/img14.jpg",
    description: "A dark fantasy series based on The Witcher book series by Andrzej Sapkowski. The show follows Geralt of Rivia, a monster hunter (Witcher) with supernatural abilities, as he navigates a world filled with war, magic, and destiny. Alongside powerful sorceress Yennefer and princess Ciri, he battles both monstrous creatures and human corruption.",
    seasons: {
      1: 8,
      2: 8,
      3: 8
    },
    languages: "English",
    cast: [
      { name: "Henry Cavill ", role: "Geralt of Rivia", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Anya Chalotra", role: "Yennefer of Vengerberg", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Freya Allan", role: "Princess Cirilla", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Joey Batey", role: "Jaskier", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on December 20, 2019",
    ratings: "4.4 out of 5",
    genre: "Fantasy, Adventure, Action, Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "Friends": {
    title: "Friends",
    image: "/dist/images/show-play/img15.jpg",
    description: "A legendary sitcom following six friends—Rachel, Ross, Monica, Chandler, Joey, and Phoebe—as they navigate love, careers, and hilarious misadventures in New York City. Known for its witty humor, unforgettable catchphrases, and heartwarming moments, Friends remains one of the most beloved TV shows of all time.",
    seasons: {
      1: 24,
      2: 24,
      3: 24,
      4: 24,
      5: 24,
      6: 24,
      7: 24,
      8: 24,
      9: 24,
      10: 18
    },
    languages: "English",
    cast: [
      { name: "Jennifer Aniston ", role: "Rachel Green", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Courteney Cox ", role: "Monica Geller", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Matthew Perry", role: "Chandler Bing", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "David Schwimmer", role: "Ross Geller", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 22, 1994",
    ratings: "4.8 out of 5",
    genre: "Comedy, Sitcom, Romance",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "ModernFamily": {
    title: "Modern Family",
    image: "/dist/images/show-play/img16.jpg",
    description: "A mockumentary-style sitcom that follows the lives of three interconnected families: the Pritchetts, the Dunphys, and the Tuckers. With a mix of humor and heartfelt moments, the show explores family dynamics, generational gaps, and modern relationships in a comedic yet relatable way.",
    seasons: {
      1: 22,
      2: 23,
      3: 24,
      4: 22,
      5: 23,
      6: 24,
      7: 22,
      8: 23,
      9: 24,
      10: 22,
      11: 18
    },
    languages: "English",
    cast: [
      { name: "Ed O’Neill ", role: "Jay Pritchett", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Sofía Vergara ", role: "Gloria Pritchett", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Ty Burrell", role: "Phil Dunphy", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Julie Bowen", role: "Claire Dunphy", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 23, 2009",
    ratings: "4.7 out of 5",
    genre: "Comedy, Sitcom, Mockumentary",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "BetterCallSaul": {
    title: "Better Call Saul",
    image: "/dist/images/show-play/img17.jpg",
    description: "A prequel to Breaking Bad, Better Call Saul chronicles the transformation of Jimmy McGill, a struggling public defender, into the morally ambiguous lawyer Saul Goodman. Set before the events of Breaking Bad, the series explores Jimmy's complicated relationships with his brother Chuck, his future associate Kim Wexler, and the criminal underworld.",
    seasons: {
      1: 10,
      2: 10,
      3: 10,
      4: 10,
      5: 10,
      6: 13
    },
    languages: "English",
    cast: [
      { name: "Bob Odenkirk", role: "Jimmy McGill", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Rhea Seehorn", role: "Kim Wexler", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Jonathan Banks", role: "Mike Ehrmantraut", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Michael McKean", role: "Chuck McGill", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on February 8, 2015",
    ratings: "4.9 out of 5",
    genre: "Crime, Drama, Legal Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheSpectacularSpiderMan": {
    title: "The Spectacular Spider-Man",
    image: "/dist/images/show-play/img18.jpg",
    description: "An animated series that follows the life of Peter Parker as he balances his responsibilities as a high school student and his alter ego, Spider-Man. The show focuses on his journey of learning to be a hero, facing iconic villains like the Green Goblin and Doctor Octopus, while dealing with personal struggles and relationships. Known for its faithful adaptation of Spider-Man’s character and comic book roots, the series is highly regarded by fans.",
    seasons: {
      1: 13,
      2: 13
    },
    languages: "English",
    cast: [
      { name: "Josh Keaton", role: "Peter Parker", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Lacey Chabert", role: "Gwen Stacy", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "James Arnold", role: "Harry Osborn", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Gregg Berger", role: " Ben Parker", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on March 8, 2008",
    ratings: "4.7 out of 5",
    genre: "Action, Animation, Superhero, Adventure",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "BandofBrothers": {
    title: "Band of Brothers",
    image: "/dist/images/show-play/img19.jpg",
    description: "A World War II miniseries based on the non-fiction book by Stephen E. Ambrose, Band of Brothers follows the journey of Easy Company, part of the 506th Parachute Infantry Regiment of the 101st Airborne Division, from D-Day through to the war’s end. It focuses on the soldiers' bonds, hardships, and experiences, highlighting the brutal realities of war and their courage in the face of adversity.",
    seasons: {
      1: 10
    },
    languages: "English",
    cast: [
      { name: "Damian Lewis ", role: "Major Richard", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Ron Livingston", role: " Captain Lewis Nixon", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Donnie Wahlberg", role: "Lieutenant Carwood Lipton", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "David Schwimmer", role: " Captain Herbert Sobel", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 9, 2001",
    ratings: "5 out of 5",
    genre: "Drama, War, History, Military",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TeenWolf": {
    title: "Teen Wolf",
    image: "/dist/images/show-play/img20.jpg",
    description: "A supernatural teen drama that follows Scott McCall, a high school student who is bitten by a werewolf and discovers a world of supernatural creatures. As Scott tries to balance his normal life with his new identity as a werewolf, he faces numerous challenges, including dangerous enemies, complicated relationships, and the constant threat of his powers spiraling out of control.",
    seasons: {
      1: 12,
      2: 12,
      3: 24,
      4: 12,
      5: 20,
      6: 20
    },
    languages: "English",
    cast: [
      { name: "Tyler Posey ", role: "Scott McCall", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Dylan O'Brien", role: "Stiles Stilinski", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Crystal Reed", role: "Allison Argent", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Tyler Hoechlin", role: "Derek Hale", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on June 5, 2011",
    ratings: "4.3 out of 5",
    genre: "Drama, War, History, Military",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  TheGoodDoctor: {
    title: "The Good Doctor",
    image: "/dist/images/show-play/img21.jpg",
    description: "A medical drama series that follows Dr. Shaun Murphy, a young surgical resident with autism and savant syndrome. Despite his exceptional medical abilities, Shaun faces challenges in communicating with others and earning the trust of his colleagues. The series explores his personal and professional journey as he navigates the medical world.",
    seasons: {
      1: 18,
      2: 18,
      3: 20,
      4: 20,
      5: 18,
      6: 22,
      7: 10
    },
    languages: "English",
    cast: [
      { name: "Freddie Highmore", role: "Dr. Shaun Murphy", photo: "/dist/images/cast/FreddieHighmore.jpg" },
      { name: "Antonia Thomas", role: "Dr. Claire Browne", photo: "/dist/images/cast/AntoniaThomas.jpg" },
      { name: "Hill Harper", role: "Dr. Marcus Andrews", photo: "/dist/images/cast/HillHarper.jpg" },
      { name: "Richard Schiff", role: "Dr. Aaron Glassman", photo: "/dist/images/cast/RichardSchiff.jpg" }
    ],
    releaseDate: "Premiered on September 25, 2017",
    ratings: "4.6 out of 5",
    genre: "Drama, Medical",
    watchLink: "/watch-show.html?show=TheGoodDoctor"
  },
  TheQueensGambit: {
    title: "The Queen's Gambit",
    image: "/dist/images/show-play/img22.jpg",
    description: "A captivating drama that follows the life of Beth Harmon, a young orphaned girl who discovers her extraordinary talent for chess. As she rises through the ranks of the male-dominated chess world, she struggles with personal demons, addiction, and the pressures of fame, all while trying to find her place in the world.",
    seasons: {
      1: 7
    },
    languages: "English",
    cast: [
      { name: "Anya Taylor-Joy", role: "Beth Harmon", photo: "/dist/images/cast/AnyaTaylorJoy.jpg" },
      { name: "Bill Camp", role: "Mr. Shaibel", photo: "/dist/images/cast/BillCamp.jpg" },
      { name: "Marielle Heller", role: "Alma Wheatley", photo: "/dist/images/cast/MarielleHeller.jpg" },
      { name: "Thomas Brodie-Sangster", role: "Benny Watts", photo: "/dist/images/cast/ThomasBrodieSangster.jpg" }
    ],
    releaseDate: "Premiered on October 23, 2020",
    ratings: "4.8 out of 5",
    genre: "Drama, Sport",
    watchLink: "/watch-show.html?show=TheQueensGambit"
  },
  ThePenguin: {
    title: "The Penguin",
    image: "/dist/images/show-play/img23.jpg",
    description: "A crime drama series centered on Oswald Cobblepot, aka The Penguin, from the *Batman* universe. Set in the aftermath of *The Batman* (2022), the show delves into Cobblepot’s rise within Gotham's criminal underworld and his journey to becoming a powerful figure in the city’s dark, dangerous world.",
    seasons: {
      1: 8
    },
    languages: "English",
    cast: [
      { name: "Colin Farrell", role: "Oswald Cobblepot / The Penguin", photo: "/dist/images/cast/ColinFarrell.jpg" },
      { name: "Cristo Fernández", role: "José", photo: "/dist/images/cast/CristoFernandez.jpg" },
      { name: "Clancy Brown", role: "Sal Maroni", photo: "/dist/images/cast/ClancyBrown.jpg" },
      { name: "Rhenzy Feliz", role: "Carlos", photo: "/dist/images/cast/RhenzyFeliz.jpg" }
    ],
    releaseDate: "TBD (2024)",
    ratings: "N/A (Upcoming)",
    genre: "Crime, Drama, Action",
    watchLink: "/watch-show.html?show=ThePenguin"
  },
  Lucifer: {
    title: "Lucifer",
    image: "/dist/images/show-play/img24.jpg",
    description: "Lucifer Morningstar, the Devil, abandons his throne in Hell to live in Los Angeles, where he opens a nightclub and begins working as a civilian consultant for the LAPD. As he helps solve crimes, Lucifer struggles with his identity, his relationship with his family, and the complicated feelings he has for LAPD detective Chloe Decker.",
    seasons: {
      1: 13,
      2: 18,
      3: 26,
      4: 10,
      5: 16,
      6: 10
    },
    languages: "English",
    cast: [
      { name: "Tom Ellis", role: "Lucifer Morningstar", photo: "/dist/images/cast/TomEllis.jpg" },
      { name: "Lauren German", role: "Chloe Decker", photo: "/dist/images/cast/LaurenGerman.jpg" },
      { name: "DB Woodside", role: "Amenadiel", photo: "/dist/images/cast/DBWoodside.jpg" },
      { name: "Lesley-Ann Brandt", role: "Mazikeen", photo: "/dist/images/cast/LesleyAnnBrandt.jpg" }
    ],
    releaseDate: "Premiered on January 25, 2016",
    ratings: "4.7 out of 5",
    genre: "Fantasy, Crime, Drama",
    watchLink: "/watch-show.html?show=Lucifer"
  },
  TulsaKing: {
    title: "Tulsa King",
    image: "/dist/images/show-play/img25.jpg",
    description: "After serving a 25-year prison sentence, New York mafia capo Dwight 'The General' Manfredi is sent to Tulsa, Oklahoma, to set up a new criminal empire. As he navigates the unfamiliar world of the American Midwest, he faces challenges in establishing his dominance while adjusting to the new realities of crime and power in a different landscape.",
    seasons: {
      1: 10
    },
    languages: "English",
    cast: [
      { name: "Sylvester Stallone", role: "Dwight 'The General' Manfredi", photo: "/dist/images/cast/SylvesterStallone.jpg" },
      { name: "Andrea Savage", role: "Stacy Beale", photo: "/dist/images/cast/AndreaSavage.jpg" },
      { name: "Max Casella", role: "Armand", photo: "/dist/images/cast/MaxCasella.jpg" },
      { name: "Jay Will", role: "Tyson Mitchell", photo: "/dist/images/cast/JayWill.jpg" }
    ],
    releaseDate: "Premiered on November 13, 2022",
    ratings: "4.5 out of 5",
    genre: "Crime, Drama",
    watchLink: "/watch-show.html?show=TulsaKing"
  },
  Peacemaker: {
    title: "Peacemaker",
    image: "/dist/images/show-play/img26.jpg",
    description: "Following the events of *The Suicide Squad* (2021), Peacemaker is a vigilante with a unique code of peace: achieving peace at any cost, no matter how violent. The show follows his adventures as he is recruited by a secret government team to take on dangerous missions, while dealing with his troubled past and quirky team dynamics.",
    seasons: {
      1: 8
    },
    languages: "English",
    cast: [
      { name: "John Cena", role: "Peacemaker", photo: "/dist/images/cast/JohnCena.jpg" },
      { name: "Danielle Brooks", role: "Leota Adebayo", photo: "/dist/images/cast/DanielleBrooks.jpg" },
      { name: "Freddie Stroma", role: "Vigilante", photo: "/dist/images/cast/FreddieStroma.jpg" },
      { name: "Steve Agee", role: "John Economos", photo: "/dist/images/cast/SteveAgee.jpg" }
    ],
    releaseDate: "Premiered on January 13, 2022",
    ratings: "4.6 out of 5",
    genre: "Action, Comedy, Superhero",
    watchLink: "/watch-show.html?show=Peacemaker"
  },
  HenryDanger: {
    title: "Henry Danger",
    image: "/dist/images/show-play/img27.jpg",
    description: "The series follows 13-year-old Henry Hart, who becomes the sidekick to a superhero named Captain Man. As 'Kid Danger,' Henry helps Captain Man fight villains while trying to maintain his normal life as a teenager. With his friends and family unaware of his secret identity, Henry faces the challenges of balancing crime-fighting and growing up.",
    seasons: {
      1: 25,
      2: 22,
      3: 25,
      4: 19,
      5: 22
    },
    languages: "English",
    cast: [
      { name: "Jace Norman", role: "Henry Hart / Kid Danger", photo: "/dist/images/cast/JaceNorman.jpg" },
      { name: "Cooper Barnes", role: "Ray Manchester / Captain Man", photo: "/dist/images/cast/CooperBarnes.jpg" },
      { name: "Riele Downs", role: "Charlotte Page", photo: "/dist/images/cast/RieleDowns.jpg" },
      { name: "Sean Ryan Fox", role: "Jasper Dunlop", photo: "/dist/images/cast/SeanRyanFox.jpg" }
    ],
    releaseDate: "Premiered on July 26, 2014",
    ratings: "4.5 out of 5",
    genre: "Comedy, Action, Superhero",
    watchLink: "/watch-show.html?show=HenryDanger"
  },
  Hannibal: {
    title: "Hannibal",
    image: "/dist/images/show-play/img28.jpg",
    description: "A psychological horror-thriller series that explores the complex relationship between FBI special investigator Will Graham and Dr. Hannibal Lecter, a brilliant psychiatrist and secret cannibalistic serial killer. As Will is drawn into Hannibal's dangerous web, he must navigate the blurred lines between good and evil, all while trying to solve horrifying cases.",
    seasons: {
      1: 13,
      2: 13,
      3: 13
    },
    languages: "English",
    cast: [
      { name: "Mads Mikkelsen", role: "Dr. Hannibal Lecter", photo: "/dist/images/cast/MadsMikkelsen.jpg" },
      { name: "Hugh Dancy", role: "Will Graham", photo: "/dist/images/cast/HughDancy.jpg" },
      { name: "Caroline Dhavernas", role: "Dr. Alana Bloom", photo: "/dist/images/cast/CarolineDhavernas.jpg" },
      { name: "Laurence Fishburne", role: "Jack Crawford", photo: "/dist/images/cast/LaurenceFishburne.jpg" }
    ],
    releaseDate: "Premiered on April 4, 2013",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Horror",
    watchLink: "/watch-show.html?show=Hannibal"
  },
  MrRobot: {
    title: "Mr. Robot",
    image: "/dist/images/show-play/img29.jpg",
    description: "A psychological thriller that follows Elliot Alderson, a cybersecurity engineer and hacker with dissociative identity disorder. Elliot is recruited by a mysterious anarchist known as Mr. Robot to join a group of hacktivists aiming to bring down corrupt corporations. The series explores themes of mental illness, hacking, and societal issues while keeping the audience on edge with its twists and turns.",
    seasons: {
      1: 10,
      2: 12,
      3: 10,
      4: 13
    },
    languages: "English",
    cast: [
      { name: "Rami Malek", role: "Elliot Alderson", photo: "/dist/images/cast/RamiMalek.jpg" },
      { name: "Christian Slater", role: "Mr. Robot", photo: "/dist/images/cast/ChristianSlater.jpg" },
      { name: "Carly Chaikin", role: "Darlene Alderson", photo: "/dist/images/cast/CarlyChaikin.jpg" },
      { name: "Portia Doubleday", role: "Angela Moss", photo: "/dist/images/cast/PortiaDoubleday.jpg" }
    ],
    releaseDate: "Premiered on June 24, 2015",
    ratings: "4.8 out of 5",
    genre: "Thriller, Drama, Crime",
    watchLink: "/watch-show.html?show=MrRobot"
  },
  MoneyHeist: {
    title: "Money Heist",
    image: "/dist/images/show-play/img30.jpg",
    description: "A Spanish heist crime drama that follows a mysterious mastermind known as 'The Professor' who assembles a group of eight criminals to carry out an ambitious plan: to rob the Royal Mint of Spain and print billions of euros. The show explores themes of loyalty, betrayal, and power as the criminals try to outsmart the police while keeping their identities hidden.",
    seasons: {
      1: 15,
      2: 9,
      3: 8,
      4: 8,
      5: 10
    },
    languages: "Spanish",
    cast: [
      { name: "Álvaro Morte", role: "The Professor", photo: "/dist/images/cast/ÁlvaroMorte.jpg" },
      { name: "Úrsula Corberó", role: "Tokyo", photo: "/dist/images/cast/ÚrsulaCorberó.jpg" },
      { name: "Pedro Alonso", role: "Berlin", photo: "/dist/images/cast/PedroAlonso.jpg" },
      { name: "Itziar Ituño", role: "Raquel Murillo", photo: "/dist/images/cast/ItziarItuño.jpg" }
    ],
    releaseDate: "Premiered on May 2, 2017",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Thriller",
    watchLink: "/watch-show.html?show=MoneyHeist"
  },
  WandaVision: {
    title: "WandaVision",
    image: "/dist/images/show-play/img31.jpg",
    description: "A unique blend of classic television and the Marvel Cinematic Universe, *WandaVision* follows Wanda Maximoff and Vision as they live in an idyllic suburban setting, but strange occurrences hint that things are not as perfect as they seem. As they navigate their surreal reality, they uncover deeper mysteries, blending the world of superheroes with 1950s-style sitcoms.",
    seasons: {
      1: 9
    },
    languages: "English",
    cast: [
      { name: "Elizabeth Olsen", role: "Wanda Maximoff", photo: "/dist/images/cast/ElizabethOlsen.jpg" },
      { name: "Paul Bettany", role: "Vision", photo: "/dist/images/cast/PaulBettany.jpg" },
      { name: "Kathryn Hahn", role: "Agnes", photo: "/dist/images/cast/KathrynHahn.jpg" },
      { name: "Teyonah Parris", role: "Monica Rambeau", photo: "/dist/images/cast/TeyonahParris.jpg" }
    ],
    releaseDate: "Premiered on January 15, 2021",
    ratings: "4.6 out of 5",
    genre: "Superhero, Mystery, Comedy, Drama",
    watchLink: "/watch-show.html?show=WandaVision"
  },
  BrooklynNineNine: {
    title: "Brooklyn Nine-Nine",
    image: "/dist/images/show-play/img32.jpg",
    description: "A comedic police procedural that follows the detectives of the 99th precinct of the NYPD, led by the lovable and immature Jake Peralta. The show combines hilarious antics with light-hearted crime-solving, showcasing the unique relationships between the precinct’s quirky staff, including Captain Holt, the no-nonsense leader, and Amy Santiago, Peralta’s hardworking partner.",
    seasons: {
      1: 22,
      2: 23,
      3: 23,
      4: 22,
      5: 22,
      6: 23,
      7: 13
    },
    languages: "English",
    cast: [
      { name: "Andy Samberg", role: "Jake Peralta", photo: "/dist/images/cast/AndySamberg.jpg" },
      { name: "Terry Crews", role: "Terry Jeffords", photo: "/dist/images/cast/TerryCrews.jpg" },
      { name: "Stephanie Beatriz", role: "Rosa Diaz", photo: "/dist/images/cast/StephanieBeatriz.jpg" },
      { name: "Andre Braugher", role: "Captain Holt", photo: "/dist/images/cast/AndreBraugher.jpg" }
    ],
    releaseDate: "Premiered on September 17, 2013",
    ratings: "4.7 out of 5",
    genre: "Comedy, Crime, Drama",
    watchLink: "/watch-show.html?show=BrooklynNineNine"
  },
  Dexter: {
    title: "Dexter",
    image: "/dist/images/show-play/img33.jpg",
    description: "Dexter Morgan is a blood-spatter analyst for the Miami Metro Police, but he leads a secret life as a vigilante serial killer, targeting criminals who have escaped justice. The show delves into Dexter's complex psyche as he struggles with his urge to kill while maintaining his facade as a normal, law-abiding citizen.",
    seasons: {
      1: 12,
      2: 12,
      3: 12,
      4: 12,
      5: 12,
      6: 12,
      7: 12,
      8: 12
    },
    languages: "English",
    cast: [
      { name: "Michael C. Hall", role: "Dexter Morgan", photo: "/dist/images/cast/MichaelCHall.jpg" },
      { name: "Jennifer Carpenter", role: "Debra Morgan", photo: "/dist/images/cast/JenniferCarpenter.jpg" },
      { name: "David Zayas", role: "Angel Batista", photo: "/dist/images/cast/DavidZayas.jpg" },
      { name: "James Remar", role: "Harry Morgan", photo: "/dist/images/cast/JamesRemar.jpg" }
    ],
    releaseDate: "Premiered on October 1, 2006",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Mystery",
    watchLink: "/watch-show.html?show=Dexter"
  },
  Loki: {
    title: "Loki",
    image: "/dist/images/show-play/img34.jpg",
    description: "The series follows Loki, the God of Mischief, after the events of *Avengers: Endgame* (2019), where he escapes with the Tesseract and creates an alternate timeline. Loki finds himself recruited by the Time Variance Authority (TVA) to help track down other dangerous variants of himself, all while confronting his own identity and purpose in the multiverse.",
    seasons: {
      1: 6
    },
    languages: "English",
    cast: [
      { name: "Tom Hiddleston", role: "Loki", photo: "/dist/images/cast/TomHiddleston.jpg" },
      { name: "Owen Wilson", role: "Mobius M. Mobius", photo: "/dist/images/cast/OwenWilson.jpg" },
      { name: "Gugu Mbatha-Raw", role: "Ravonna Renslayer", photo: "/dist/images/cast/GuguMbathaRaw.jpg" },
      { name: "Sophia Di Martino", role: "Sylvie", photo: "/dist/images/cast/SophiaDiMartino.jpg" }
    ],
    releaseDate: "Premiered on June 9, 2021",
    ratings: "4.6 out of 5",
    genre: "Action, Adventure, Fantasy",
    watchLink: "/watch-show.html?show=Loki"
  },
  AliceInBorderland: {
    title: "Alice in Borderland",
    image: "/dist/images/show-play/img35.jpg",
    description: "A thrilling survival drama that follows Arisu, a young man who finds himself transported to a parallel version of Tokyo, where he and his friends must participate in deadly games to survive. As they navigate this dystopian world, they uncover secrets about the game’s origins and struggle to find a way back to their original reality.",
    seasons: {
      1: 8,
      2: 8
    },
    languages: "Japanese",
    cast: [
      { name: "Kento Yamazaki", role: "Ryohei Arisu", photo: "/dist/images/cast/KentoYamazaki.jpg" },
      { name: "Tao Tsuchiya", role: "Usagi", photo: "/dist/images/cast/TaoTsuchiya.jpg" },
      { name: "Nijiro Murakami", role: "Chota", photo: "/dist/images/cast/NijiroMurakami.jpg" },
      { name: "Ayaka Miyoshi", role: "Karube", photo: "/dist/images/cast/AyakaMiyoshi.jpg" }
    ],
    releaseDate: "Premiered on December 10, 2020",
    ratings: "4.4 out of 5",
    genre: "Action, Thriller, Sci-Fi",
    watchLink: "/watch-show.html?show=AliceInBorderland"
  },
  Shameless: {
    title: "Shameless",
    image: "/dist/images/show-play/img36.jpg",
    description: "A dark comedy-drama that follows the dysfunctional Gallagher family, led by Frank Gallagher, a brilliant yet alcoholic father who neglects his children. The show explores the struggles of his six children as they try to survive, navigate their troubled lives, and deal with the challenges of poverty, relationships, and growing up in a rough Chicago neighborhood.",
    seasons: {
      1: 12,
      2: 12,
      3: 12,
      4: 12,
      5: 12,
      6: 12,
      7: 12,
      8: 12,
      9: 14,
      10: 12,
      11: 12
    },
    languages: "English",
    cast: [
      { name: "William H. Macy", role: "Frank Gallagher", photo: "/dist/images/cast/WilliamHMacy.jpg" },
      { name: "Emmy Rossum", role: "Fiona Gallagher", photo: "/dist/images/cast/EmmyRossum.jpg" },
      { name: "Jeremy Allen White", role: "Lip Gallagher", photo: "/dist/images/cast/JeremyAllenWhite.jpg" },
      { name: "Shameless", role: "Carl Gallagher", photo: "/dist/images/cast/Shameless.jpg" }
    ],
    releaseDate: "Premiered on January 9, 2011",
    ratings: "4.5 out of 5",
    genre: "Comedy, Drama",
    watchLink: "/watch-show.html?show=Shameless"
  },
  BlackBird: {
    title: "Black Bird",
    image: "/dist/images/show-play/img37.jpg",
    description: "A psychological crime drama that follows Jimmy Keene, a convicted drug dealer who is offered a deal to reduce his sentence by helping the FBI get a confession from a suspected serial killer, Larry Hall. As Jimmy befriends Larry, he finds himself in a dangerous game of deception, manipulation, and trust, where his own life and freedom are at stake.",
    seasons: {
      1: 6
    },
    languages: "English",
    cast: [
      { name: "Taron Egerton", role: "Jimmy Keene", photo: "/dist/images/cast/TaronEgerton.jpg" },
      { name: "Paul Walter Hauser", role: "Larry Hall", photo: "/dist/images/cast/PaulWalterHauser.jpg" },
      { name: "Ray Liotta", role: "Big Jim Keene", photo: "/dist/images/cast/RayLiotta.jpg" },
      { name: "Greg Kinnear", role: "Brian Miller", photo: "/dist/images/cast/GregKinnear.jpg" }
    ],
    releaseDate: "Premiered on July 8, 2022",
    ratings: "4.6 out of 5",
    genre: "Crime, Drama, Thriller",
    watchLink: "/watch-show.html?show=BlackBird"
  },
  You: {
    title: "You",
    image: "/dist/images/show-play/img38.jpg",
    description: "A psychological thriller that follows Joe Goldberg, a charming but dangerously obsessive man who becomes infatuated with the women he dates. As Joe's obsession grows, he takes extreme measures to insert himself into their lives, leading to dangerous consequences. The show delves into themes of love, obsession, and the dark side of human nature.",
    seasons: {
      1: 10,
      2: 10,
      3: 10,
      4: 10
    },
    languages: "English",
    cast: [
      { name: "Penn Badgley", role: "Joe Goldberg", photo: "/dist/images/cast/PennBadgley.jpg" },
      { name: "Victoria Pedretti", role: "Love Quinn", photo: "/dist/images/cast/VictoriaPedretti.jpg" },
      { name: "Elizabeth Lail", role: "Guinevere Beck", photo: "/dist/images/cast/ElizabethLail.jpg" },
      { name: "Ambyr Childers", role: "Candace Stone", photo: "/dist/images/cast/AmbyrChilders.jpg" }
    ],
    releaseDate: "Premiered on September 9, 2018",
    ratings: "4.5 out of 5",
    genre: "Thriller, Drama, Crime",
    watchLink: "/watch-show.html?show=You"
  }



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
*/