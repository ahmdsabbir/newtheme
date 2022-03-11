jQuery(document).ready(function($){

  $headings = $('.single-post .entry-content :header');

  if($headings.size() > 0 ) {
    
    //add ids and 'top' link to all headings
    $headings.each(function(){     
      $(this).attr("id", $(this).text().toLowerCase().replace(" ", "-"));
    });

    //add #ptoc
    $(".entry-content").prepend('<div id="ptoc"><p>Table of Content</p><ul></ul></div>');
    
    //add items    
    $('.type-post .entry-content :header').each(function(){
      $('#ptoc ul').append('<li class="ptoc-' + this.tagName.toLowerCase() + '"><a href="#' + $(this).text().toLowerCase().replace(" ", "-") + '">' + $(this).text() + '</a></li>');
    });
  
    //add 'top' link to all headings
    $headings.each(function(){            
      $(this).append(' <a class="back-to-top" href="#ptoc">[&uarr;]<a/>');
    });

  }

});