

// inview code for fadeInInview class

jQuery('.fadeInInview').bind('inview', function (event, visible) {
  if (visible == true) {
    jQuery('.fadeInInview').addClass("animated fadeIn");
  } else {
    // element has gone out of viewport
    jQuery('.fadeInInview').removeClass("animated fadeIn");

  }
});

// inview code for slideInInview class

jQuery('.slideInRightInview').bind('inview', function (event, visible) {
  if (visible == true) {
    jQuery('.slideInRightInview').addClass("animated slideInRight");
  } else {
    // element has gone out of viewport
    jQuery('.slideInRightInview').removeClass("animated slideInRight");

  }
});

// inview code for slideInLeftInview class

jQuery('.slideInLeftInview').bind('inview', function (event, visible) {
  if (visible == true) {
    jQuery('.slideInLeftInview').addClass("animated slideInLeft");
  } else {
    // element has gone out of viewport
    jQuery('.slideInLeftInview').removeClass("animated slideInLeft");

  }
});

// inview code for slideInDown class

jQuery('.slideInDownInview').bind('inview', function (event, visible) {
  if (visible == true) {
    jQuery('.slideInDownInview').addClass("animated slideInDown");
  } else {
    // element has gone out of viewport
    jQuery('.slideInDownInview').removeClass("animated slideInDown");

  }
});