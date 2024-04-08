function initialize() {
  document.getElementById('scroll').innerText = ' ';
  document.getElementById('preview').style.display="none";
}

function sendRequest() {
  document.getElementById('preview').style.display="none";
  var xhr = new XMLHttpRequest();
  var query = encodeURI(document.getElementById("form-input").value);
  xhr.open("GET", "proxy.php?method=/3/search/movie&query=" + query);
  xhr.setRequestHeader("Accept", "application/json");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById('movielist').innerHTML = "";
      var json = JSON.parse(this.responseText);
      var results = json.results;
      results.forEach(function(arrayItem) {
        var title = arrayItem.title;
        var releasedate= arrayItem.release_date.split("-");
        var id = arrayItem.id;
        var liTag = document.createElement('li');
        var hTag = document.createElement('h3');
        var pTag = document.createElement('p');
        liTag.setAttribute('id', id);
        hTag.innerHTML = title;
        pTag.innerHTML = releasedate[0];
        liTag.appendChild(hTag);
        liTag.appendChild(pTag);
        liTag.onclick = showDetails;
        document.getElementById('movielist').appendChild(liTag);
        document.getElementById('scroll').innerText = 'Scroll on list to view all movies';
      });
      console.log(results);
    }
  };
  xhr.send(null);
};

function showDetails() {
  // Remove the 'active' class from the previously selected movie
  var previousActiveMovie = document.querySelector('#movielist li.active');
  if (previousActiveMovie) {
    previousActiveMovie.classList.remove('active');
  }

  // Add the 'active' class to the selected movie
  var selectedMovie = this;
  selectedMovie.classList.add('active');

  var id = parseInt(selectedMovie.id);

  var xhr = new XMLHttpRequest();

  xhr.open("GET", "proxy.php?method=/3/movie/"+ id);
  xhr.setRequestHeader("Accept", "application/json");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
      var details = JSON.parse(this.responseText);
      var poster = details.poster_path;
      var homepage = details.homepage;
      var overview = details.overview;
      var title = details.title;
      var genres = new Array();
      details.genres.forEach(function (arrayItem) {
        genres.push(arrayItem.name);
      });
      console.log(details);
      document.getElementById('poster').src = "https://image.tmdb.org/t/p/w500" + poster;
      document.getElementById('overview').innerHTML = "<h4 style='margin-bottom:1px;'>Overview: </h4>" + " " + overview;
      document.getElementById('genres').innerHTML = "<h4 style='margin-bottom:1px;'>Genres: </h4>" + " " + genres.join(",");
      document.getElementById('title').innerHTML = "<h4 style='margin-bottom:1px;'>Title: </h4>" + " " + title;
    }
  };
  var xhr1 = new XMLHttpRequest();

  xhr1.open("GET", "proxy.php?method=/3/movie/" + id + "/credits");
  xhr1.setRequestHeader("Accept", "application/json");
  xhr1.onreadystatechange = function() {
    if (this.readyState == 4) {
      var details = JSON.parse(this.responseText);
      console.log(details);
      var cast = new Array();
      details.cast.forEach(function (arrayItem) {
        cast.push(arrayItem.name);
      });
      var director = details.crew[0].name;
      document.getElementById('cast').innerHTML = "<h4 style='margin-bottom:1px;'>Cast: </h4>" + " " + cast.splice(0, 5);
    }
  };
  xhr.send(null);
  xhr1.send(null);
  document.getElementById('preview').style.display = 'block';

  // Enable the save button after a short delay
  setTimeout(function() {
    document.querySelector('input[type="button"][value="Save Movie"]').disabled = false;
  }, 500);
}

function saveMovie() {
  var id = getSelectedMovieId();
  if (id === null) {
    console.error("No movie selected.");
    return;
  }

  var title = document.getElementById('title').innerText;
  var genres = document.getElementById('genres').innerText;
  var overview = document.getElementById('overview').innerText;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "save_movie.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
      console.log("Movie saved successfully.");

      // Show the success message
      showSuccessMessage();
    }
  };
  xhr.send("id=" + id + "&title=" + title + "&genres=" + genres + "&overview=" + overview);
}

function getSelectedMovieId() {
  var selectedMovie = document.querySelector('#movielist li.active');
  return selectedMovie ? parseInt(selectedMovie.getAttribute('id')) : null;
}

function showSuccessMessage() {
  var messageElement = document.getElementById("success-message");
  messageElement.style.display = "block";

  // Hide the message after 2 seconds
  setTimeout(function() {
    messageElement.style.display = "none";
  }, 2000);
}