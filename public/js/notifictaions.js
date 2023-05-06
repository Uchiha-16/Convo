//dropdown notifictaion bar
$(document).ready(function () {
    $('#notification').click(function () {
        // alert("Hello");
        $.ajax({
            url: URLROOT + '/Notification/show',
            dataType: 'html',
            success: function (results) {
                $('#notificationBlock').html(results);
            }
        });
    });
}
);


//get Notification Count
$(document).ready(function () {
    $.ajax({
        url: URLROOT + '/Notification/getCount',
        dataType: 'html',
        success: function (results) {
            $('#notificationCount').html(results);
        }
    });
}
);
