# medical_product.com
nope

//how to install

1. Install xaamp, aamp or whatever similar to those.
2. set up database in the php-admin, using medical.sql that i stored in the folder.
3. run index.php, and u should be good to go !!


//
9/7/2022
- Không tạo được tài khoản mới
- Báo lỗi không tồn tại trường phone_number trong bảng user

//đã fix
-account mới thêm cần xác nhận của admin (Đề nghị update lại database).


//đã fix 

Ngày 11/7 
-no more bootstrap

Ngày 12/7
- Lỗi khi tạo user mới: temp_user không tồn tại
- Tài khoản admin không nên có chức năng mua hàng
- Màn thống kê nên thống kê dưới dạng biểu đồ. ( Cái này t đang đọc)
- Chỉnh sửa thông tin dụng cụ y tế bị lỗi( đã fix)
- Phần đăng ký khách hàng trong tk admin bị lỗi

Ngày 17/7
- Lỗi khi tạo user mới: temp_user không tồn tại - cài lại db vì tôi thêm temp_user cho đăng kí khách có accept từ admin
- Tài khoản admin không nên có chức năng mua hàng - Cái n để đó tiện test, mà tôi cũng nghĩ admin vào trang chủ cũng không sao
- Màn thống kê nên thống kê dưới dạng biểu đồ. ( Cái này t đang đọc) - cái này là framework của google, nếu làm chắc phải tự làm công cụ vẽ, nên tôi nghĩ thôi, 
  thông kê bảng đơn giản là được
- Chỉnh sửa thông tin dụng cụ y tế bị lỗi( đã fix)
- Phần đăng ký khách hàng trong tk admin (fix rồi)

Ngày 18/7:
- Nút xem tất cả ở màn chính sản phẩm dẫn tới URL lỗi(/page/main_page/main/list.php). fixed
- Nút xem chi tiết dụng cụ y tế ở màn chính bị lỗi(/page/main_page/main/list.php) fixed
- Sản phẩm tương tự ở màn dụng cụ đang bị sắp xếp theo hàng dọc. fixed
