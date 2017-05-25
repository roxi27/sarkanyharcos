function $(selector) {
  return document.querySelector(selector);
}

$('#lista').addEventListener('click', onClick, false);

function onClick(e) {
  if (e.target.matches('li')) {
    var li = e.target;
    var id = li.getAttribute('data-id');
    console.log(id);
    ajax({
      url: 'info.php',
      getadat: 'id=' + id,
      siker: function (xhr, data) {
        console.log(data);
        var uzenet = JSON.parse(data);
       /* $('#info').innerHTML = `
          <p>${uzenet.nev}</p>
          <p>${uzenet.score}</p>
            <p>${uzenet.palya}</p>
        `;*/
      }
    });
  }
}

