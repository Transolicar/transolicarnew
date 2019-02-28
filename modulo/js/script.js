function focuse(num) {
  $('#txt'+num).focus();
}

function radio(num) {
  $('input[value='+num+']').prop('checked',true);
  $('.tog').removeClass('btn-celest');
  $('.tog').addClass('btn-blancot');
  $('#rad'+num).removeClass('btn-blancot');
  $('#rad'+num).addClass('btn-celest');
}
