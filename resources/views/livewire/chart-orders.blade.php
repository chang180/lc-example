<div 
    wire:ignore
    x-data="{
    selectedYear: @entangle('selectedYear'),
    lastYearOrders: @entangle('lastYearOrders'),
    thisYearOrders: @entangle('thisYearOrders'),
    init() {
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const data = {
            labels: labels,
            datasets: [{
                label: `${this.selectedYear - 1} Orders`,
                backgroundColor: 'lightgray',
                data: this.lastYearOrders,
            }, {
                label: `${this.selectedYear} Orders`,
                backgroundColor: 'lightgreen',
                data: this.thisYearOrders,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            this.$refs.canvas,
            config
        );

        Livewire.on('updateTheChart', () => {

            myChart.data.datasets[0].data = this.lastYearOrders;
            myChart.data.datasets[1].data = this.thisYearOrders;

            myChart.data.datasets[0].label = `${this.selectedYear - 1} Orders`;
            myChart.data.datasets[1].label = `${this.selectedYear} Orders`;

            myChart.update();
        });

    }
}" class="mt-4">
    <span>Year: </span>
    <select name="selectedYear" id="selectedYear" wire:model="selectedYear" wire:change="updateOrderCount">
        @foreach ($availableYears as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
    <div>
        Selected: <span x-text="selectedYear"></span>
    </div>
    <div class="my-6">
        <div>
            <span x-text="selectedYear - 1"></span> Orders: 
            <span x-text="lastYearOrders.reduce((a, b) => a + b, 0)"></span>
        </div>
        <div>
            <span x-text="selectedYear"></span> Orders: 
            <span x-text="thisYearOrders.reduce((a, b) => a + b, 0)"></span>
        </div>
    </div>
    <canvas id="myChart" x-ref="canvas"></canvas>
</div>
