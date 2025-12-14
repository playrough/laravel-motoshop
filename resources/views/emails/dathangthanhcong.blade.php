<x-mail::message>
# Xin chào {{ $donhang->user->name }}!

Cảm ơn bạn đã đặt xe tại **{{ config('app.name') }}**.  
Dưới đây là thông tin đơn hàng của bạn:

---

## 🏍️ Thông tin xe đã đặt
- **Tên xe:** {{ $donhang->xemay->tenxe }}
- **Giá bán:** {{ number_format($donhang->dongia) }}đ

---

## 🚚 Thông tin giao hàng
- **Điện thoại:** {{ $donhang->dienthoaigiaohang }}
- **Địa chỉ:** {{ $donhang->diachigiaohang }}

---

## 💰 Tổng thanh toán
**{{ number_format($donhang->dongia) }}đ**

---

Chúng tôi sẽ liên hệ với bạn sớm để xác nhận và tiến hành giao xe.

Trân trọng,  
**{{ config('app.name') }}**
</x-mail::message>
