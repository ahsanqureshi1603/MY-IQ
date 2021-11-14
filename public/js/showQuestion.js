
// Include this file to the page after loading mathjax library to render math formulas,


/**
 * window.typesetInput function to render maths after user input, 
 * takes two agruments selector id name, value.
 * renders id name where we want to render the parsed content, value = user input value in html
 */
function decodeHtml(str) {
    var map =
    {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'"
    };
    return str.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function (m) { return map[m]; });
}
$(document).ready(function () {
    let loaded = false;
    function handleLoadedScript() {
        loaded = true;
    }

    //'question-content', classe name which we want to parse on the document
    const quesElements = $('.question-content');
    if (quesElements && quesElements.length) {
        quesElements.map((i, el) => {
            el.innerHTML = decodeHtml(el.innerHTML);
        })
    }


    window.MathJax = {
        loader: { load: ['input/asciimath'] },
        // Hub: {
        //     Queue: MathJax.Queue
        // },
        startup: {
            pageReady: function () {
                window.typeset = function () {
                    // console.log('re-render');
                    MathJax.typeset()
                }

                window.loadedMathjax = true;
                window.typesetInput = function (el, value) {
                    const element = document.getElementById(`${el}`);

                    element.innerHTML = value.trim();
                    MathJax.texReset();
                    MathJax.typesetClear();
                    MathJax.typesetPromise([element]).catch(function (err) {
                        element.innerHTML = '';
                        element.appendChild(document.createTextNode(err.message));
                        // console.error(err);
                    }).then(function () {
                        // what to do after completion
                        window.loadedMathjax = true;
                    });
                }


                if (window.typesetInput) {
                    handleLoadedScript();
                } else {
                    alert('Something went wrong, please try again')
                }
                // console.log('typed');
                // MathJax.Hub.Queue(["Typeset", MathJax.Hub])
                return MathJax.startup.defaultPageReady();
            }
        },
        tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']],
            processEscapes: true
        },

    };

})