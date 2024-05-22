<!DOCTYPE html>
<html>
<head>
    <title>Đơn hàng của bạn đã được đặt thành công</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng!</h1>
    <p>Đơn hàng của bạn đã được đặt thành công.</p>
    <p>Mã đơn hàng: {{ $order->id }}</p>
    <p>Chi tiết đơn hàng:</p>
    <ul>
        {{-- @foreach($order->orderItems as $item)
            <li>{{ $item->product->name }} x {{ $item->quantity }} - ${{ $item->price }}</li>
        @endforeach --}}
    </ul>
    <p>Tổng cộng: ${{ $order->total }}</p>
</body>
</html>
