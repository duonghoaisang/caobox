Đây là lớp lớn nhất của framework, mọi lớp khác được kế thừa từ đây

# Chi tết #

Lớp bao gồm các hàm để bắt lỗi:

1. các hàm set(),get(),call(),callStatic() là các function được hổ trợ bởi PHP5+

2. error\_system(): bắt các lỗi warning,notice trong PHP

3. hiển thị thông báo lỗi getError($msg

4.  hàm trợ giúp help() hàm này sẽ thông báo 1 số thông tin về ứng dụng đang chạy như: các hàng số đựợc định nghĩa, các file đựơc include ... ( có thể được cập nhật nhiều  thông tin trong các version sau)