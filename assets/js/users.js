jQuery(document).ready(function () {
    jQuery(".user_more").click(function (e) {
        jQuery("#user_data").html('');
        jQuery(".loader").show();

        e.preventDefault();
        user_id = jQuery(this).attr("data-user_id");
        jQuery.ajax({
            type : "GET",
            dataType : "json",
            timeout: 10000,
            url : 'https://jsonplaceholder.typicode.com/users/'+user_id,
            success:function (response) {
                html = '<span class="outer-span">User ID : <span>'+response.id+'</span></span>'
                html += '<span class="outer-span">Name :<span>'+response.name+'</span></span>'
                html += '<span class="outer-span">Username : <span>'+response.username+'</span></span>'
                html += '<span class="outer-span">E - Mail : <span>'+response.email+'</span></span>'
                html += '<span class="outer-span">Address : <span>'+response.address.street+' , '
                html += response.address.suite+' , '
                html += response.address.city+' , '
                html += response.address.zipcode+'</span></span>'
                html += '<span class="outer-span">Phone : <span>'+response.phone+'</span></span>'
                html += '<span class="outer-span">Website : <span>'+response.website+'</span></span>'
                html += '<span class="outer-span">Company : <span>'+response.company.name+'</span></span>'
                jQuery(".loader").hide();
                jQuery("#user_data").html(html);
            },
            error:function (jqXHR, textStatus, error) {
                html = '<span>'+error+'</span><br>'
                jQuery(".loader").hide();
                jQuery("#user_data").html(html);

            },
            fail:function (xhr, textStatus, errorThrown) {
                html = '<span>'+'Request time out. Please try again'+'</span><br>'
                jQuery(".loader").hide();
                jQuery("#user_data").html(html);
            }
        });
    });
});