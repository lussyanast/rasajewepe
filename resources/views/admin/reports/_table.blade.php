<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal Acara</th>
            <th>Nama Pemesan</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->event_date }}</td>
                <td>{{ $order->user->full_name ?? '-' }}</td>
                <td>{{ $order->status->status_desc ?? '-' }}</td>
                <td>{{ $order->paymentStatus->payment_desc ?? '-' }}</td>
                <td>Rp{{ number_format($order->total_price) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>