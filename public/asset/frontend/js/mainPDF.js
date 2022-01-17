class Main {
    pdfDoc = null;
    pageNum = 1;
    numPages = 0;

    constructor(_url, _selector) {
        this.selector = _selector;
        this.url = _url;
        this.getData(1);
    }

    getData(pageNum) {
        pdfjsLib.getDocument(this.url)
            .promise.then(res => {
                this.pdfDoc = res;
                this.numPages = this.pdfDoc.numPages;
                this.renderPage(pageNum);
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
}
