Hướng dẫn sử dụng hệ thông voting system online

* Hướng dẫn cài đặt
- Chỉnh sửa file .env 
- Import file database.sql
- Để khởi động hệ thống các bạn chạy:  php artisan serve;
- sau đó vào http://127.0.0.1:8000/login để login vào hệ thống
- ở đây nếu bạn muốn vào trang người sử dụng các bạn hãy tạo tài khoản mới
- nếu muốn vào admin các bạn có thể check database để lấy username, mật khẩu các tài khoản admin mình đặt hầu hết là "matkhau". Hoặc các bạn có thể tạo tài khoản admin mới trong seed nhưng nhớ chỉnh lại factory nhé với admin phần role sẽ là 1 còn khách hàng phần role sẽ là 0;

* Hướng dẫn sử dụng
- Đối với tài khoản khách : + Các bạn chỉ có thể bầu cử 1 lần duy nhất cho mỗi vị trí và check lại kết quả mà mình đã bầu 
			     + Các bạn cũng có thể chỉnh sửa tài khoản của mình
- Đối với tài khoản admin : - có thể quản lý và chỉnh sửa tài khoản của khách và tài khoản admin khác, các vị trí bầu cử, và ứng viên 			
			      - Check kết quả bầu cử tổng quan
			      - Danh sách trúng cử      								
