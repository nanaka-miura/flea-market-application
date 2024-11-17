# フリマアプリ
## 環境構築
Dockerビルド  
1.git clone git@github.com:nanaka-miura/flea-market-application.git  
2.docker-compose up -d --build  

Lavaral環境構築  
1.docker-compose exec php bash  
2.composer install  
3.cp .env.example .env  
4..envファイルの修正  
　(1)DB_HOSTをmysqlに変更  
　(2)DB_DATABASEをlaravel_dbに変更  
　(3)DB_USERNAMEをlaravel_userに変更  
　(4)DB_PASSをlaravel_passに変更  
　(5)MAIL_FROM_ADDRESSに送信元アドレスを設定  
　(6)STRIPE_PUBLIC_KEY=を設定  
　(7)STRIPE_SECRET_KEY=を設定  
5.php artisan key:generate  
6.php artisan migrate  
7.php artisan db:seed  
8.php artisan test  
9.php artisan storage:link  


## 使用技術
・PHP 7.4.9  
・Laravel 8.83.27  
・MySQL 8.0.26  
・nginx 1.21.1  
・MailHog latest  

## ER図
![er](https://github.com/user-attachments/assets/c66d0511-5706-4380-a066-d4a83e72ff3e)

  

### URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/  
・MailHog：http://localhost:8025/
