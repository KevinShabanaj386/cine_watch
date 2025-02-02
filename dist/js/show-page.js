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




