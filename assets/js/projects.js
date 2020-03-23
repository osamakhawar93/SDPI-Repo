var page = 1;
var sortOrder = 'DESC';
var year;
var author;
var searchQuery;
jQuery(document).ready(function($){
    projects_ajax();
})

function changePage(elem){
    page = jQuery(elem).attr('p');
    //jQuery("#page_number").val(page); 
    window.scrollTo({top: 0, behavior: 'smooth'});
    projects_ajax();
}
function onYearChange(elem){
    page = 1;
    year = elem.value;
    projects_ajax();
}
function onSortOrderChange(elem){
    page = 1
    sortOrder = elem.value;
    projects_ajax();
}
function onAuthorChange(elem){
    page = 1
    author = elem.value;
    projects_ajax();
}
function getSearhedPosts(){
    page = 1
    searchQuery = jQuery(".ajax-search>input").val();
    projects_ajax();
}
function clearAllFilters(){
    page = 1;
    sortOrder = 'DESC';
    year = '';
    author = '';
    searchQuery = '';
    jQuery("ul.filters-list li select").each(function() { this.selectedIndex = 0 });
    jQuery(".ajax-search input").val('')
    projects_ajax();
}
function projects_ajax(){
    var data = {
        action : 'projects_ajax_function',
        page:page,
        sort_order:sortOrder,
        year:year,
        author:author,
        search_query:searchQuery
    }
    jQuery.ajax({
            url: projects_ajax_url.ajax_url,
            data:data, // form data
            type:"POST", // POST
            beforeSend:function(xhr){
                //filter.find('button').text('Processing...'); // changing the button label
                jQuery(".loader").css("display","flex");
            },
            success:function(data){
                console.log(data)
                //filter.find('button').text('Apply filter'); // changing the button label back
                jQuery('#projects-content').html(data); // insert data
                jQuery(".loader").hide();
            }
    });
}