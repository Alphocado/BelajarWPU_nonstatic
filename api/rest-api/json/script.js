// let mahasiswa = {
//   nama : "Udin",
//   nrp : "3485765",
//   email : "udin@gmail.com"
// }

// console.log(JSON.stringify(mahasiswa));

// CARA VANILA
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
//   if ( xhr.readyState == 4 && xhr.status == 200 ) {

//     // bentuk string
//     // let mahasiswa = this.responseText;

//     // bentuk object
//     let mahasiswa = JSON.parse(this.responseText);

//     console.log(mahasiswa);
//   }
// }
// // asynchronus
// xhr.open('GET', 'coba.json', true);
// xhr.send();


// CARA JQUERY
$.getJSON('coba.json', function ( data ) {
  console.log(data);
});
