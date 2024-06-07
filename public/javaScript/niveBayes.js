document.getElementById('button1').addEventListener('click', multinominal);
document.getElementById('button2').addEventListener('click', bernaoli);
// document.getElementById('komentar').addEventListener('keyup', tombolAktif);

function multinominal() {
   let komentar = document.getElementById('komentar');
   if (komentar.value != '') {
      let xhr = new XMLHttpRequest();
      let params = "komentar=" + komentar.value;

      xhr.open('POST', 'http://localhost/filter_komentar/public/NilaiProbability/tambah');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function () {
         console.log(this.responseText);
      }
      xhr.send(params);
   }
}

function bernaoli() {
   let komentar = document.getElementById('komentar');
   if (komentar.value != '') {
      let xhr = new XMLHttpRequest();
      let params = "komentar=" + komentar.value;

      xhr.open('POST', 'http://localhost/filter_komentar/public/NilaiProbability/bernaoli');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function () {
         console.log(this.responseText);
      }
      xhr.send(params);
   }
}