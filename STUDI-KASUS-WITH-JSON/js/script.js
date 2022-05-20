function showAllMenu(){
    $.getJSON('data/pizza.json', function (result) {
        let menu = result.menu;
        $.each(menu, function (index, data) {
            $('#daftar-menu').append(cardMenu(data));
        });
    });
}

showAllMenu();

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('h1').html(kategori);

    if(kategori == 'All Menu'){
        showAllMenu();
        return;
    }

    $.getJSON('data/pizza.json', function (result) {
        let menu = result.menu;
        let content = '';
        $.each(menu, function (index, data) {
            if (data.kategori == kategori.toLowerCase()) {
                content += cardMenu(data);
            }
        });
        $('#daftar-menu').html(content);
    });
});

const cardMenu = function (data) {
    return `<div class="col-md-4">
                    <div class="card mb-3">
                        <img src="img/menu/${data.gambar}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${data.nama}</h5>
                            <p class="card-text">${data.deskripsi}</p>
                            <h5 class="card-title">Rp. ${data.harga} -</h5>
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>`;
}