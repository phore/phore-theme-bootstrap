
document.addEventListener('load', (event) => {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
});

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});