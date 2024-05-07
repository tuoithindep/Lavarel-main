Config database mysql:

B1: Mở file C:\XAMPP\mysql\bin\my.ini
B2: Tìm chuỗi C:/xampp/mysql/data chuỗi này thường xuất hiện ở các dòng: 
	- 33:datadir 
	- 139:innodb_data_home_dir
	- 141:innodb_log_group_home_dir
B3: Sửa lại thành đường dẫn C:/xampp/htdocs/Laravel/data

Run PHP Laravel:

B1: Cài đặt composer
B2: Vào terminal:
	gõ lệnh cd C:/xampp/htdocs/Laravel
	gõ lệnh composer update
B3: Run serve: gõ lệnh php artisan serve 
