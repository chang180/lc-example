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
                data: {{ Js::from($lastYearOrders) }},
            }, {
                label: `${this.selectedYear} Orders`,
                backgroundColor: 'lightgreen',
                data: {{ Js::from($thisYearOrders) }},
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
    }
}" class="mt-4">
    <span>Year: </span>
    <select name="selectedYear" id="selectedYear" wire:model="selectedYear">
        @foreach ($availableYears as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
    <div>
        Selected: <span x-text="selectedYear"></span>
    </div>
    <div class="my-6">
        <div><span x-text="selectedYear - 1"></span> Orders: {{ array_sum($lastYearOrders) }}</div>
        <div><span x-text="selectedYear"></span> Orders: {{ array_sum($thisYearOrders) }}</div>
    </div>
    <canvas id="myChart" x-ref="canvas"></canvas>
</div>
