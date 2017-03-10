(function($){
  $('.fa-search').on('click', function(event) {
    event.preventDefault();
      $('.search-field').toggleClass('new-width');
      $('.search-field').focus();
    });
})(jQuery);
