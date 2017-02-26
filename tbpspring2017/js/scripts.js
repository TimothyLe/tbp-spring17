//Target Blank replacement
$(function() { 
  $('a[href^=http]').click( function() {  
    window.open(this.href);
    return false;
  });
});
//Credit goes Badly Drawn Toys
