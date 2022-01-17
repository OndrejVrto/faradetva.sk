class Main {
    static pdfDoc = null;
    static pageNum = 1;
    static numPages = 0;

    constructor(_url, _selector) {
        this.selector = _selector;
        this.url = _url;
        this.getData(Main.pageNum);
    }

    getData(pageNum) {
        pdfjsLib.getDocument(this.url)
            .promise.then(res => {
                Main.pdfDoc = res;
                Main.numPages = Main.pdfDoc.numPages;
                Main.renderPage(pageNum, this.selector);
            });
    }

    // Rendering default page.
    static renderPage(num, selector) {
        let canvas = document.querySelector(selector);
        let ctx = canvas.getContext('2d');
        let scale = 1.5;

        Main.pdfDoc.getPage(num).then(pageResponse => {
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
    static showNextPage() {
        if (Main.pageNum >= Main.numPages) {
            return;
        }
        Main.pageNum++;
        Main.reRenderCanvas();
    }

    // For Prev page load.
    static showPrevPage() {
        if (Main.pageNum <= 1) {
            return;
        }

        Main.pageNum--;
        Main.reRenderCanvas();
    }

    static reRenderCanvas() {
        setTimeout(() => {
            Main.renderPage(Main.pageNum);
        }, 500);
    }
}
