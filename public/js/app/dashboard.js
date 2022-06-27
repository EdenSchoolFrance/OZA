new Chart(document.getElementById("myChart"), {
    type: 'pie',
    data: {
        labels: ["Acceptable", "A améliorer", "Agir vite", "STOP"],
        datasets: [{
            label: "test",
            backgroundColor: ["#43A389", "#F9CA62","#F8912A","#B32A3C"],
            data: tabData,
        }]
    },
    options: {
        layout: {
            padding: 0,
        },
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position : 'right',
                labels : {
                    boxHeight : 45,
                    boxWidth : 45,
                },
                title: {
                    display: false,
                }
            }
        }
    }
});


on('.btn-modal-pdf-submit', 'click', (el, e) => {
    $('.info-pdf-modal', document, 0).innerText = "Votre document unique est en cours de génération merci de patienter, cela peut prendre jusqu'à 30 secondes."
});
