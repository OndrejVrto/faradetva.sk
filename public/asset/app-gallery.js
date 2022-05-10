$('.gallery').each(function (i, el) {
  $(el).justifiedGallery({
    rel: 'gallery-item-' + i,
    lastRow: 'nojustify',

    /* lastRow : 'center', */

    /* lastRow : 'hide',  */

    /* lastRow : 'justify', */
    rowHeight: 140,
    maxRowHeight: 200,
    margins: 4,
    border: 0
  }).on('jg.complete', function () {
    $(this).on('click', function (event) {
      event = event || window.event;
      var target = event.target || event.srcElement;
      var link = target.src ? target.parentNode : target;
      var links = this.getElementsByTagName('a');
      var options = {
        index: link,
        event: event,
        closeOnEscape: true
      };
      blueimp.Gallery(links, options);
    });
  });
});
