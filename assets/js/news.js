var page = 1;
var sortOrder = 'DESC';
var categoryId;
var year;
var author;
var searchQuery;
var FromDate;
var ToDate;

jQuery( function($) {
    var todateTemp;
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 12,
          changeYear: true
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          var d = new Date(getDate( this )),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();
  
          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;
  
              FromDate = year+month+day;
              news_ajax()
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 12,
        changeYear: true
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );

        var d = new Date(getDate( this )),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

            ToDate = year+month+day;
        news_ajax()
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
      return date;
    }
});

jQuery(document).ready(function($){
    news_ajax();
    $("#from,#to").datepicker().datepicker("setDate", new Date());
})

function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
}

function changePage(elem){
    page = jQuery(elem).attr('p');
    //jQuery("#page_number").val(page); 
    window.scrollTo({top: 0, behavior: 'smooth'});
    news_ajax();
}
function onYearChange(elem){
    page = 1;
    year = elem.value;
    news_ajax();
}
function onSortOrderChange(elem){
    page = 1
    sortOrder = elem.value;
    news_ajax();
}
function onCategoryChange(elem){
  page = 1;
  categoryId = elem.value;
  news_ajax();
}
function onAuthorChange(elem){
    page = 1
    author = elem.value;
    news_ajax();
}
function getSearhedPosts(){
    page = 1
    searchQuery = jQuery(".ajax-search>input").val();
    news_ajax();
}
function clearAllFilters(){
    page = 1;
    sortOrder = 'DESC';
    year = '';
    author = '';
    searchQuery = '';
    categoryId = '';
    FromDate = '';
    ToDate = '';
    jQuery("#from").datepicker('setDate', null);
    jQuery("#to").datepicker('setDate', null);

    jQuery("ul.filters-list li select").each(function() { this.selectedIndex = 0 });
    jQuery(".ajax-search input").val('')
    news_ajax();
}
function news_ajax(){
    var data = {
        action : 'news_ajax_function',
        page:page,
        sort_order:sortOrder,
        year:year,
        author:author,
        category_id:categoryId,
        search_query:searchQuery,
        ToDate:ToDate,
        FromDate:FromDate
    }
    jQuery.ajax({
            url: news_ajax_url.ajax_url,
            data:data, // form data
            type:"POST", // POST
            beforeSend:function(xhr){
                //filter.find('button').text('Processing...'); // changing the button label
                jQuery(".loader").css("display","flex");
            },
            success:function(data){
                console.log(data)
                //filter.find('button').text('Apply filter'); // changing the button label back
                jQuery('#news-content').html(data); // insert data
                jQuery(".loader").hide();
            }
    });
}