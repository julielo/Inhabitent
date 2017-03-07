{function($)
  $('.fa-search').on('click', function(event) {
    event.preventDefault();

      $('.search-field').toggleClass('search-width');
      $('.search-field').focus();
    });
})(jQuery);
