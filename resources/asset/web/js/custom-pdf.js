class generatePdf {
    pdfDoc = null;
    pageNum = 1;
    numPages = 0;
    libLoadedCallback = null;
    libLoadedCallbackB = null;

    constructor(_url, _selector, prevID, nextID, counterID) {
        this.selector = _selector;
        this.url = _url;
        this.getData(1);
        this.initializeButtons(prevID, nextID, counterID);
    }

    initializeButtons = (prevID, nextID, counterID) => {
        const prev = document.getElementById(prevID)
        const next = document.getElementById(nextID);
        const counter = document.getElementById(counterID);

        const disabledSetter = () => {
            if (this.hasNextPage()) {
                next.removeAttribute('disabled');
            } else {
                next.setAttribute('disabled', '');
            }

            if (this.pageNum > 1) {
                prev.removeAttribute('disabled');
            } else {
                prev.setAttribute('disabled', '');
            }

            if (this.numPages <= 1) {
                next.classList.add('d-none');
                prev.classList.add('d-none');
                counter.classList.add('d-none');
            } else {
                next.classList.remove('d-none');
                prev.classList.remove('d-none');
                counter.classList.remove('d-none');
            }
        };

        const renderPageNum = () => {
            counter.innerHTML = 'Strana ' + this.pageNum + ' z ' + this.numPages;
        }

        disabledSetter();
        renderPageNum();

        this.libLoadedCallback = disabledSetter;
        this.libLoadedCallbackB = renderPageNum;

        prev.addEventListener('click', () => {
            this.showPrevPage();
            disabledSetter();
            renderPageNum();
        });

        next.addEventListener('click', () => {
            this.showNextPage();
            disabledSetter();
            renderPageNum();
        });
    }

    getData(pageNum) {
        pdfjsLib.getDocument(this.url)
            .promise.then(res => {
                this.pdfDoc = res;
                this.numPages = this.pdfDoc.numPages;
                this.renderPage(pageNum);

                if (this.libLoadedCallback) {
                    this.libLoadedCallback();
                }
                if (this.libLoadedCallbackB) {
                    this.libLoadedCallbackB();
                }
            });
    }

    // Rendering default page.
    renderPage(num) {
        let canvas = document.querySelector(this.selector);
        let ctx = canvas.getContext('2d');
        let scale = 1.5;

        this.pdfDoc.getPage(num).then(pageResponse => {
            const viewport = pageResponse.getViewport({ scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderCtx = {
                canvasContext: ctx,
                viewport
            }

            pageResponse.render(renderCtx);
        })
    }

    // For Next page load.
    showNextPage() {
        if (this.pageNum >= this.numPages) {
            return;
        }
        this.pageNum++;
        this.reRenderCanvas();
    }

    // For Prev page load.
    showPrevPage() {
        if (this.pageNum <= 1) {
            return;
        }

        this.pageNum--;
        this.reRenderCanvas();
    }

    reRenderCanvas() {
        setTimeout(() => {
            this.renderPage(this.pageNum);
        }, 500);
    }

    hasNextPage() {
        return this.pageNum < this.numPages;
    }
}
