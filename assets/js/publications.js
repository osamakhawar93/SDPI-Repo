var page = 1;
var sortOrder = 'DESC';
var categoryId;
var year;
var author;
var searchQuery;
jQuery(document).ready(function($){
    publications_ajax();
})

function changePage(elem){
    page = jQuery(elem).attr('p');
    //jQuery("#page_number").val(page); 
    window.scrollTo({top: 0, behavior: 'smooth'});
    publications_ajax();
}
function onCategoryChange(elem){
    page = 1;
    categoryId = elem.value;
    publications_ajax();
}
function onYearChange(elem){
    page = 1;
    year = elem.value;
    publications_ajax();
}
function onSortOrderChange(elem){
    page = 1
    sortOrder = elem.value;
    publications_ajax();
}
function onAuthorChange(elem){
    page = 1
    author = elem.value;
    publications_ajax();
}
function getSearhedPosts(){
    page = 1
    searchQuery = jQuery(".ajax-search>input").val();
    publications_ajax();
}
function clearAllFilters(){
    page = 1;
    sortOrder = 'DESC';
    categoryId = '';
    year = '';
    author = '';
    searchQuery = '';
    jQuery("ul.filters-list li select").each(function() { this.selectedIndex = 0 });
    jQuery(".ajax-search input").val('')
    publications_ajax();
}
function publications_ajax(){
    var data = {
        action : 'publications_ajax_function',
        page:page,
        sort_order:sortOrder,
        category_id:categoryId,
        year:year,
        author:author,
        search_query:searchQuery
    }
    jQuery.ajax({
            url: publications_ajax_url.ajax_url,
            data:data, // form data
            type:"POST", // POST
            beforeSend:function(xhr){
                //filter.find('button').text('Processing...'); // changing the button label
                jQuery(".loader").css("display","flex");
            },
            success:function(data){
                console.log(data)
                //filter.find('button').text('Apply filter'); // changing the button label back
                jQuery('#publications-content').html(data); // insert data
                jQuery(".loader").hide();
            }
    });
}