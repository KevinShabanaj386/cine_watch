function showEpisodes(season) {
  const episodeContainer = document.getElementById("episode-container");
  episodeContainer.innerHTML = ""; 
  let episodeCount = season === "1" ? 8 : season === "2" ? 5 : 13;
  for (let i = 1; i <= episodeCount; i++) {
    let button = document.createElement("button");
    button.className = "episode-button";
    button.innerText = `Ep ${i}`;
    episodeContainer.appendChild(button);
  }
}