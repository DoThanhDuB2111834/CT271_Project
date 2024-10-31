<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $armcharAndSofaCategory = category::updateOrCreate(['name' => 'armchair và sofa']);
        $armchairCategory = category::updateOrCreate(['name' => 'armchair', 'urlImageSlider' => 'Image/slider/banner-trang-armchair.jpg']);
        $livingRoom = category::updateOrCreate(['name' => 'Phòng khách', 'urlImageSlider' => 'Image/slider/banner-trang-phong-khach.jpg']);
        $sofaCategory = category::updateOrCreate(['name' => 'Sofa', 'urlImageSlider' => 'Image/slider/banner-trang-sofa.jpg']);
        $sofaGocCategory = category::updateOrCreate(['name' => 'Sofa góc', 'urlImageSlider' => 'Image/slider/banner-trang-sofaGoc.jpg']);
        $armcharAndSofaCategory->children()->attach(['id' => $armchairCategory->id]);
        $armcharAndSofaCategory->children()->attach(['id' => $sofaCategory->id]);
        $armcharAndSofaCategory->children()->attach(['id' => $sofaGocCategory->id]);

        $armchairMay = ['name' => 'armchair mây mới', 'size' => 'D670 - R760 - C700 mm', 'quantity' => 3, 'color' => 'green', 'price' => 13900000];
        $model = Product::updateOrCreate($armchairMay);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-4-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairDoultonvintage = ['name' => 'Armchair Doulton vintage', 'size' => 'D510 - R850 - C790/420 mm', 'quantity' => 3, 'color' => 'gray', 'price' => 28500000];
        $model = Product::updateOrCreate($armchairDoultonvintage);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOgam = ['name' => 'Armchair Ogami vải vact10499', 'size' => 'D820 - R720 - C730 mm', 'quantity' => 3, 'color' => 'Orange', 'price' => 8900000];
        $model = Product::updateOrCreate($armchairOgam);
        $model->Images()->create(['url' => 'Image/product/armchair-tet-vai-vact10499.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOrientalvact10389 = ['name' => 'Armchair Oriental vact10389', 'size' => 'D800 - R815 - C1000 mm', 'quantity' => 3, 'color' => 'white', 'price' => 15900000];
        $model = Product::updateOrCreate($armchairOrientalvact10389);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-4-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairSF044TER = ['name' => 'Armchair vải màu nâu đỏ SF044TER.I', 'size' => '800x550 mm', 'quantity' => 3, 'color' => 'brown', 'price' => 32900000];
        $model = Product::updateOrCreate($armchairSF044TER);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-300x200.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMay = ['name' => 'Sofa 2 chỗ Mây mới', 'size' => 'D1690 - R760 - C700 mm', 'color' => 'brown', 'quantity' => 3, 'price' => 19900000];
        $model = Product::updateOrCreate($sofaMay);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaOgami = ['name' => 'Sofa 2 chỗ Ogami vải vact10499', 'size' => 'D1440 - R720 - C730 mm', 'color' => 'red rose', 'price' => 12900000];
        $model = Product::updateOrCreate($sofaOgami);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511 (1).jpg']);
        $model->Images()->create(['url' => 'Image/product/sofe-2-cho-tet-vai-vact10499-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaPioGoc = ['name' => 'Sofa Pio góc phải vải VACT11303/VACT10492', 'description' => 'Sofa góc trái Pio với thiết kế mới lạ, điểm nhấn là phối màu vải hài hòa giữa nệm và khung ghế, dây đai phần lưng như một khuy áo nhằm gia tăng nệm lưng lên xuống tùy theo nhu cầu sử dụng của bạn. Ưu điểm lớn của Pio là bạn có thể phối màu cho bộ sofa yêu thích của mình thay vì chỉ sử dụng một màu đơn sắc thông thường. Chân sofa cũng được thiết kế nhấn nhá chi tiết bằng hai màu sắc thời thượng để tổng thể chung trở nên bắt mắt, hoàn hảo, vỏ nệm có thể tháo rời để vệ sinh. Sofa góc Pio là lựa chọn tối ưu cho không gian phòng khách Bắc Âu - hiện đại.', 'size' => 'D2800/1650 - R850 - C810 mm', 'color' => 'white', 'price' => 36920000];
        $model = Product::updateOrCreate($sofaPioGoc);
        $model->Images()->create(['url' => 'Image/product/Phong-khach-Pio-tao-nha-tinh-te-3-768x512.jpg']);
        $model->Images()->create(['url' => 'Image/product/Sofa-pio-goc-phai-vai-VACT11303-VACT10492-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMorettiGoc = ['name' => 'Sofa Moretti góc phải vải vact10635/6643', 'size' => 'D3300/1830 - R950 - C850 mm', 'quantity' => 3, 'color' => 'green', 'price' => 49990000];
        $model = Product::updateOrCreate($sofaMorettiGoc);
        $model->Images()->create(['url' => 'Image/product/sofa-moretti-goc-phai-vai-vact10635.6643-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/bo-suu-tap-Morretti-768x447.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);


        // Fetch dữ liệu cho Phòng ăn
        $phongAnCategory = category::updateOrCreate(['name' => 'Phòng ăn', 'urlImageSlider' => 'Image/slider/banner-trang-phong-an.jpg']);
        $banCategory = category::updateOrCreate(['name' => 'Bàn']);
        $gheCategory = category::updateOrCreate(['name' => 'Ghế']);
        $banAnCategory = category::updateOrCreate(['name' => 'Bàn ăn', 'urlImageSlider' => 'Image/slider/banner-trang-ban-an.jpg']);
        $gheAnCategory = category::updateOrCreate(['name' => 'Ghế ăn', 'urlImageSlider' => 'Image/slider/banner-trang-ghe-an.jpg']);
        $banLamViecCategory = category::updateOrCreate(['name' => 'Bàn làm việc', 'urlImageSlider' => 'Image/slider/banner-trang-ban-lam-viec.jpg']);
        $gheLamViecCategory = category::updateOrCreate(['name' => 'Ghế làm việc', 'urlImageSlider' => 'Image/slider/banner-trang-ghe-lam-viec.jpg']);
        $banCategory->children()->attach(['id' => $banAnCategory->id]);
        $banCategory->children()->attach(['id' => $banLamViecCategory->id]);
        $gheCategory->children()->attach(['id' => $gheAnCategory->id]);
        $gheCategory->children()->attach(['id' => $gheLamViecCategory->id]);


        $banAn8ChoOrientaleWalnut = ['name' => 'Bàn ăn 8 chỗ Orientale Walnut', 'size' => 'D2300 - R900 - C750 mm', 'quantity' => 3, 'color' => 'brown', 'price' => 72500000];
        $model = Product::updateOrCreate($banAn8ChoOrientaleWalnut);
        $model->Images()->create(['url' => 'Image/product/ban-an-8-cho-orientale-walnut-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-an-orientale-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAn6ChoCoastal = ['name' => 'Bàn ăn 6 chỗ Coastal', 'size' => 'D1600 - R800 - C755 mm', 'description' => 'Bàn ăn Coastal được làm từ gỗ Ash, theo phong cách truyền thống và mang kết cấu vững chãi. Mặt bàn bằng phẳng với các đường vân tự nhiên, bốn cạnh được bo tròn mềm mại để tránh va chạm trong lúc sử dụng. Sản phẩm có 2 kích thước là 6 chỗ và 8 chỗ cho người dùng những lựa chọn linh hoạt, phù hợp với nhiều không gian và nhu cầu sử dụng.', 'color' => 'brown', 'price' => 13900000];
        $model = Product::updateOrCreate($banAn6ChoCoastal);
        $model->Images()->create(['url' => 'Image/product/Ban-an-6-cho-Coastal-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-an-coastal-768x512.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAnMoRongSnapBetonGray = ['name' => 'Bàn ăn mở rộng Snap beton grey', 'size' => 'D1200/1800-R800-C760 mm', 'quantity' => 3, 'description' => 'Bàn ăn mở rộng Snap được nhập khẩu từ thương hiệu nổi tiếng Calligaris của Ý là thiết kế bàn ăn tối giản và thanh lịch cho không gian phòng ăn của bạn. Chân bàn kim loại sơn tĩnh điện và mặt bàn melamine. Một thiết kế hoàn hảo cho không gian phòng ăn hiện đại.', 'color' => 'grey', 'price' => 27500000];
        $model = Product::updateOrCreate($banAnMoRongSnapBetonGray);
        $model->Images()->create(['url' => 'Image/product/ban_an_mo_rong_snap_102666-6-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/102666_1-3-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAn8ChoMay = [
            'name' => 'Bàn ăn Mây mới 8 chỗ',
            'size' => 'D2200 - R900 - C740 mm',
            'color' => 'brown',
            'price' => 16900000
        ];
        $model = Product::updateOrCreate($banAn8ChoMay);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-4-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-300x200.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        // Ghế ăn

        $gheAnBolero = ['name' => 'Ghế ăn Bolero ACC001 Da AB1142', 'size' => 'D470 - R570 - C860 mm', 'color' => 'grey', 'price' => 6900000];
        $model = Product::updateOrCreate($gheAnBolero);
        $model->Images()->create(['url' => 'Image/product/ghe-an-bolero-1.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-Bolero-ACC001-Da-AB1142-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);

        $gheAnRoma = ['name' => 'Ghế ăn Roma', 'size' => 'D560 -R440 - C820 mm', 'color' => 'grey', 'quantity' => 3, 'price' => 3400000];
        $model = Product::updateOrCreate($gheAnRoma);
        $model->Images()->create(['url' => 'Image/product/1000-ghe-roma-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/500-roma-ban-an1.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);

        $gheAnKhongtayValente = ['name' => 'Ghế ăn không tay Valente', 'size' => 'D500 - R550 - C850 mm', 'quantity' => 3, 'color' => 'grey', 'price' => 8900000];
        $model = Product::updateOrCreate($gheAnKhongtayValente);
        $model->Images()->create(['url' => 'Image/product/ghe_an_valente-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-khong-tay-Valente-1-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-khong-tay-Valente-4-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);

        // Fetch Dữ liệu cho phòng làm việc
        $phongLamViecCategory = category::updateOrCreate(['name' => 'Phòng Làm việc', 'urlImageSlider' => 'Image/slider/banner-trang-phong-lam-viec.jpeg']);
        $banLamViecCoatal = ['name' => 'Bàn làm việc Coastal', 'size' => 'D1300 - R520 - C730 mm', 'description' => 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Bàn làm việc Coastal có thiết kế độc đáo với phần tủ kéo cong mang đến không gian làm việc sáng tạo và độc đáo. Chất liệu gỗ Ash vừa đáp ứng tính thẩm mỹ, đồng thời là vật liệu bền bỉ theo thời gian. Khi kết hợp bàn làm việc cùng ghế ăn Coastal sẽ tạo nên góc làm việc cực kỳ thoải mái và tiện nghi.', 'color' => 'brown', 'price' => 14900000];
        $model = Product::updateOrCreate($banLamViecCoatal);
        $model->Images()->create(['url' => 'Image/product/Ban-lam-viec-Coastal-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ban-lam-viec-Coastal-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ban-lam-viec-Coastal-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $banLamViecCategory->id]);

        $banLamViecSoul = ['name' => 'Bàn làm việc Soul', 'size' => 'D1300-R800-C750mm', 'quantity' => 3, 'description' => 'Bàn làm việc nổi bật với phần gác chân bầng kim loại thoải mái và phù hợp với mọi thành viên trong gia đình', 'color' => 'brown', 'price' => 5785000];
        $model = Product::updateOrCreate($banLamViecSoul);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-soul-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-soul2-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $banLamViecCategory->id]);

        $banLamViecMath = ['name' => 'Bàn Làm Việc Match', 'size' => 'D1300-R650-C750mm', 'description' => 'Bàn làm việc Match là sản phẩm nhập từ Ý. Đặc trưng bởi các hình dạng mềm mại, mặt cong nhẹ, góc tròn và đường vát. Các tính chất tự nhiên của gỗ được làm sáng lên bởi cách kết hợp tương phản về màu sắc của ngăn kéo giữa và ngăn xếp nâng. Là giải pháp lý tưởng cho việc trang trí văn phòng tại nhà, nhưng cũng phù hợp hoàn hảo trong phòng trẻ em cũng như trong các môi trường với phong cách tỉnh táo hơn nhờ có sự kết hợp màu sắc.', 'color' => 'brown', 'price' => 43380000];
        $model = Product::updateOrCreate($banLamViecMath);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-match-trang-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-barbier-1000x666-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $banLamViecCategory->id]);

        $banLamWingTrang = ['name' => 'Bàn làm việc Wing màu trắng', 'size' => 'D1300 - R650 - C750 mm', 'quantity' => 3, 'color' => 'white', 'price' => 14630000];
        $model = Product::updateOrCreate($banLamWingTrang);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-wing-mau-trang-1-768x517.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-lam-viec-wing-mau-trang-2-768x512.jpg']);
        $model->Images()->create(['url' => 'Image/product/BAN-LAM-VIEC-WING-MAU-TRANG-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $banLamViecCategory->id]);

        $banLamWingDen = ['name' => 'Bàn làm việc Wing màu đen', 'size' => 'D1300 - R650 - C750 mm', 'quantity' => 3, 'color' => 'black', 'price' => 14630000];
        $model = Product::updateOrCreate($banLamWingDen);
        $model->Images()->create(['url' => 'Image/product/BAN-LAM-VIEC-WING-MAU-DEN-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/BAN-LAM-VIEC-WING-MAU-DEN-3-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/BAN-LAM-VIEC-WING-MAU-DEN-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $banLamViecCategory->id]);

        $armchairXoayAbert = ['name' => 'Armchair xoay Albert Kuip Taupe', 'size' => 'D470 - R590 - C840 mm', 'color' => 'white', 'price' => 15620000];
        $model = Product::updateOrCreate($armchairXoayAbert);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-1-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-7-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-8-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $gheLamViecCategory->id]);

        $armchairXoayAbert = ['name' => 'Armchair xoay Albert Kuip Taupe', 'size' => 'D470 - R590 - C840 mm', 'quantity' => 3, 'color' => 'white', 'price' => 15620000];
        $model = Product::updateOrCreate($armchairXoayAbert);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-1-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-7-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ARMCHAIR-XOAY-ALBERT-KUIP-TAUPE-120233Z-8-768x511.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $gheLamViecCategory->id]);

        $Ghelamvieccheckout83959K = ['name' => 'Ghế làm việc check out 83959K', 'size' => 'D750 - R750 - C1180 mm', 'quantity' => 3, 'color' => 'black', 'price' => 24060000];
        $model = Product::updateOrCreate($Ghelamvieccheckout83959K);
        $model->Images()->create(['url' => 'Image/product/Ghe-Lam-Viec-Check-Out-3105575-1-768x454.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-Lam-Viec-Check-Out-3105575-2-768x454.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-Lam-Viec-Check-Out-3105575-768x454.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $gheLamViecCategory->id]);

        $GhelamviecLightHighBrown83959K = ['name' => 'Ghế làm việc Labora high brown 80724K', 'size' => 'D620 - R590 - C1290 mm', 'quantity' => 3, 'color' => 'brown', 'price' => 15290000];
        $model = Product::updateOrCreate($GhelamviecLightHighBrown83959K);
        $model->Images()->create(['url' => 'Image/product/GHE-LAM-VIEC-LABORA-HIGH-BROWN-80724K-1-768x495.jpg']);
        $model->Images()->create(['url' => 'Image/product/GHE-LAM-VIEC-LABORA-HIGH-BROWN-80724K-2-768x495.jpg']);
        $model->Images()->create(['url' => 'Image/product/GHE-LAM-VIEC-LABORA-HIGH-BROWN-80724K-5-768x495.jpg']);
        $model->Images()->create(['url' => 'Image/product/GHE-LAM-VIEC-LABORA-HIGH-BROWN-80724K-768x495.jpg']);

        $model->categories()->attach(['id' => $phongLamViecCategory->id]);
        $model->categories()->attach(['id' => $gheLamViecCategory->id]);

        // fetch Dữ liệu cho phòng ngủ
        $phongNguCategory = category::updateOrCreate(['name' => 'Phòng ngủ', 'urlImageSlider' => 'Image/slider/banner-trang-phong-ngu.jpg']);
        $giuongNguCategory = category::updateOrCreate(['name' => 'Giường ngủ']);
        $giuongCategory = category::updateOrCreate(['name' => 'Giường', 'urlImageSlider' => 'Image/slider/banner-trang-giuong.jpg']);
        $bandaugiuongCategory = category::updateOrCreate(['name' => 'Bàn đầu giường', 'urlImageSlider' => 'Image/slider/banner-trang-ban-dau-giuong.jpg']);
        $giuongNguCategory->children()->attach(['id' => $giuongCategory->id]);
        $giuongNguCategory->children()->attach(['id' => $bandaugiuongCategory->id]);

        $bandaugiuongocastal = ['name' => 'Bàn đầu giường Coastal', 'size' => 'D580 - R430 - C555 mm', 'color' => 'yellow', 'quantity' => 3, 'price' => 6900000];
        $model = Product::updateOrCreate($bandaugiuongocastal);
        $model->Images()->create(['url' => 'Image/product/Ban-dau-giuong-Coastal-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ban-dau-giuong-Coastal-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $bandaugiuongCategory->id]);

        $bandaugiuongpio = ['name' => 'Bàn đầu giường Pio', 'size' => 'D500- R400 - C550', 'color' => 'white', 'quantity' => 3, 'description' => 'Một sản phẩm cộng thêm cho phòng ngủ của bạn. Bàn đầu giường Pio giúp tạo điểm nhấn và công năng. Hoàn thiện với màu nâu xám và điểm xuyến với màu ghi tạo tổng thể hài hòa. PIO – Vẻ đẹp yên bình giữa lối sống đô thị Pha trộn giữa phong cách scandinavian và sự mới lạ trong chọn lựa màu sắc, bộ sưu tập PIO toát lên vẻ đẹp nhẹ nhàng, thanh lịch và cũng rất gần gũi với thiên nhiên. PIO thể hiện lối sống của những người trẻ, biết chiêm nghiệm và thưởng ngoạn sự trở về bình yên giữa nhịp sống hiện đại.Thiết kế bởi những đường cong, điểm xuyến các chi tiết nhấn nhá bên cạnh sử dụng các vật liệu như gỗ beech, melamine marble.. giúp PIO trở nên cá tính và thu hút trong không gian hiện đại. Sản phẩm được thiết kế bởi đội ngũ Nhà Xinh và sản xuất tại Việt Nam.', 'price' => 6900000];
        $model = Product::updateOrCreate($bandaugiuongpio);
        $model->Images()->create(['url' => 'Image/product/ban-dau-giuong-pio-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/line_pio_bed_beside_table_c02-768x512.png']);
        $model->Images()->create(['url' => 'Image/product/92711_2_1000-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $bandaugiuongCategory->id]);

        $bandaugiuongskagen = ['name' => 'Bàn đầu giường Skagen bên phải', 'size' => 'D400-R320-C507', 'color' => 'brown', 'quantity' => 3, 'price' => 4900000];
        $model = Product::updateOrCreate($bandaugiuongskagen);
        $model->Images()->create(['url' => 'Image/product/ban-dau-giuong-skagen-768x511.png']);
        $model->Images()->create(['url' => 'Image/product/1000-san-pham-nha-xinh74-4-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-ngu-hien-dai-thanh-lich-skagen-13522-768x512.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $bandaugiuongCategory->id]);

        $giuongcoastal = ['name' => 'Giường Coastal vàng 1m6', 'size' => 'D2000 - R1600 - C1080 mm', 'color' => 'yellow', 'price' => 28900000];
        $model = Product::updateOrCreate($giuongcoastal);
        $model->Images()->create(['url' => 'Image/product/Giuong-Coastal-1m6-vang-2-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $giuongCategory->id]);

        $giuongleman = ['name' => 'Giường Leman 1m8 vải VACT10370', 'size' => 'D2000 - R1800 - C1070 mm', 'color' => 'grey', 'quantity' => 3, 'price' => 33650000];
        $model = Product::updateOrCreate($giuongleman);
        $model->Images()->create(['url' => 'Image/product/giuong-leman-1m8-vai-vact10370-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $giuongCategory->id]);

        $giuongvictoria = ['name' => 'Giường ngủ gỗ Victoria 1m6', 'size' => 'D2000 - R1600 - C1160', 'description' => 'Giường ngủ gỗ Victoria 1m6 với màu trắng nhẹ nhàng, tạo một không gian trang nhã và tinh tế với các hoa văn chạm khắc mang phong cách cổ điển phương Tây. Giường được làm bằng gỗ Xà Cừ xử lý tinh tế, mang lại cảm giác thoái mái, thư giãn. Giường ngủ Victoria là một lựa chọn tối ưu cho phòng ngủ phong cách cổ điển.', 'color' => 'white', 'price' => 31900000];
        $model = Product::updateOrCreate($giuongvictoria);
        $model->Images()->create(['url' => 'Image/product/25852-1000-nhaxinh-phong-ngu-giuong-victoria-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/giuong-victoria-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $giuongCategory->id]);

        $giuongOna = ['name' => 'Giường Ona Him 1m8 da nâu S3', 'size' => 'D2000 - R1800 - C940 mm', 'color' => 'brown', 'quantity' => 3, 'price' => 66900000];
        $model = Product::updateOrCreate($giuongOna);
        $model->Images()->create(['url' => 'Image/product/giuong-ona-him-1m8-da-nau-s3-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/giuong-ona-him-1m8-da-nau-s3-768x511.jpg']);

        $model->categories()->attach(['id' => $phongNguCategory->id]);
        $model->categories()->attach(['id' => $giuongCategory->id]);
    }
}
