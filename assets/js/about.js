var page = 1;
jQuery(document).ready(function($){
    ajaxCall();
})

function showLoader(){
    jQuery(".loader").css("display","flex");
}

function hideLoader(){
    jQuery(".loader").hide();
}

function changePage(elem){
    console.log(elem);
    page = jQuery(elem).attr('p');
    //jQuery("#page_number").val(page); 
    window.scrollTo({top: 0, behavior: 'smooth'});
    ajaxCall();
}

function ajaxCall(){
    var data = {
        action : 'training_calendar_function',
        page:page
    }
    jQuery.ajax({
            url: my_ajax_object.ajax_url,
            data:data, // form data
            type:"POST", // POST
            beforeSend:function(xhr){
                //filter.find('button').text('Processing...'); // changing the button label
                jQuery(".loader").css("display","flex");
            },
            success:function(data){
                console.log(data)
                //filter.find('button').text('Apply filter'); // changing the button label back
                jQuery('body.page-id-73 .shortcode').html(data); // insert data
                jQuery(".loader").hide();
            }
    });
}