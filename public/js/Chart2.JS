var ctx = document.getElementById('doughnut').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Digital Product Sold', 'Offset Product Sold', 'Niether'],

        datasets: [{
            label: 'Weekly Category Sold',
            data: [ 12, 8, 42],
            backgroundColor: [
                'rgba(0, 238, 255)',
                'rgba(54, 162, 235, 1)',
                'rgba(196, 108, 218)',
    

            ],
            borderColor: [
                'rgba(0, 238, 255)',
                'rgba(54, 162, 235, 1)',
                'rgba(196, 108, 218)',

            ],
            borderWidth: 1
        }]

    },
    options: {
        responsive: true
    }
});
