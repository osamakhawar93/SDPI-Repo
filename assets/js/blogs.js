var page = 1;
var sortOrder = 'DESC';
var year;
var author;
var searchQuery;
jQuery(document).ready(function($){
    blogs_ajax();
})

function changePage(elem){
    page = jQuery(elem).attr('p');
    //jQuery("#page_number").val(page); 
    window.scrollTo({top: 0, behavior: 'smooth'});
    blogs_ajax();
}
function onYearChange(elem){
    page = 1;
    year = elem.value;
    blogs_ajax();
}
function onSortOrderChange(elem){
    page = 1
    sortOrder = elem.value;
    blogs_ajax();
}
function onAuthorChange(elem){
    page = 1
    author = elem.value;
    blogs_ajax();
}
function getSearhedPosts(){
    page = 1
    searchQuery = jQuery(".ajax-search>input").val();
    blogs_ajax();
}
function clearAllFilters(){
    page = 1;
    sortOrder = 'DESC';
    year = '';
    author = '';
    searchQuery = '';
    jQuery("ul.filters-list li select").each(function() { this.selectedIndex = 0 });
    jQuery(".ajax-search input").val('')
    blogs_ajax();
}
function blogs_ajax(){
    var data = {
        action : 'blogs_ajax_function',
        page:page,
        sort_order:sortOrder,
        year:year,
        author:author,
        search_query:searchQuery
    }
    jQuery.ajax({
            url: blogs_ajax_url.ajax_url,
            data:data, // form data
            type:"POST", // POST
            beforeSend:function(xhr){
                //filter.find('button').text('Processing...'); // changing the button label
                jQuery(".loader").css("display","flex");
            },
            success:function(data){
                console.log(data)
                //filter.find('button').text('Apply filter'); // changing the button label back
                jQuery('#blogs-content').html(data); // insert data
                jQuery(".loader").hide();
            }
    });
}