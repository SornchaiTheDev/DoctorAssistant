$(document).ready(function() {

    $('#profile').click(function() {
        $('#profile-page').fadeIn('slow')
        $('#main').hide()
    });

    $('#close').click(function() {
        $('#profile-page').hide()
        $('#main').show()
    });

    $('#change').submit(function(e) {
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





    $('#logout').click(function() {
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
    $('#pill').css({
        'background-color': 'gold',
        'border': '2px solid transparent',
        'border-radius': '50px'
    })
    $('#map').click(function() {
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
    });
    $('#pill').click(function() {
        $('#all-pill').show()
        $('#map-page').hide()
        $('#noti-page').hide()
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
    });
    $('#notification').click(function() {
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
    });

});