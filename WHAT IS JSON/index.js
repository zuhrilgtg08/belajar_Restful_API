const mahasiswa = {
    nama: "Ahmad Zuhril Fahrizal",
    nis: "30290",
    email: "ahmadzuhrilgtg45@gmail.com"
}

console.log(JSON.stringify(mahasiswa));

const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        let mahasiswa = JSON.parse(this.responseText);
        console.log(mahasiswa);
    }
}

xhr.open('GET', 'data.json', true);
xhr.send();

$.getJSON('data.json', function(result){
    console.log(result);
});