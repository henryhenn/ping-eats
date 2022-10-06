@extends('layouts.main')

@section('midtrans')
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-6k71sSzSTo0Zd0MH"></script>
@endsection

@section('title')
    Selesaikan Transaksi Anda
@endsection

@push('script')
    <script>
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        $(document).ready(function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    // alert("Pembayaran Berhasil!");
                    window.location.href = "https://ping-eats.test/transaksi-pembeli"
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("Menunggu Pembayaran Anda!");
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran Gagal!");
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('Anda Menutup Menu Pembayaran Sebelum Menyelesaikan Transaksi!');
                }
            })
        });
    </script>
@endpush
