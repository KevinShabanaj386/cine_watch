const params = new URLSearchParams(window.location.search);
const show = params.get("show");

const showsData = {
  "PeakyBlinders": {
    title: "Peaky Blinders",
    image: "/dist/images/show-play/3.jpg",
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
      { name: "Cillian Murphy", role: "Thomas Shelby", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Paul Anderson", role: "Arthur Shelby", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Helen McCrory ", role: "Polly Gray", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Tommy Flanagan", role: "Finn Shelby", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 12, 2013",
    ratings: "4.7 out of 5",
    genre: "Crime, Drama, Historical Fiction, Thriller",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "BreakingBad": {
    title: "Breaking Bad",
    image: "/dist/images/show-play/2.jpg",
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
      { name: "Bryan Cranston", role: "Walter White", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Aaron Paul", role: "Jesse Pinkman", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Anna Gunn", role: "Skyler White", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Dean Norris", role: "Hank Schrader", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 20, 2008",
    ratings: "5 out of 5",
    genre: "Crime, Drama, Thriller, Neo-Western",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "SquidGame": {
    title: "Squid Game",
    image: "/dist/images/show-play/1.jpg",
    description: "A South Korean survival thriller where 456 financially struggling contestants participate in deadly children's games for a chance to win a massive cash prize. As the games progress, alliances, betrayals, and moral dilemmas unfold in this intense and thought-provoking series.",
    seasons: {
      1: 11,
      2: 8,
    },
    languages: "Korean",
    cast: [
      { name: "Lee Jung-jae", role: "Seong Gi-hun", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Park Hae-soo", role: "Cho Sang-woo", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Wi Ha-joon", role: "Hwang Jun-ho", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Jung Ho-yeon", role: "Kang Sae-byeok", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on September 17, 2021",
    ratings: "4.8 out of 5",
    genre: "Thriller, Drama, Survival, Mystery",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
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
  "TheLastofUs": {
    title: "The Last of Us",
    image: "/dist/images/show-play/img3.jpg",
    description: "Based on the critically acclaimed video game, The Last of Us follows Joel, a hardened survivor, as he escorts Ellie, a teenage girl immune to a deadly fungal outbreak, across a post-apocalyptic United States. The series explores themes of survival, morality, and the emotional bonds that form in a broken world.",
    seasons: {
      1: 9
    },
    languages: "English, Spanish, French",
    cast: [
      { name: "Pedro Pascal", role: "Joel Miller", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Bella Ramsey", role: "Ellie Williams", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Anna Torv", role: "Tess Servopoulos", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Gabriel Luna", role: "Tommy Miller", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on January 15, 2023",
    ratings: "4.7 out of 5",
    genre: "Post-Apocalyptic, Drama, Thriller, Action, Horror",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "TheOffice": {
    title: "The Office",
    image: "/dist/images/show-play/img4.jpg",
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
      { name: "Steve Carell", role: "Michael Scott", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "John Krasinski", role: "Jim Halpert", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Rainn Wilson", role: "Dwight Schrute", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Jenna Fischer", role: "Pam Beesly", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on March 24, 2005",
    ratings: "4.8 out of 5",
    genre: "Comedy, Mockumentary, Workplace Sitcom",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "Sherlock": {
    title: "Sherlock",
    image: "/dist/images/show-play/img5.jpg",
    description: "A modern adaptation of Sir Arthur Conan Doyle’s famous detective stories, Sherlock follows Sherlock Holmes, a brilliant but socially awkward detective, and his loyal friend Dr. John Watson as they solve complex crimes in present-day London. The series is known for its fast-paced storytelling, sharp dialogue, and intricate mysteries.",
    seasons: {
      1: 3,
      2: 3,
      3: 3,
      4: 3
    },
    languages: "English",
    cast: [
      { name: "Benedict Cumberbatch", role: "Sherlock Holmes", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Martin Freeman", role: "Dr. John Watson", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Andrew Scott", role: "Jim Moriarty", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Mark Gatiss", role: "Mycroft Holmes", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on July 25, 2010",
    ratings: "4.7 out of 5",
    genre: "Crime, Mystery, Thriller, Drama",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "House": {
    title: "House",
    image: "/dist/images/show-play/img6.jpg",
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
      { name: "Hugh Laurie", role: "Dr. Gregory House", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Lisa Edelstein", role: "Dr. Lisa Cuddy", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Robert Sean Leonard", role: "Dr. James Wilson", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Omar Epps", role: "Dr. Eric Foreman", photo: "/dist/images/cast/AaronTaylor.jpg" }
    ],
    releaseDate: "Premiered on November 16, 2004",
    ratings: "4.7 out of 5",
    genre: "Medical Drama, Mystery, Procedural",
    watchLink: "/watch-show.html?show=RickandMorty"
  },
  "INVINCIBLE": {
    title: "INVINCIBLE",
    image: "/dist/images/show-play/img7.jpg",
    description: "An animated superhero series based on the comic book by Robert Kirkman. The story follows Mark Grayson, a teenager who discovers he has superpowers and trains under his father, Omni-Man, the world’s most powerful hero. As Mark grows into his role as a superhero, he uncovers dark secrets that shake his perception of heroism and his family.",
    seasons: {
      1: 8,
      2: 8
    },
    languages: "English",
    cast: [
      { name: "Steven Yeun", role: "Mark Grayson", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "J.K. Simmons", role: "Nolan Grayson", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Sandra Oh", role: "Debbie Grayson", photo: "/dist/images/cast/AaronTaylor.jpg" },
      { name: "Gillian Jacobs", role: "Eve ", photo: "/dist/images/cast/AaronTaylor.jpg" }
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
