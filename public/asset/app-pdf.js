function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var generatePdf = /*#__PURE__*/function () {
  function generatePdf(_url, _selector, _prevID, _nextID, _counterID) {
    var _this = this;

    _classCallCheck(this, generatePdf);

    _defineProperty(this, "pdfDoc", null);

    _defineProperty(this, "pageNum", 1);

    _defineProperty(this, "numPages", 0);

    _defineProperty(this, "libLoadedCallback", null);

    _defineProperty(this, "libLoadedCallbackB", null);

    _defineProperty(this, "initializeButtons", function (prevID, nextID, counterID) {
      var prev = document.getElementById(prevID);
      var next = document.getElementById(nextID);
      var counter = document.getElementById(counterID);

      var disabledSetter = function disabledSetter() {
        if (_this.hasNextPage()) {
          next.removeAttribute('disabled');
        } else {
          next.setAttribute('disabled', '');
        }

        if (_this.pageNum > 1) {
          prev.removeAttribute('disabled');
        } else {
          prev.setAttribute('disabled', '');
        }

        if (_this.numPages <= 1) {
          next.classList.add('d-none');
          prev.classList.add('d-none');
          counter.classList.add('d-none');
        } else {
          next.classList.remove('d-none');
          prev.classList.remove('d-none');
          counter.classList.remove('d-none');
        }
      };

      var renderPageNum = function renderPageNum() {
        counter.innerHTML = 'Strana ' + _this.pageNum + ' z ' + _this.numPages;
      };

      disabledSetter();
      renderPageNum();
      _this.libLoadedCallback = disabledSetter;
      _this.libLoadedCallbackB = renderPageNum;
      prev.addEventListener('click', function () {
        _this.showPrevPage();

        disabledSetter();
        renderPageNum();
      });
      next.addEventListener('click', function () {
        _this.showNextPage();

        disabledSetter();
        renderPageNum();
      });
    });

    this.selector = _selector;
    this.url = _url;
    this.getData(1);
    this.initializeButtons(_prevID, _nextID, _counterID);
  }

  _createClass(generatePdf, [{
    key: "getData",
    value: function getData(pageNum) {
      var _this2 = this;

      pdfjsLib.getDocument(this.url).promise.then(function (res) {
        _this2.pdfDoc = res;
        _this2.numPages = _this2.pdfDoc.numPages;

        _this2.renderPage(pageNum);

        if (_this2.libLoadedCallback) {
          _this2.libLoadedCallback();
        }

        if (_this2.libLoadedCallbackB) {
          _this2.libLoadedCallbackB();
        }
      });
    } // Rendering default page.

  }, {
    key: "renderPage",
    value: function renderPage(num) {
      var canvas = document.querySelector(this.selector);
      var ctx = canvas.getContext('2d');
      var scale = 1.5;
      this.pdfDoc.getPage(num).then(function (pageResponse) {
        var viewport = pageResponse.getViewport({
          scale: scale
        });
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        var renderCtx = {
          canvasContext: ctx,
          viewport: viewport
        };
        pageResponse.render(renderCtx);
      });
    } // For Next page load.

  }, {
    key: "showNextPage",
    value: function showNextPage() {
      if (this.pageNum >= this.numPages) {
        return;
      }

      this.pageNum++;
      this.reRenderCanvas();
    } // For Prev page load.

  }, {
    key: "showPrevPage",
    value: function showPrevPage() {
      if (this.pageNum <= 1) {
        return;
      }

      this.pageNum--;
      this.reRenderCanvas();
    }
  }, {
    key: "reRenderCanvas",
    value: function reRenderCanvas() {
      var _this3 = this;

      setTimeout(function () {
        _this3.renderPage(_this3.pageNum);
      }, 500);
    }
  }, {
    key: "hasNextPage",
    value: function hasNextPage() {
      return this.pageNum < this.numPages;
    }
  }]);

  return generatePdf;
}();
