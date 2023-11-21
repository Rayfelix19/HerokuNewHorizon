


function showMore(club_id) {
    var iconOption = $('#icon_option_'+club_id);
    iconOption.toggle();
    //iconOption.show()

}
function showedit(event_id) {
  var iconOptions = $('#icon_option_'+event_id);
  iconOptions.toggle();
  //iconOption.show()

}

function showMor(User_id) {
  var iconOpt = $('#pro_pic_'+User_id);
  iconOpt.toggle();
  //iconOption.show()

}
function showMo(User_id) {
  var iconOp = $('#user_pass_'+User_id);
  iconOp.toggle();
  //iconOption.show()

}
function showM(_id) {
  var iconO = $('#deposit_'+_id);
  iconO.toggle();
  //iconOption.show()

}


$(document).on('click', function(e) {
    if (!$(e.target).closest('.icon_option').length && !$(e.target).closest('.more_icon').length) {
      $('.icon_option').hide();
    }
  });