        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        const textarea = document.querySelector("#textarea");
        const startBtn = document.querySelector("#start-btn");
        const stopBtn = document.querySelector("#stop-btn");
        const copyBtn = document.querySelector("#copy-btn");
        const downloadBtn = document.querySelector("#download-btn");
        const downloadPdfBtn = document.querySelector("#download-pdf-btn");

        recognition.interimResults = true;
        recognition.continuous = true;

        let interimTranscript = '';
        let finalTranscript = '';

        startBtn.addEventListener("click", function() {
            recognition.start();
        });

        stopBtn.addEventListener("click", function() {
            recognition.stop();
        });

        copyBtn.addEventListener("click", function() {
            textarea.select();
            document.execCommand("copy");
        });

        downloadBtn.addEventListener("click", function() {
            const text = textarea.value;
            const blob = new Blob([text], { type: "text/plain" });
            const a = document.createElement("a");
            a.style.display = "none";
            a.href = URL.createObjectURL(blob);
            a.download = "text.txt";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });

        downloadPdfBtn.addEventListener("click", function() {
            const text = textarea.value;
            const docDefinition = { content: [{ text: text }] };
            pdfMake.createPdf(docDefinition).download("speech_to_text.pdf");
        });

        recognition.addEventListener("result", function(event) {
            interimTranscript = '';
            for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
                let transcript = event.results[i][0].transcript;
                if (event.results[i].isFinal) {
                    finalTranscript += transcript;
                    break;
                } else {
                    interimTranscript += transcript;
                }
            }
            textarea.value = finalTranscript + interimTranscript;
        });