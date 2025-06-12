@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4" style="font-family: 'Italiana', serif;">Form Pemesanan</h3>

                        @if(session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        <form action="/order" method="POST">
                            @csrf

                            {{-- Tanggal Acara --}}
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Tanggal & Waktu Acara</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-event-fill"></i></span>
                                    <input type="datetime-local" class="form-control" id="event_date" name="event_date"
                                        required value="{{ old('event_date') }}">
                                </div>
                            </div>

                            {{-- Menu --}}
                            <div class="mb-3">
                                <label for="menu_id" class="form-label">Pilih Menu</label>
                                <select class="form-select" name="menu_id" id="menu_id" required onchange="updatePrice()">
                                    <option disabled {{ !request('menu_id') ? 'selected' : '' }}>-- Pilih Menu --</option>
                                    @foreach(\App\Models\Menu::all() as $menu)
                                        <option value="{{ $menu->menu_id }}" data-price="{{ $menu->price }}"
                                            {{ request('menu_id') == $menu->menu_id ? 'selected' : '' }}>
                                            {{ $menu->catering_name }} - Rp{{ number_format($menu->price, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Jumlah --}}
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah Pesanan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-123"></i></span>
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required
                                        value="{{ old('quantity') ?? 1 }}" oninput="updatePrice()">
                                </div>
                            </div>

                            {{-- Total Harga --}}
                            <div class="mb-3">
                                <label class="form-label">Total Harga (belum termasuk ongkir)</label>
                                <input type="text" class="form-control bg-light" id="totalPrice" readonly>
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Pengantaran</label>
                                <textarea class="form-control" name="address" id="address" rows="3" required
                                    placeholder="Alamat lengkap pengiriman">{{ old('address', Auth::user()->alamat ?? '') }}</textarea>
                            </div>

                            {{-- Metode Pembayaran --}}
                            <div class="mb-3">
                                <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
                                <select class="form-select" name="payment_method_id" id="payment_method_id" required onchange="updateRekening()">
                                    <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                                    @foreach(\App\Models\PaymentMethod::where('is_active', 1)->get() as $method)
                                        <option value="{{ $method->payment_method_id }}" data-rekening="{{ $method->rekening_info }}">
                                            {{ $method->payment_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="rekening-info" class="form-text mt-2 text-primary"></div>
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" name="notes" id="notes" rows="2"
                                    placeholder="Misalnya: tanpa sambal">{{ old('notes') }}</textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-send-fill me-1"></i> Kirim Pemesanan
                                </button>
                            </div>
                        </form>

                        {{-- Info User --}}
                        @auth
                            <div class="mt-4 text-center text-muted small">
                                Pemesanan atas nama: <strong>{{ Auth::user()->full_name }}</strong>
                            </div>
                        @endauth

                        {{-- Keterangan --}}
                        <div class="mt-4 alert alert-info small">
                            Total harga belum termasuk biaya ongkir.<br>
                            Mohon konfirmasi ulang total pembayaran dan ongkos kirim ke admin melalui WhatsApp: <strong>0857-7249-2505</strong>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Total Harga dan Rekening --}}
    <script>
        function updatePrice() {
            const menuSelect = document.getElementById('menu_id');
            const quantityInput = document.getElementById('quantity');
            const totalPriceInput = document.getElementById('totalPrice');

            const selectedOption = menuSelect.options[menuSelect.selectedIndex];
            const price = parseInt(selectedOption.getAttribute('data-price')) || 0;
            const quantity = parseInt(quantityInput.value) || 0;

            const total = price * quantity;
            totalPriceInput.value = 'Rp' + total.toLocaleString('id-ID');
        }

        function updateRekening() {
            const select = document.getElementById('payment_method_id');
            const selected = select.options[select.selectedIndex];
            const rekeningInfo = selected.getAttribute('data-rekening') || '';
            document.getElementById('rekening-info').innerText = rekeningInfo
                ? `Transfer ke: ${rekeningInfo}`
                : '';
        }

        document.addEventListener('DOMContentLoaded', updatePrice);
    </script>
@endsection
