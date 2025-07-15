 var criticalJs = [
                "https://s1.movavi.com/frontend/1718683704/assets/js/jquery.js",
                "https://s1.movavi.com/frontend/1718683704/assets/js/main.js"];

            if(!('IntersectionObserver' in window) || (typeof window.CustomEvent != "function") || !NodeList.prototype.forEach || !('fetch' in window) || !('Symbol' in window)){
                criticalJs.splice(1, 0, "https://polyfill-fastly.io/v3/polyfill.min.js?features=default%2Ces7%2Ces6%2Ces5%2CCustomEvent%2CIntersectionObserver%2CNodeList.prototype.forEach%2Cfetch");
            }

            loadjs(criticalJs,
                {
                    async: false,
                    success: function() {
                        var jsArrayForLoadjs = [];

                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/lazyload.js");
                        
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/pdf-online-menu.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/tooltip.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/modal.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/os-toggle-content.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/breadcrumbs.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/pdf-online.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/js/components/top-popup-gdpr.js");
                                                jsArrayForLoadjs.push("https://s1.movavi.com/frontend/1718683704/assets/scripts/vendor/autoScrollFormEmail.js");
                        
                        
                        loadjs(jsArrayForLoadjs, {
                            success: loadBodyEndJS,
                            error: loadBodyEndJS
                        });
                    }
                })