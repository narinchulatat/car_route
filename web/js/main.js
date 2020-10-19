// popup เพิ่มข้อมูลในปฏิทิน
// $(function(){
//     $('#modelButton').click(function(){
//         $('.modal').modal('show')
//             .find('#modelContent')
//             .load($(this).attr('value'));
//     });
        
//     $(document).on('click','.fc-day', function(){
//         var date = $(this).attr('data-date');
//         $.get('index.php?r=rental/create',{'date':date}, function(data){
//             $('.modal').modal('show')
//             .find('#modelContent')
//             .html(data);
//         })
//     });
// });


//tooltip โชว์ข้อมูลปฏิทิน
function eventDetail(event, element) {
    var tooltip = '<div class="tooltipevent" style="width:250px;position:absolute;z-index:10001;">' +
        '<div class="panel panel-default f12p divshadow">' +
        '<div class="panel-body"><b class="f14p">' + event.title + '</b><hr>'
    '</div>' +
        '</div>' +
        '</div>';
    $("body").append(tooltip);
    $(this).mouseover(function (e) {
        $(this).css('z-index', 10000);
        $(this).css({ 'cursor': 'pointer' });
        $('.tooltipevent').fadeIn('500');
        $('.tooltipevent').fadeTo('10', 1.9);
    }).mousemove(function (e) {
        $('.tooltipevent').css('top', e.pageY + 10);
        $('.tooltipevent').css('left', e.pageX + 20);
    });
}
function eMouseremove(event, element) {
    $(".tooltipevent").css('z-index', 8);
    $('.tooltipevent').remove();
}

