# grouping-by-location

Projenin amacı, lokasyon bilgileri alınan abonelerin (ülke, şehir, ilçe ve koordinatları), koordinatlarına göre harita üzerinde ülke, şehir ve ilçelere göre gruplandırılarak gösterilmesidir.

Projeyi localinize indirdikten sonra 'composer install' komutu ile paketleri yükleyin.

Veri tabanı ayarlarınızı yaptıktan sonra 'php artisan migrate' komutu ile ilgili tabloları oluşturun.

Ardından 'php artisan db:seed --class=SubscriberTableSeeder' komutu ile veri tabanındaki subscriber tablonuza 50 adet kayıt ekleyin.

Projenin içinde yer alan subscriber_locations.sql dosyasını da karşılık gelen tablonuza import ettikten sonra son bir adım kalıyor.

'php artisan command:groupinglocationcommand' komutu çalıştırıldığında, subscriber_locations.sql tablosunda lokasyon bilgileri tutulan abonelerin, hangi ülkede, hangi şehirde ve hangi ilçede kaç abonenin olduğu, ülke, şehir ve ilçe bazında gruplandırılarak veri tabanında karşılık gelen tablolarına yazdırılıyor. Proje web ortamında açıldığında ise ilk ülke olarak gruplanmış (şuan sadece Türkiye bulunmaktadır.), ülke tıklandığında ise o ülkeye ait şehirlere göre gruplanmış, şehirlerden biri tıklandığında ise o şehire ait ilçelerin gruplanarak içerisinde bulunan abonelerin sayıları da bilgi penceresinde gösterilecek şekilde tasarlanmıştır.

Projenize her an abonelerin eklendiğini düşünecek olursak 'php artisan command:groupinglocationcommand' komutunu belirli periyotlarla çalışan bir cronjob olarak kullanırsak, yeni olarak gelen abone ait olduğu ülke, şehir ve ilçeye dahil edilerek o bölgede gruplanmış abonelerin sayısını güncellemiş oluruz.
