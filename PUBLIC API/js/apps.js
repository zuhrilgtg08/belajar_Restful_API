function searchMovies() {
    $('#daftar-movie').html('');

    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '7ed2710b',
            's': $('#search-input').val(),
        },
        success: function (result) {
            if (result.Response == "True") {
                let movies = result.Search;
                $.each(movies, function (index, data) {
                    $('#daftar-movie').append(cardMovies(data));
                });

                $('#search-input').val('');
            } else {
                $('#daftar-movie').html(`
                        <div class="col">
                            <h1 class="text-center">Movie ${result.Error}</h1>
                        </div>
                    `);
            }
        }
    });
}

$('#search-button').on('click', function () {
    searchMovies();
});

$('#search-input').on('keyup', function (event) {
    if (event.keyCode === 13) {
        searchMovies();
    }
});

$('#daftar-movie').on('click', '.see-detail', function () {
    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '7ed2710b',
            'i': $(this).data('imdb'),
        },
        success: function (result) {
            if (result.Response === "True") {
                $('.modal-body').html(detailModal(result));
            }
        }
    });
});

const cardMovies = function (data) {
    return `<div class="col-md-4">
                <div class="card mb-3">
                    <img src="${data.Poster}" class="card-img-top" alt="posterMovie">
                    <div class="card-body">
                        <h5 class="card-title">Title : ${data.Title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Year : ${data.Year}</h6>
                        <a href="#" class="btn btn-dark see-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-imdb="${data.imdbID}"> See More </a>
                    </div>
                </div>
            </div>`;
}

const detailModal = function (result) {
    return `<div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <img src="${result.Poster}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item"><h3>${result.Title}</h3></li>
                            <li class="list-group-item">Released : ${result.Released}</li>
                            <li class="list-group-item">Duration : ${result.Runtime}</li>
                            <li class="list-group-item">Genre : ${result.Genre}</li>
                            <li class="list-group-item">Language : ${result.Language}</li>
                            <li class="list-group-item">Country : ${result.Country}</li>
                            <li class="list-group-item">Actors : ${result.Actors}</li>
                            <li class="list-group-item">Director : ${result.Director}</li>
                            <li class="list-group-item">Rating : ${result.imdbRating}</li>
                            <li class="list-group-item">Synopsis : ${result.Plot}</li>
                        </ul>
                    </div>
                </div>
            </div>`;
}