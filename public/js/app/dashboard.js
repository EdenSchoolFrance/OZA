new Chart(document.getElementById("myChart"), {
    type: 'pie',
    data: {
        labels: ["Acceptable", "A améliorer", "Agir vite", "STOP"],
        datasets: [{
            label: "",
            backgroundColor: ["#43A389", "#F9CA62","#F8912A","#B32A3C"],
            data: [75,25,0,0],
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
