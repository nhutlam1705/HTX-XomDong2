@extends('index')
@section('content')
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        .contact-info p {
            margin: 10px 0;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>

<div class="container">
  <h1>Liên hệ Hợp tác xã Xóm Đồng 2</h1>
  <div class="contact-info">
      <p><strong>Địa chỉ:</strong> Xóm Đồng 2, Huyện Kế Sách, Tỉnh Sóc Trăng</p>
      <p><strong>Số điện thoại:</strong> (0299) 123-4567</p>
      <p><strong>Email:</strong> <a href="mailto:contact@xomdong2.vn">contact@xomdong2.vn</a></p>
  </div>
  <form action="submit_form.php" method="post">
      <label for="name">Họ và tên</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
      
      <label for="message">Tin nhắn</label>
      <textarea id="message" name="message" rows="5" required></textarea>
      
      <button type="submit">Gửi tin nhắn</button>
  </form>
</div>

@endsection