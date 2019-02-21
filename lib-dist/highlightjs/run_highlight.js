
document.addEventListener('load', (event) => {console.log("highlighter ready");
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
});