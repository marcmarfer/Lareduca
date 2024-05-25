mysql -u root -p -e "DROP DATABASE IF EXISTS lareduca; CREATE DATABASE lareduca"
php artisan migrate:refresh

php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=CourseSeeder

# run this command after creating a user
# php artisan db:seed --class=EducationalGameSeeder