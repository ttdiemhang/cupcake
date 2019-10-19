function showMember() {
    jQuery.ajax({
       url: '/profile',
       type: 'get',
       success: function (data) {
           console.log(data);

           var user_fullname = data.name;
           var user_email = data.email;
           var user_gender = data.gender;
           var user_address = data.address;
           var user_phone = data.phone_number;
           $('.user-fullname').html(user_fullname);
           $('.user-email').html(user_email);
           $('.user-gender').html(user_gender);
           $('.user-address').html(user_address);
           $('.user-phone').html(user_phone);

           $('#modal-profile').modal();
       },
        error: function (error) {
            console.log(error)
        },
        dataType: 'json' // json/xml/text
    });
}
