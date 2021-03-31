'use strict';

{
  const open = document.getElementById('open');
  const close = document.getElementById('close');
  const modal = document.getElementById('modal');
  const mask = document.getElementById('mask');

  open.addEventListener('click', () => {
   modal.classList.remove('hidden');
   mask.classList.remove('hidden');
 });

 close.addEventListener('click', () => {
   modal.classList.add('hidden');
   mask.classList.add('hidden');
 });

 mask.addEventListener('click', () => {
   // modal.classList.add('hidden');
   // mask.classList.add('hidden');
   close.click();
 });
}

$(function ()
{
    let LaravelData = null;
    $.ajax({
        url: './addName',
        type: 'post',
    })
    .then(// 1つめは通信成功時のコールバック
    function (data) {
        LaravelData = data.name;
        console.log(data.name);
    },
    function () {
        console.error("読み込み失敗");
    });

});
