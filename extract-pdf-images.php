<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Extract Images from PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<script>console.clear();</script>
<script src="https://unpkg.com/pdfjs-dist@2/build/pdf.js"></script>
<script src="https://unpkg.com/pdfjs-dist@2/build/pdf.worker.js"></script>
<script src="https://unpkg.com/vue@2"></script>
<script src="https://unpkg.com/abo-utils@0.3"></script>

<script type="text/x-template" id="templ-page">
    <div>
        <details v-if="p.svg.doc" @click="handleSVG" ref="svgContainer">
            <summary>Page {{p.number}} (click for SVG rendered version)</summary>
        </details>
        <h4 v-else>Page {{p.number}}</h4>
        <ul>
            <li v-for="image in p.images">
                <figure>
                    <a :href="image.url" :download="image.name"><img :src="image.url" :alt="image.name"></a>
                    <figcaption>{{image.name}}</figcaption>
                </figure>
            </li>
        </ul>
    </div>
</script>
<main id="app">
    <label id="pdfs">
        <input type="file" multiple :accept="mime" />
        <span>Open PDFs</span>
    </label>
    
    <h2 v-if="docs.length">(Click the images to download)</h2>

    <section v-for="doc in docs">
        <h3>{{doc.name}}</h3>
        <ul>
            <li v-for="page in doc.pages">
                <page :p="page" />
            </li>
        </ul>
    </section>
    <pre>
    {{ /* docs */ }}
    </pre>
</main>
<script>
(function() {
    
    const PDFJS = pdfjsLib,
          pdfMime = 'application/pdf',
          ad = ABOUtils.DOM,
          [$, $$] = ad.selectors();
    
    const state = {
        mime: pdfMime,
        docs: [],
    };
    
    //https://stackoverflow.com/a/39855420/1869660
    //https://www.sitepoint.com/custom-pdf-rendering/#renderingusingsvg
    function parsePage(page, pageInfo) {

        page.getOperatorList().then(function(ops) {
            console.log('ops', ops);
            const fns = ops.fnArray,
                  args = ops.argsArray;

            let imgsFound = 0;
            args.forEach((arg, i) => {
                //Not a JPEG resource:
                if (fns[i] !== PDFJS.OPS.paintJpegXObject) { return; }

                console.log('loading', arg);
                imgsFound++;

                const imgKey = arg[0],
                      imgInfo = {
                          name: pageInfo.name + '-' + imgsFound + '.jpg',
                          url: '',
                      };
                pageInfo.images.push(imgInfo);

                page.objs.get(imgKey, img => {
                    imgInfo.url = img.src;
                });
            });
        });

        
        //Full SVG:

        // Get viewport (dimensions)
        const scale = 1.5;
        const viewport = page.getViewport({ scale });

        pageInfo.svg = {
            w: viewport.width,
            h: viewport.height,
            doc: '',
        };

        // SVG rendering by PDF.js
        page.getOperatorList().then(opList => {
            var svgGfx = new PDFJS.SVGGraphics(page.commonObjs, page.objs);
            return svgGfx.getSVG(opList, viewport);
        }).then(svg => {
            //console.log(svg);
            pageInfo.svg.doc = svg;
        });

    }

    function handleFiles(data) {
        //console.log('files', data);
        const docs = [];

        data.forEach(d => {
            const docName = d.file.name,
                  pages = [];
            docs.push({
                name: docName,
                pages,
            });

            PDFJS.getDocument({
                    url: d.url,
                    //password: "test",
                })
                .promise.then(function(doc) {
                    for(let p = 1; p <= doc.numPages; p++) {
                        const pageInfo = {
                            number: p,
                            name: docName + '-' + p,
                            images: [],
                            svg: {},
                        };
                        pages.push(pageInfo);

                        doc.getPage(p).then(page => parsePage(page, pageInfo));
                    }
                })
                .catch(function(error) {
                    alert('Failed to open ' + docName);
                    console.log(error);
                });
        });
        
        state.docs = docs;
        console.log(state);
    }


    Vue.component('page', {
        template: '#templ-page',
        props: ['p'],
        data() {
            return {
                checked: false,
                title: 'Check me'
            }
        },
        methods: {
            handleSVG(e) {
                const imgUrl = e.target.href?.baseVal;
                if(imgUrl) {
                    console.log(imgUrl);
                    window.open(imgUrl, '_blank');
                }
                else {
                    this.$refs.svgContainer.appendChild(this.p.svg.doc);
                }
            }
        }
    });
    new Vue({
        el: '#app',
        data: state,
    });

    ad.dropFiles($('#pdfs input'), handleFiles, { acceptedTypes: [pdfMime] });
    ad.dropFiles(document,         handleFiles, { acceptedTypes: [pdfMime] });

})();


</script>
<style>
/* Remove default list styling */
ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

/* Style for list items */
li {
    margin-bottom: 1rem;
}

/* Style for details and summary */
details {
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 1rem;
    background: #f9f9f9;
}

summary {
    cursor: pointer;
    font-weight: bold;
}

/* Style for the file input and label */
#pdfs {
    display: inline-flex;
    align-items: center;
    background: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 0.5rem 1rem;
    cursor: pointer;
}

#pdfs input {
    display: none;
}

#pdfs span {
    margin-left: 0.5rem;
}

</style>

  </div> </div> <?php include('admin/ad2.php'); ?> <br><br>
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="text-section">
  <h2 class="section-heading">Lorem Ipsum Title</h2>
  <h3 class="section-subheading">Why Our Online PDF Tools?</h3>
  <p class="section-description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet pulvinar libero. Nullam vehicula orci non eros fringilla, sit amet egestas justo interdum. Suspendisse potenti. Integer vulputate massa vel nulla faucibus pretium. Fusce vehicula nisl neque, at lacinia dolor suscipit eget.
  </p>
</div>

  <!----------------------------------------------------------------> 
 <?php include('admin/calltoaction.php'); ?>
<?php include('admin/abovefooter.php'); ?> 
<?php include('admin/footer.php'); ?> 
<?php include('admin/network.php'); ?>
<button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script>
   // Show the button when the user scrolls down 100px from the top of the document
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
}

// Scroll to the top of the document when the button is clicked
function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}

  </script>
  </body>
</html>