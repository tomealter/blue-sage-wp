jQuery(document).ready(function ($) {

  'use strict';

  const gallery = $('.gallery');

  if (gallery.length) {
    const thumbnail = $('.gallery__thumbnail');
    const close = $('.modal__close');


    // FUNCTION - CLOSE MODAL
    const closeModal = function () {
      $('.modal').removeClass('is-active');
      $('body').removeClass('no-scroll');
      $(document).unbind('click');
      $(document).unbind('keyup');
    }


    // FUNCTION - ACTIVATE MODAL
    const activateModal = function(modal, index) {
      const slider = modal.find('.slider');

      modal.addClass('is-active');
      $('body').addClass('no-scroll');
      
      // Go to selected image in slider
      slider.slick('slickGoTo', index);

      setTimeout(function () {
        // Close modal if user clicks outside the video container
        $(document).one('click', function clickAway(e) {
          if (e.target.closest('.modal__content')) {
            $(document).one('click', clickAway);
          } else {
            closeModal();
          }
        });

        // Close modal if user presses escape key
        $(document).one('keyup', function keyboardPress(e) {
          if (e.key === "Escape") {
            closeModal();
            // Unbind the document.one('click') set above
            $(document).unbind('click');
          }
          else {
            $(document).one('keyup', keyboardPress);
          }
        });
      }, 0);
    }


    // On thumbnail click, activate the modal
    thumbnail.on('click', function (e) {
      e.preventDefault();
      const index = $(this).attr('data-index') - 1;
      const modal = $(this).parents('.gallery').find('.modal');
      activateModal(modal, index);
    });

    // On close button click, close modal
    close.on('click', function(e) {
      e.preventDefault();
      closeModal();
    });
  
    
    // Initiate slider
    $('.slider').slick({
      lazyLoad: 'ondemand',
      dots: false,
      infinite: true,
      fade: true,
      speed: 300,
      slidesToShow: 1
    });
  
  }

});