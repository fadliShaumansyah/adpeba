
<x-dashboard>
   
@section('content')
<div class="container mx-auto px-6 py-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Statistik / Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold">User Statistics</h3>
            <div class="mt-4">
                <canvas id="userChart"></canvas>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    // Data untuk grafik
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'bar',  // Tipe grafik, bisa diubah menjadi 'line', 'pie', dll
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Label sumbu X
            datasets: [{
                label: 'User Growth',  // Nama dataset
                data: [65, 59, 80, 81, 56, 55],  // Data untuk sumbu Y
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Warna latar belakang batang
                borderColor: 'rgba(75, 192, 192, 1)',  // Warna border batang
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true  // Agar sumbu Y mulai dari 0
                }
            }
        }
    });
</script>
@endsection
            <!-- Component End  -->

</x-dashboard>