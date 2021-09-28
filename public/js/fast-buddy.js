$(document).ready(function() {
    $('#get_username').keyup(function(e) {
        if (e.keyCode == 13) {
            console.log("Enter");
            $("#get_login").click();
        }
    });

    $('#get_password').keyup(function(e) {
        if (e.keyCode == 13) {
            console.log("Enter");
            $("#get_login").click();
        }
    });
});
var home_url = $('#home_url').val();

$(function() {



    $(document)





    .on('click', '.fix_worry', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/systemToFix_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.conflict_belief', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/conflictingBelief_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.DiscoveryB', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/discoveryB_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.golden_image', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/goldenImage_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.action_plan', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/action_plan_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.goal_setting', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/goal_setting_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.DiscoveryA', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/discoveryA_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.home_work', function() {

        user_id = $(this).attr('data-id');

        date = $(this).attr('date');

        window.location.href = home_url + "yogiccoach/coaching_record?user_id=" + user_id + '&date=' + date;

    })

    .on('click', '.viewAllForm', function() {

        user_id = $(this).attr('data-id');

        //alert(user_id);

        window.location.href = home_url + "yogiccoach/form_name_list?user_id=" + user_id;

    })



    .on('click', '.paymentSave', function() {

        payFor = $('.payFor').val();

        payTo = $('.payTo').val();

        //alert(payTo);

        new_location = 'member/payment?&pfor=' + payFor + '&pto=' + payTo;

        window.location.href = home_url + new_location;

        //alert(new_location);

    })



    .on('click', '.memberDetails', function() {

        user_id = $(this).attr('data-id');

        //alert(user_id);

        window.location.href = home_url + "admin/wheellife_report?user_id=" + user_id;

    })



    .on('click', '.memberDetail', function() {

        user_id = $(this).attr('data-id');

        //alert(user_id);

        window.location.href = home_url + "yogiccoach/wheellife_report?user_id=" + user_id;

    })



    .on('click', '.genpdf', function() {

        $("#dvMsg").hide();

        data_id = $(this).attr('data-id');

        physical = $('#ise_default').val();

        emotional = $('#ise_default1').val();

        mental = $('#ise_default2').val();

        self_worth = $('#ise_default3').val();

        financial = $('#ise_default4').val();

        social = $('#ise_default5').val();

        family = $('#ise_default6').val();

        romantic = $('#ise_default7').val();

        spiritual = $('#ise_default8').val();

        growth = $('#ise_default9').val();

        //alert(data_id);

        $.ajax({
            url: home_url + "member/wheelof_record",

            data: {

                "data_id": data_id,

                "physical": physical,

                "emotional": emotional,

                "mental": mental,

                "self_worth": self_worth,

                "financial": financial,

                "social": social,

                "family": family,

                "romantic": romantic,

                "spiritual": spiritual,

                "growth": growth

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                //alert(response);

                if (response.status == '1') {

                    $("#dvMsg").show().delay(5000).queue(function(n) {

                        $(this).hide();



                    });

                } else {

                    //alert(response.message);

                }

            }

        });

        return;

    })





    .on('click', '.dateScheduleData', function() {

        //alert(home_url);

        formDate = $('#formDateSchedule').val();

        toDate = $('#toDateSchedule').val();

        //alert(toDate);

        new_location = 'yogiccoach/event_schedule_member_status?&fdate=' + formDate + '&tdate=' + toDate;

        window.location.href = home_url + new_location;

        //alert(new_location);

    })



    .on('click', '.change_tbl_row_status', function() {

        status = $(this).attr('data-status');

        fld_id = $(this).attr('data-id');

        tbl = $(this).attr('data-tbl');



        $.ajax({
            url: home_url + "admin/change_tbl_row_status",

            data: {

                "status": status,

                "fld_id": fld_id,

                "tbl": tbl

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                //alert(response);   

                if (response.status == '1') {

                    window.setTimeout(function() {

                        // Move to a new location or you can do something else

                        alert(response.message);

                        location.reload();



                    }, 1000);

                } else {

                    alert(response.message);

                }

            }

        });

    })



    .on('click', '#notes_key', function() {

        //alert();

        var tex = $(this).html();

        $('#no').val(tex);

        $("#noid").html($(this).attr("data-id"));

        $('#notes_position').hide();

    })



    .on('click', '.form_detail_member', function() {

        user_id = $(this).attr('data-id');

        window.location.href = home_url + "yogiccoach/form_name_list?user_id=" + user_id;

    })



    .on('click', '.viewHistoryName', function() {

        //alert(home_url);

        name = $('#nameView').val();

        //alert(name);die;

        new_location = 'yogiccoach/view_history_name?&name=' + name;

        window.location.href = home_url + new_location;

        //alert(new_location);

    })



    .on('click', '.dateViewData', function() {

        //alert(home_url);

        formDate = $('#formDate').val();

        toDate = $('#toDate').val();

        //alert(toDate);

        new_location = 'yogiccoach/view_history_date?&fdate=' + formDate + '&tdate=' + toDate;

        window.location.href = home_url + new_location;

        //alert(new_location);

    })





    .on('click', '.yogi_genpdf', function() {

        id = $(this).attr('data-user');

        //alert(id);

        $.ajax({
            url: home_url + "yogiccoach/genpdfyogi",

            data: { "id": id },

            dataType: "json",

            type: "POST",

            success: function(response) {

                //alert(response);   

                if (response.status == '1') {

                    //alert('hello');

                    window.location.assign(home_url + "yogiccoach/loadpdfcontent");



                    window.setTimeout('location.reload()', 3000);



                } else {

                    alert(response.message);

                }

            }

        });

    })



    .on('click', '#activate1', function() {

        data_id = $(this).attr('data-id');

        login_id = $(this).attr('login-id');

        page_name = $(this).attr('page-name');

        page_status = $(this).attr('data-status');

        //alert(data_id);

        $.ajax({
            url: home_url + "yogiccoach/page_disable",

            data: {

                "data_id": data_id,

                "login_id": login_id,

                "page_status": page_status,

                "page_name": page_name



            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                //alert(response);   

                if (response.status == '1') {

                    //window.setTimeout(function(){

                    // Move to a new location or you can do something else

                    alert(response.message);

                    location.reload();

                    //}, 1000);

                } else {

                    alert(response.message);

                }

            }

        });

    })



    .on('click', '.users_view_profile', function() {

        user_id = $(this).attr('data-id');

        window.location.href = home_url + "student/view_daha_tantra_form?user_id=" + user_id;

    })



    .on('click', '#proccess_change_password_admin', function() {

        oldpassword = $('#admin_old_password').val();

        newpassword = $('#admin_new_password').val();

        re_password = $('#admin_re_password').val();

        user_id = $(this).attr('data-id');

        alert(re_password);

        if (newpassword == re_password) {

            $.ajax({
                url: home_url + "admin/change_password",

                data: {

                    "oldpassword": oldpassword,

                    "newpassword": newpassword,

                    "user_id": user_id

                },

                dataType: "json",

                type: "POST",

                success: function(response) {

                    console.log(response);

                    if (response.status == '1') {

                        $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> ' + response.message + '</div>').show();

                        $("#error_container").show().delay(3000).queue(function(n) {

                            $(this).hide();

                        });

                    } else {

                        $('#error_container').html('<div class="alert alert-warning fade in"><strong>Error!</strong> ' + response.message + '</div>').show();

                        $("#error_container").show().delay(3000).queue(function(n) {

                            $(this).hide();

                        });

                    }

                }

            });

        } else {

            $('#error_container').html('<div class="alert alert-danger fade in"><strong>Error!</strong> New Password and Repeat Password didn\'t matched.</div>').show();

            $("#error_container").show().delay(3000).queue(function(n) {

                $(this).hide();

            });

        }

    })

    .on('click', '.continue_button', function() {

        user_id = $(this).attr('data-user');

        //alert(user_id);

        var month = $('table.cal > caption > .month ').html();

        var date = $('.cal td.active a').html();

        var time = '';

        $("#foo option:selected").each(function() {

            var values = $(this).val();

            //alert(values)

            var value = values + ',';

            time += value;



        })

        //alert(time);

        $.ajax({
            url: home_url + "yogiccoach/calendar_add",

            data: {

                "date_months": month + '-' + date,

                "time": time,

                "user_id": user_id

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                if (response.status == '1') {



                    //alert(response.message);

                    $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> ' + response.message + '</div>').show();

                    $("#error_container").show().delay(3000).queue(function(n) {

                        $(this).hide();

                    });



                    setTimeout(function() {

                        location.reload();

                    }, 3000);

                    //ocation.reload();



                } else {

                    //alert(response.message);

                    $('#error_container').html('<div class="alert alert-warning fade in"><strong></strong> ' + response.message + '</div>').show();

                    $("#error_container").show().delay(3000).queue(function(n) {

                        $(this).hide();

                    });

                }

            }

        });

    })



    .on('click', '.send_mail_user', function() {

        //alert('a');

        user_id = $(this).attr('data-user');



        subject = $('#subject').val();

        message = $('#message').val();

        email = $('#email').val();

        var month = $('table.cal > caption > .month ').html();

        var date = $('.cal td.active a').html();

        var time = $('.invite_client > h6').html();



        $.ajax({
            type: "POST",

            url: home_url + "yogiccoach/send_email",

            data: {

                "date_months": month + '-' + date,

                "user_id": user_id,

                "subject": subject,

                "message": message,

                "email": email

            },

            dataType: "json",



            success: function(response) {

                if (response.status == '1')

                {

                    alert(response.message);

                    location.reload();

                } else

                {



                }

            }

        });





    })

    .on('click', '#intention_setting_submit', function() {

        //alert('w');

        message1 = $('#message1').val();

        message2 = $('#message2').val();

        message3 = $('#message3').val();

        message4 = $('#message4').val();

        message5 = $('#message5').val();

        message6 = $('#message6').val();

        date = $('#date').val();

        topic = $('input[name=radio_select]:checked').val();

        // alert(topic);

        $.ajax({
            url: home_url + "member/intention_setting_ajax",

            data: {

                "message": message1 + message2 + message3 + message4 + message5 + message6,

                "date": date,

                "topic": topic

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    var vid = document.getElementById("videoPlay");

                    vid.load();

                    vid.play();

                    $("#videoPlay").show();

                    vid.onended = function() {
                        location.reload();
                        $('#message1').val("");

                        $('#message2').val("");

                        $('#message3').val("");

                        $('#message4').val("");

                        $('#message5').val("");

                        $('#message6').val("");



                        $("#videoPlay").hide();



                        $('#message1').focus();

                    }



                } else {

                    $('#error_container').html('<div class="alert alert-danger">' + response.message + '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div>').show();

                }

            }

        });

    })

    .on('click', '.already_submited', function() {

        $('#error_container').html('<div class="alert alert-warning fade in"><strong></strong> Form Already Submitted</div>').show();

        $("#error_container").show().delay(500).queue(function(n) {

            $(this).hide();

            //alert('alredy');

        });

    })

    .on('click', '.time_is_over', function() {

        $('#error_container').html('<div class="alert alert-warning fade in"><strong></strong> Time is Over</div>').show();

        $("#error_container").show().delay(500).queue(function(n) {

            $(this).hide();

        });

    })



    .on('click', '#das_view_form', function() {

        newdate = $('#das_view_date').val();

        new_location = 'member/daha_tantra_view?&date=' + newdate;

        window.location.href = home_url + new_location;

    })

    .on('click', '#submit_member', function() {

        newdate = $('#date_member').val();

        new_location = 'member/das_view?&date=' + newdate;

        window.location.href = home_url + new_location;

    })

    .on('click', '#submit_energy', function() {

        user_id = $(this).attr('data-user');

        newdate = $('#date_energy').val();

        new_location = 'yogiccoach/daha_tantra_form?user_id=' + user_id + '&date=' + newdate;

        window.location.href = home_url + new_location;

    })

    .on('click', '#submit_das', function() {

        user_id = $(this).attr('data-user');

        newdate = $('#date_das').val();

        new_location = 'yogiccoach/das?user_id=' + user_id + '&date=' + newdate;

        window.location.href = home_url + new_location;

    })

    .on('click', '#proccess_change_password', function() {

        oldpassword = $('#old_password').val();

        cpassword = $('#oldpassword').val();

        newpassword = $('#new_password').val();

        re_password = $('#re_password').val();

        if (oldpassword == cpassword) {

            if (newpassword == re_password) {

                $.ajax({
                    url: home_url + "member/change_password",

                    data: {

                        "oldpassword": oldpassword,

                        "newpassword": newpassword

                    },

                    dataType: "json",

                    type: "POST",

                    success: function(response) {

                        console.log(response);

                        if (response.status == '1') {

                            $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> ' + response.message + '</div>').show();

                            $("#error_container").show().delay(3000).queue(function(n) {

                                $(this).hide();

                            });

                        } else {

                            $('#error_container').html('<div class="alert alert-warning fade in"><strong>Error!</strong> ' + response.message + '</div>').show();

                            $("#error_container").show().delay(3000).queue(function(n) {

                                $(this).hide();

                            });

                        }

                    }

                });

            } else {

                $('#error_container').html('<div class="alert alert-danger fade in"><strong>Error!</strong> New Password and Repeat Password didn\'t matched.</div>').show();

                $("#error_container").show().delay(3000).queue(function(n) {

                    $(this).hide();

                });

            }

        } else {

            $('#error_container').html('<div class="alert alert-info fade in"><strong>Error!</strong> current Password not matched. Please enter correct input</div>').show();

            $("#error_container").show().delay(3000).queue(function(n) {

                $(this).hide();

            });

        }

    })

    .on('click', '#view_data', function() {

        user_id = $(this).attr('data-id');

        window.location.href = home_url + "yogiccoach/daha_tantra_form?user_id=" + user_id;

        $.ajax({
            url: home_url + "yogiccoach/daha_tantra_form",

            data: {

                "user_id": user_id,

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                if (response.status == '1') {



                    alert(response.message);



                } else {

                    alert(response.message);

                }

            }

        });

    })

    .on('click', '#view_das', function() {

        user_id = $(this).attr('data-id');

        //alert(user_id);

        window.location.href = home_url + "yogiccoach/das?user_id=" + user_id;

        $.ajax({
            url: home_url + "yogiccoach/das",

            data: {

                "user_id": user_id,

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                if (response.status == '1') {



                    alert(response.message);



                } else {

                    alert(response.message);

                }

            }

        });

    })





    .on('click', '#proccess_change_password_student', function() {

        oldpassword = $('#old_password').val();

        newpassword = $('#new_password').val();

        re_password = $('#re_password').val();

        if (newpassword == re_password) {

            $.ajax({
                url: home_url + "student/change_password",

                data: {

                    "oldpassword": oldpassword,

                    "newpassword": newpassword

                },

                dataType: "json",

                type: "POST",

                success: function(response) {

                    console.log(response);

                    if (response.status == '1') {

                        $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> ' + response.message + '</div>').show();

                        $("#error_container").show().delay(3000).queue(function(n) {

                            $(this).hide();

                        });

                    } else {

                        $('#error_container').html('<div class="alert alert-warning fade in"><strong>Error!</strong> ' + response.message + '</div>').show();

                        $("#error_container").show().delay(3000).queue(function(n) {

                            $(this).hide();

                        });

                    }

                }

            });

        } else {

            $('#error_container').html('<div class="alert alert-danger fade in"><strong>Error!</strong> New Password and Repeat Password didn\'t matched.</div>').show();

            $("#error_container").show().delay(3000).queue(function(n) {

                $(this).hide();

            });

        }

    })

    .on('click', '#get_login', function() {

        username = $('#get_username').val();

        the_password = $('#get_password').val();

        //alert(home_url);

        $("#dvMessage").removeClass("alert alert-danger");

        $("#dvMessage").html("");
        // debugger
        $.ajax({
            url: home_url + "/login/get_login",

            data: {

                "username": username,

                "password": the_password

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                // debugger

                if (response.status == '1') {

                    //window.location.href = home_url+'member'; 
                    // console.log(home_url+response.redirect);
                    window.location.href = home_url + "/" + response.redirect;

                } else {



                    $("#dvMessage").addClass("alert alert-danger");

                    $("#dvMessage").html(response.message);

                    $("#dvMessage").fadeIn();

                    return false;

                }

            }

        });

    })

    .on('click', '#newget_login', function() {

        username = $('#get_username').val();

        the_password = $('#get_password').val();

        code = $('#get_code').val();

        //alert(code); 

        $.ajax({
            url: home_url + "get_login/login",

            data: {

                "username": username,

                "password": the_password,

                "code": code

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                //alert(response);   

                if (response.status == '1') {

                    //window.location.href = home_url+'member'; 

                    window.location.href = home_url + response.redirect + '/edit_profile';

                } else {

                    alert(response.message);

                    window.location.href = home_url + response.redirect;

                }

            }

        });

    })





    .on('click', '#final_submit_energy', function() {

        message1 = $('#message1').val();

        message2 = $('#message2').val();

        message3 = $('#message3').val();

        message4 = $('#message4').val();

        message5 = $('#message5').val();

        message6 = $('#message6').val();

        date = $('#date').val();

        topic = $('input[name=radio_select]:checked').val();

        // alert(radio);

        $.ajax({
            url: home_url + "member/negative_energy",

            data: {

                "message": message1 + "\n" + message2 + "\n" + message3 + "\n" + message4 + "\n" + message5 + "\n" + message6,

                "date": date,

                "topic": topic

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    var vid = document.getElementById("videoPlay");

                    vid.load();

                    vid.play();

                    $("#videoPlay").show();

                    vid.onended = function() {
                        location.reload();
                        $('#message1').val("");

                        $('#message2').val("");

                        $('#message3').val("");

                        $('#message4').val("");

                        $('#message5').val("");

                        $('#message6').val("");



                        $("#videoPlay").hide();



                        $('#message1').focus();

                    }



                } else {

                    $('#error_container').html('<div class="alert alert-danger">' + response.message + '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div>').show();

                }

            }

        });

    })



    .on('click', '#final_submit_energy_student', function() {

        message = $('#message').val();

        day = $('#day').val();

        date = $('#date').val();

        $.ajax({
            url: home_url + "student/negative_energy",

            data: {

                "message": message,

                "day": day,

                "date": date

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    $("#fire").show().delay(9000).queue(function() {

                        $(this).hide();

                        location.reload();

                    });



                } else {

                    alert(response.message);



                }

            }

        });

    })

    .on('click', '#final_submit_energy_yogi', function() {

        message = $('#message').val();

        day = $('#day').val();

        date = $('#date').val();

        $.ajax({
            url: home_url + "yogiccoach/negative_energy",

            data: {

                "message": message,

                "day": day,

                "date": date

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    $("#fire").show().delay(9000).queue(function() {

                        $(this).hide();
                        n();

                    });



                } else {

                    alert(response.message);



                }

            }

        });

    })

    .on('click', '#next_msg', function() {

        get_limit = $(this).attr('data-limit');

        $.ajax({
            url: home_url + "member/daily_journal_scroll",

            data: {

                "data-limit": get_limit

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    alert("scroll.....");



                    window.setTimeout(function() {



                    }, 1000);

                } else {

                    alert("error");

                }

            }

        });

    })

    .on('click', '#next_msg_student', function() {

        get_limit = $(this).attr('data-limit');

        $.ajax({
            url: home_url + "student/daily_journal_scroll",

            data: {

                "data-limit": get_limit

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    alert("scroll.....");



                    window.setTimeout(function() {



                    }, 1000);

                } else {

                    alert("error");

                }

            }

        });

    })



    .on('click', '.delete_user', function() {

        tbl_name = $(this).attr('data-tbl');

        id = $(this).attr('data-id');

        //alert(tbl_name);

        $.ajax({
            url: home_url + "yogiccoach/delete_user_data",

            data: {

                "tbl_name": tbl_name,

                "fld_id": id



            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                if (response.status == '1') {

                    $(".page-content-wrap").prepend('<div class="alert alert-success"><strong>Success! </strong>' + response.message + '</div>');

                    window.setTimeout(function() {

                        // Move to a new location or you can do something else

                        location.reload();

                    }, 3000);

                } else {

                    $(".page-content-wrap").prepend('<div class="alert alert-danger"><strong>Error! </strong>' + response.message + '</div>');

                }

            }

        });

    })



    .on('click', '#get_logout', function() {

        var username = $(this).attr('username');

        $.ajax({

            url: home_url + "/login/get_logout",

            data: {

                "username": username

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                if (response.status == '1') {

                    window.setTimeout(function() {

                        // Move to a new location or you can do something else

                        window.location.href = home_url + "/login";

                    }, 0000);

                } else {

                }

            }

        });

    })



    /*.on('change','#direction', function(){

    	var dir= $(this).val();

    	var id= $( "#chakra_position option:selected" ).val();

    	

    	 $.ajax({

    	  url:home_url+"yogiccoach/get_chakra_list/", 

    						data: { 

    							"id": id,

    							"dir": dir

    						},

    						dataType: "json",

    						type: "POST",

    				        success: function(response){

    					        $('#chakra_ques').html(response.data1);

    							$('#chakra_left_right').html(response.data2);

    				        }

    			});

    			

    	

    })*/



    .on('click', '#search_key', function() {

        var id = $(this).attr('data-id');

        var dir = $("#direction:checked").val();

        $("#tag").attr("data-id", id);

        var tex = $(this).html();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_minor/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {



                $('#chakra_position').html(response.data1);

                $('#tag').val(tex);



            }

        });



    })

    .on('click', '#search_key_major', function() {

        var id = $(this).attr('data-id');

        var dir = $("#movement_position:checked").val();

        console.log("Clicked here");

        var tex = $(this).html();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_major/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#chakra_major').html(response);

                $('#chakra_movementauto').val(tex);

                $('#chakra_movementauto').attr('data-id', id);

                $('#movement_position').html("")



            }

        });



    })

    .on('change', '#movement_position', function() {

        var id = $('#chakra_movementauto').attr("data-id");

        var dir = $("#movement_position:checked").val();



        //var tex = $(this).html();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_major/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#chakra_major').html(response);

                //$('#chakra_movementauto').val(tex);



            }

        });



    })

    /*****************************************/

    .on('change', '#direction', function() {

        var id = $("#tag").attr("data-id"); //$(this).attr('data-id');

        var dir = $(this).val();

        var tex = $(this).html();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_minor/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                // console.log(response);

                $('#chakra_position').html(response.data1);

                //$('#tag').val(tex);

                //$('#chakra_position').hide();

            }

        });



    })

    /*****************************************/

    .on('change', '#chakra_movement123', function() {

        var id = $(this).val();

        var dir = $("input:checked").val();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_major/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#chakra_major').html(response);



            }

        });



    })

    .on('change', '#chakra_aura', function() {

        var id = $(this).val();

        $.ajax({

            url: home_url + "yogiccoach/get_chakra_aura/",

            data: {

                "id": id,

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#chakra_aura_explain').html(response);

                $("input[type='text']").click(function() {

                    $(this).select();

                });

            }

        });



    })

    $("#chakra_movementauto").keyup(function() {

        var id = $(this).val();

        var dir = $("#movement_position:checked").val();

        var value = $('#chakra_movementauto').val();

        //alert(dir);

        $.ajax({

            url: home_url + "yogiccoach/get_movement_list/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#movement_position').html(response);

                $("input[type='text']").click(function() {

                    $(this).select();

                });

            }

        });



    })

    $("#tag").keyup(function() {

        var id = $(this).val();

        var dir = $("input:checked").val();

        //var value=$('#tag').val();



        $.ajax({

            url: home_url + "yogiccoach/get_chakra_list/",

            data: {

                "id": id,

                "dir": dir

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#chakra_position').html(response);

                $("input[type='text']").click(function() {

                    $(this).select();

                });

            }

        });



    })





    $("#no").keyup(function() {

        var id = $(this).val();

        if ($("#noid").html() == "required")

            $("#noid").html("");

        $("#noid").css("color", "");

        $("#lblnotes").css("color", "");

        $("#lblnotes").html();





        $.ajax({

            url: home_url + "yogiccoach/get_notes_list/",

            data: {

                "id": id

            },

            dataType: "json",

            type: "POST",

            success: function(response) {

                $('#notes_position').html(response);

                $('#notes_position').show();

                $("#dropdownNotes").removeClass("hide");



            }

        });



    })







});