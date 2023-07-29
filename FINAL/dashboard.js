let popup = document.getElementById("thankyou");

function openMessage() {
    popup.classList.add("open-popup");
}

function closeMessage() {
    popup.style.display = "none";
}

function liveSearch() {
    let searches = document.querySelectorAll(".query");
    let search_query = document.getElementById("searchInput").value;

    for (var i = 0; i < searches.length; i++) {
        if (searches[i].innerText.toLowerCase().includes(search_query.toLowerCase())) {
            searches[i].classList.remove("is-hidden");
        } else {
            searches[i].classList.add("is-hidden");
        }
    }
}

let typingTimer;        
let typeInterval = 500; // Half a second
let searchInput = document.getElementById('searchInput');

searchInput.addEventListener('keyup', () => {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(liveSearch, typeInterval);
});