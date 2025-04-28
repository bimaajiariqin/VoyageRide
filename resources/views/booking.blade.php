
    @extends('layout')

    @section('title', 'Pemesanan - VoyageRide Bus Pariwisata')

    @section('content')
    <div class="container" style="padding-top: 30px;">
        <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; padding: 30px;">
            <h2 style="color: #006064; margin-bottom: 30px;">Cek Status Pemesanan</h2>
            
            <form style="max-width: 600px; margin-bottom: 30px;">
                <div style="margin-bottom: 20px;">
                    <label for="booking_id" style="display: block; margin-bottom: 8px; font-weight: bold;">Kode Pemesanan</label>
                    <input type="text" id="booking_id" name="booking_id" placeholder="Masukkan kode pemesanan Anda" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="NIK" style="display: block; margin-bottom: 8px; font-weight: bold;">NIK</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email yang terdaftar" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                </div>
                
                <button type="submit" style="background-color: #006064; color: white; border: none; padding: 12px 25px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; width: 100%;">Cek Status</button>
            </form>
            
            <hr style="margin: 40px 0; border: none; border-top: 1px solid #eee;">
            
            <h2 style="color: #006064; margin-bottom: 30px;">Butuh Bantuan?</h2>
            
            <div style="display: flex; flex-wrap: wrap; gap: 20px; max-width: 800px;">
                <div style="flex: 1; min-width: 250px; background-color: #f9f9f9; padding: 20px; border-radius: 10px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span class="material-icons" style="color: #006064; font-size: 24px;">phone</span>
                        <h3 style="margin: 0; color: #006064;">Telepon</h3>
                    </div>
                    <p style="margin-bottom: 10px;">Hubungi pusat layanan pelanggan kami:</p>
                    <p style="font-weight: bold; margin: 0;">0800-1234-5678</p>
                    <p style="margin-top: 5px; color: #757575; font-size: 0.9em;">(Senin - Jumat, 08.00 - 20.00 WIB)</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; background-color: #f9f9f9; padding: 20px; border-radius: 10px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span class="material-icons" style="color: #006064; font-size: 24px;">email</span>
                        <h3 style="margin: 0; color: #006064;">Email</h3>
                    </div>
                    <p style="margin-bottom: 10px;">Kirim pertanyaan atau keluhan Anda ke:</p>
                    <p style="font-weight: bold; margin: 0;">support@voyageride.com</p>
                    <p style="margin-top: 5px; color: #757575; font-size: 0.9em;">(Respon dalam 24 jam)</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; background-color: #f9f9f9; padding: 20px; border-radius: 10px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span class="material-icons" style="color: #006064; font-size: 24px;">chat</span>
                        <h3 style="margin: 0; color: #006064;">Live Chat</h3>
                    </div>
                    <p style="margin-bottom: 10px;">Chat dengan agen layanan pelanggan kami:</p>
                    <button style="background-color: #006064; color: white; border: none; padding: 10px 20px; font-size: 14px; font-weight: bold; border-radius: 5px; cursor: pointer; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <span class="material-icons" style="font-size: 18px;">forum</span>
                        Mulai Chat
                    </button>
                    <p style="margin-top: 5px; color: #757575; font-size: 0.9em;">(Tersedia 24/7)</p>
                </div>
            </div>
        </div>
    </div>
    @endsection