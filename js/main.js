$(document).ready(function () {
    var windowsize = $(window).width();

    /* Menu */
    $('#profile').click(function () {
        $('#profile-page').fadeIn('slow')
        $('#main').hide()

    });

    $('#close').click(function () {
        $('#profile-page').hide()
        $('#main').show()
    });

    /*Change Info*/
    $('#change').submit(function (e) {
        e.preventDefault();
        tel = $('#tel').val()
        home = $('#home').val()


        $('#status').load('db/edit_info.php', {
            telephone: tel,
            home: home
        })
        $('#status').delay(1000).fadeOut('slow')
        $('#status').val('')
        $('#status').show()

    });



    /*Logout*/

    $('#logout').click(function () {
        Swal.fire({
            title: 'ออกจากระบบ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ออกจากระบบ'
        }).then((result) => {
            if (result.value) {
                window.location.href = "index.php"

            }
        })

    });



    $('#all-pill').show()
    $('#all-pill').load('db/pill.php')

    $('#pill').css({
        'background-color': 'gold',
        'border': '2px solid transparent',
        'border-radius': '50px'
    })

    /*Map Tab */

    $('#map').click(function () {
        $('#all-pill').hide()
        $('#map-page').show()
        $('#noti-page').hide()
        $('#menu').text("ร้านยาใกล้ฉัน")
        $('#pill').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#notification').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#map').css({
            'background-color': 'gold',
            'border': '2px solid transparent',
            'border-radius': '50px'
        })
        if (windowsize > 350) {
            $("html, body").animate({ scrollTop: 0 }, 500);
        }
    });

    /*Pill Tab*/

    $('#pill').click(function () {
        $('#all-pill').show()
        $('#map-page').hide()
        $('#noti-page').hide()
        //$('#qr_code').show()
        $('#menu').text("ยาของฉัน")
        $('#map').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#notification').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#pill').css({
            'background-color': 'gold',
            'border': '2px solid transparent',
            'border-radius': '50px'
        })
        if (windowsize > 350) {
            $("html, body").animate({ scrollTop: 0 }, 500);
        }
    });

    /*Notification Tab */

    $('#notification').click(function () {
        $('#all-pill').hide()
        $('#map-page').hide()
        $('#noti-page').show()
        $('#menu').text("การแจ้งเตือน")
        $('#pill').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#map').css({
            'background-color': '',
            'border': '',
            'border-radius': ''
        })
        $('#notification').css({
            'background-color': 'gold',
            'border': '2px solid transparent',
            'border-radius': '50px'
        })
        if (windowsize > 350) {
            $("html, body").animate({ scrollTop: 0 }, 500);
        }
    });
    $('#qr-code').click(function () {
        window.location.href = "qr_code.php"
    });

});


