jQuery(document).ready(function($){
  "use strict";

  // header-search-form   

    $('.s-toggle').on('click', function(){
      $('.header-search-form').toggleClass('search-toggle');
      $(this).toggleClass("ion-search ion-close active");
    });


});