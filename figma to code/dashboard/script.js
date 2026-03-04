// Initialize charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializePerformanceChart();
    initializeTeamChart();
});

// PERFORMANCE REVIEW CHART
function initializePerformanceChart() {
    const ctx = document.getElementById('performanceChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Excellent', 'Good', 'Needs Review'],
            datasets: [{
                data: [65, 25, 10],
                backgroundColor: [
                    '#667eea',
                    '#a0aec0',
                    '#cbd5e0'
                ],
                borderColor: 'white',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}

// TEAM PERFORMANCE CHART
function initializeTeamChart() {
    const ctx = document.getElementById('teamChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Winter', 'Spring', 'Summer', 'Autumn'],
            datasets: [
                {
                    label: 'Dev team',
                    data: [45, 65, 55, 70],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: 'white',
                    pointBorderWidth: 2
                },
                {
                    label: 'Design team',
                    data: [50, 55, 75, 65],
                    borderColor: '#764ba2',
                    backgroundColor: 'rgba(118, 75, 162, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#764ba2',
                    pointBorderColor: 'white',
                    pointBorderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                filler: {
                    propagate: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#718096',
                        font: {
                            size: 12
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#718096',
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
}

// Navigation active state
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
        this.classList.add('active');
    });
});

// Edit functionality
document.querySelectorAll('.edit-icon').forEach(icon => {
    icon.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Edit functionality coming soon!');
    });
});

// Manage personal
document.querySelector('.btn-manage')?.addEventListener('click', function(e) {
    e.preventDefault();
    alert('Manage personal settings coming soon!');
});

// Add team
document.querySelector('.btn-add')?.addEventListener('click', function(e) {
    e.preventDefault();
    alert('Add team functionality coming soon!');
});

// Notification bell
document.querySelector('.btn-icon:nth-of-type(2)')?.addEventListener('click', function() {
    alert('You have 3 new notifications!');
});

// Upgrade plan
document.querySelector('.btn-primary')?.addEventListener('click', function() {
    alert('Upgrade plan coming soon!');
});
