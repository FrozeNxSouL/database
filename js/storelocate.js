const list = document.querySelector('#listview');
const map = document.querySelector('#mapview');
const listcontent = document.querySelector('#listcontent');
const mapcontent = document.querySelector('#mapcontent');

function cdlist() {
  list.style.borderBottom = '3px solid #ffc600';
  listcontent.style.display = 'grid';
  map.style.borderBottom = 'none';
  mapcontent.style.display = 'none';
}
function cdmap() {
  list.style.borderBottom = 'none';
  listcontent.style.display = 'none';
  map.style.borderBottom = '3px solid #ffc600';
  mapcontent.style.display = 'block';
}