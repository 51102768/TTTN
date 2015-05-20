<?php

class ProductTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = $this->getFaker();

		DB::table('product')->delete();

		$categories = Category::where("brand", "=","Sennheiser")->first();

		Product::create([
			"name"		=>"Sennheiser MX 686G",
			"type_id"		=>3,
			"stock"		=>"1",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/mx686g.jpg",
			"weight"	=>"23",
			"color"		=>"Green",
			"price"		=>"69.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"description"=>"MX 686G SPORTS – Tai nghe Ear-bud bền bỉ, được thiết kế dành cho những người có phong cách sống năng động.
MX 686G SPORTS - Tai nghe được thiết kế chuyên cho tập luyện thể thao, chống nước cấp độ IPX4, chống mồ hôi, với các cặp tips chất liệu silicon kháng khuẩn (kháng khuẩn thương hiệu SteriTouch) có tích hợp microphone, nút điều chỉnh âm lượng, điều khiển bài hát dành cho phần lớn các loại smartphone, tablet,... hệ điều hành Android, Windows Mobile, Blackberry,...  như Samsung Galaxy, LG, HTC,...
Kết hợp giữa thiết kế sáng tạo với chất lượng âm thanh ấn tượng, chiếc MX 686G SPORTS của Sennheiser là người đồng hành hoàn hảo trên đường chạy.
Cơ chế Slide-to-Fit thông minh đảm bảo tai nghe nằm vừa vặn và vững chãi trên tai, trong khi driver chất lượng cao đem lại âm thanh stereo ngoài sức tưởng tượng.
Nó sẽ khiến bạn mỉm cười xóa tan mệt mỏi. Thiết kế mở của nó giúp bạn vẫn có thể nghe được các âm thanh xung quanh và về đích an toàn.
Dây cáp truyền tín hiệu âm thanh của tai nghe có hình dạng Oval chống rối và phát ra ít tiếng ồn do dây cọ xát vào xung quanh khi so sánh với các tai nghe khác, dây tín hiệu được gia cố thêm chất liệu Para-aramid (giống với chất liệu Kevlar và Twaron có độ bền gấp 5 lần thép nhưng cũng rất dẻo dai thường được dùng để chế tạo áo giáp chống đạn,...) đảm bảo độ bền, chắc chắn, và tin cậy.
Phụ kiện đi kèm có 1 túi đựng và 1 kẹp cặp dây vào áo,...
Cặp đệm tai có thiết kế Hybrid tăng cường tiếng bass nhưng vẫn đảm bảo nghe thấy các âm thanh xung quanh, cũng như đảm bảo an toàn.",
		]);
		Product::create([
			"name"		=>"Sennheiser Momentum",
			"stock"		=>"10",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/momentum.jpg",
			"weight"	=>"16",
			"color"		=>"Red and Black",
			"price"		=>"99.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai Nghe Sennheiser Momentum in-ear- M2IEi cuốn hút giới trẻ không chỉ ở thiết kế trẻ trung mà còn là sản phẩm dành riêng cho hệ điều hành IOS. Momentum in-ear- M2IEi có dải tần 15 - 22000 Hz, trở kháng 18ohm, độ nhạy 118dB cho chất lượng âm thanh stereo với âm bass mạnh mẽ. Ngoài ra, tai nghe có độ dài 1.6m cho bạn thoải mái sử dụng tai nghe dù bạn ở khoảng cách xa.",
		]);
		Product::create([
			"name"		=>"Sennheiser CX200",
			"stock"		=>"7",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/cx200-streetII.jpg",
			"weight"	=>"5",
			"color"		=>"Black",
			"price"		=>"35",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai Nghe Sennheiser CX 200 Street II

Với  Sennheiser CX 200 Street  II âm bass là thế mạnh rất với chất lượng rõ ràng, không chỉ tốc độ được kiểm soát khá tốt mà đánh cũng rất có lực, xuống được khá sâu với một không gian bass rộng mở nghe rất hợp với nhạc của Metallica hay Nirvana.

Âm mid của Sennheiser CX 200 II, tuy bass nhiều nhưng nghe không có cảm giác bị lấn nhiều, nghe vẫn khá mượt mà trau chuốt. Sennheiser CX 200 II làm khá tốt việc chống ồn với mấy miếng đệm nhiều kích cỡ khá nhau để người dùng lựa chọn phù hợp với tai của mình"
		]);
		Product::create([
			"name"		=>"Sennheiser HDR 120",
			"stock"		=>"3",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/HDR120.jpg",
			"weight"	=>"229",
			"color"		=>"Black",
			"price"		=>"69",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe không dây Sennheiser HDR 120  RF là thiết bị giá rẻ, tần số hoạt động trong khoảng 863MHz đến 926MHz , và được thiết kế để sử dụng với Sennheiser RS 120 Hi-Fi hoặc TV hoặc các thiết bị đa phương tiện không dây khác. Tai nghe có khả năng mở rộng các tần số thấp, supra-aural, thiết kế open-back, với pin sạc NiMH tai nghe có thể hoạc động trong 20 - 25 giờ ",
		]);
		Product::create([
			"name"		=>"Sennheiser HD 280 Pro",
			"stock"		=>"7",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/HD280Pro.jpg",
			"weight"	=>"220",
			"color"		=>"Black",
			"price"		=>"80",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe Sennheiser HD 280 Pro, dòng tai nghe cao cấp dành cho người dùng chuyên nghiệp, chất lượng âm thanh cực tốt, bass mạnh mẽ, dãy băng tần cực rộng (8-25000Hz), khả năng chống ồn tốt cũng như thiết kế nhẹ nhàng đem lại sự thoải mái ngay cả khi hoạt động trong nhiều giờ liên tục. Khả năng xếp gọn lại cũng là điểm nổi bật, mang tới sự tiện lợi và di động cho sản phẩm.",
		]);
		$categories = Category::where("brand", "=","Audio Technica")->first();

		Product::create([
			"name"		=>"ATH-M50x",
			"stock"		=>"25",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M50X.jpg",
			"weight"	=>"285",
			"color"		=>"Black",
			"price"		=>"173.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Phiên bản đặc biệt Limited Edition với màu xanh phối với màu da thật thời trang và cá tính
Sản phẩm được các kỹ sư âm thanh và các nhà phê bình âm thanh chuyên nghiệp đánh giá cao
Driver độc quyền có đường kính lớn 45 mm được làm từ nam châm quý và chứa dây lõi nhôm mạ đồng.
Âm thanh rõ nét, tuyệt đỉnh với dải âm tần rộng, âm bass chân thật, sâu lắng
Vòng tai được thiết kế ôm khít tai, đồng thời có khả năng cách âm vượt trội ở môi trường có tiếng ồn lớn.
Driver có thể xoay 90°, sản phẩm lý tưởng khi kiểm soát bằng một tay.
Headband và earcup chuyên nghiệp tăng cường độ bền và sự thoải mái khi đeo.
Dây cáp có thể tháo ra (gồm ba dây cáp).
Là lựa chọn hàng đầu cho phòng thu, studio, DJ và những cá nhân nghe nhạc chuyên nghiệp",
		]);

		Product::create([
			"name"		=>"ATH-M30x",
			"stock"		=>"35",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M30X.jpg",
			"weight"	=>"220",
			"color"		=>"Black",
			"price"		=>"69",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Chất lượng sản xuất tiên tiến
Driver 40 mm được làm từ nam châm quý hiếm và có dây lõi nhôm mạ đồng
Được điều chỉnh để nâng cao khả năng hoạt động với tần số thấp
Vòng tai được thiết kế ôm khít tai, đồng thời có khả năng cách âm vượt trội ở môi trường có tiếng ồn lớn
Chân cắm dây cáp một bên vô cùng tiện lợi."
		]);
		Product::create([
			"name"		=>"ATH-SPORT 3",
			"stock"		=>"15",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-SPORT3.jpg",
			"weight"	=>"9.5",
			"color"		=>"Black and Silver",
			"price"		=>"49.5",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"KẾT KHOANG PHỤ với vỏ bao được làm bằng nhôm giúp tăng cường chất lượng âm thanh
Công nghệ TRỞ KHÁNG ÂM THANH (AR) mang lại âm bass mạnh mẽ, sống động
TRỤ 2 KHẤC giúp người dùng thoải mái điều chỉnh đệm tai ở hai vị trí khác nhau để vừa khít vào tai và tăng cường khả năng cách âm
Dây cáp 1,2 m bọc nhựa siêu dẻo và giắc cắm chữ L là phụ kiện hoàn hảo cho các thiết bị cầm tay
Túi đựng với kiểu dáng thiết kế mới mẻ, dễ dàng cầm tay."
		]);
		Product::create([
			"name"		=>"ATH-M40x",
			"stock"		=>"35",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M40X.jpg",
			"weight"	=>"240",
			"color"		=>"Black",
			"price"		=>"124",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Audio-Technica ATH-M40x-Tai nghe kiểm âm studio của Audio-Technica, là sản phẩm mới nhất với chất lượng tốt để sử dụng cho mixing và DJ chuyên nghiệp."
		]);
		Product::create([
			"name"		=>"ATH-IM50",
			"stock"		=>"31",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-IM50.jpg",
			"weight"	=>"3",
			"color"		=>"Black",
			"price"		=>"57.7",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Audio Technica ATH IM50
- Tai nghe dạng IEM 
- Tai nghe sử dụng 2 Driver Dynamic trong 1 bên tai
- Dây dẫn có thể tháo rời
- Đi kèm túi đựng tai nghe
- Sản phẩm được sản xuất tại Nhật Bản",

		]);
		$categories = Category::where("brand", "=","Bose")->first();
		Product::create([
			"name"		=>"Bose IE2 In-Ear",
			"stock"		=>"11",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/IE2.jpg",
			"weight"	=>"18.4",
			"color"		=>"Black and White",
			"price"		=>"120",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe Bose IE2 thiết kế dạng inear, tích hợp công nghệ Bose TriPort ® với âm thanh tonally cho âm thanh tuyệt vời, rõ ràng từ thấp đến cao. Tai nghe sử dụng jack cắm 3.5mm tương thích với nhiều thiết bị như Smartphone, máy tính bảng, máy nghe nhạc và nhất là các sản phẩm của Apple. Tai nghe đi kèm đệm tai làm từ silicon, bao da để bảo vệ khi không sử dụng."
		]);
		Product::create([
			"name"		=>"Bose SIE2",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/SIE2.jpg",
			"weight"	=>"17",
			"color"		=>"Green",
			"price"		=>"70",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe Bose SIE2 là một sản phẩm tuyệt vời cho những ai thường xuyên chơi thể thao. Tai nghe có khả năng chống chịu nước, mồ hôi và bụi bẩn, đi kèm 1 băng thể dục Reebok để bạn có thể bỏ chiếc iPod hay iPhone vào khi hoạt động thể thao. Bose SIE2i được thiết kế dạng inear, sử dụng jack cắm 3.5mm, tích hợp công nghệ độc quyền Bose TriPort ® cùng âm thanh tonally cho bạn thưởng thức âm thanh tuyệt vời với âm bass cực đỉnh. Tai nghe đi kèm 3 bộ đệm tại StayHear® làm từ silicon thiết kế đeo thoải mái với tai người nghe."
		]);
		Product::create([
			"name"		=>"Bose QC25",
			"stock"		=>"54",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/QC25.jpg",
			"weight"	=>"195",
			"color"		=>"Black",
			"price"		=>"228.77",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>" Công nghệ Noise Cancelling giúp loại hẳn 90% các âm thanh khó chịu từ bên ngoài khi nghe nhạc. Rất thích hợp để sử dụng mỗi khi máy bay cất, hạ cánh nhằm làm giảm cảm giác khó chịu vì bị ù tai.
- Âm thanh của tai nghe mang đậm phong cách Bose với dãi bass sâu và trầm.
- Headphone dùng 2 pin AAA, nếu hết pin bạn vẫn có thể tiếp tục nghe nhạc bình thường mà không có chức năng noise cancellign
- Phím tăng giảm volume tích hợp tương thích với các Apple Device, riêng Microphone và nút trả lời điện thoại trực tiếp trên tai nghe, tương thích với các dòng Smartphone / tablet của Android, BlackBerry, Windows phone, Apple devices.
- Ear cup cực kỳ êm ái giúp đeo lâu vẫn không bị nóng tai hay khó chịu."
		]);
		Product::create([
			"name"		=>"BOSE Bluetooth Player",
			"stock"		=>"19",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/SoundlinkMini.jpg",
			"weight"	=>"680",
			"color"		=>"Grey",
			"price"		=>"175",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Thiết kế đột phá mới của Bose giúp bạn tận hưởng âm thanh trung thực, đầy đặn chỉ từ một chiếc loa nhỏ gọn trong lòng bàn tay.
Bộ tản âm thụ động được đặt chính giữa loa giúp nén hơi nhiều hơn, giúp tái tạo tiếng bass sâu trầm mạnh mẽ hơn.
Hai driver siêu nhỏ gọn với vòng nam châm được làm từ Neodymium giúp tái tạo âm Trung-Cao mạnh mẽ.
Bộ vi xử lý tín hiệu kỹ thuật số giúp duy trì độ chính xác của các tần số, giúp âm thanh phát ra luôn đạt tính trung thực, tự nhiên dù ở bất kỳ mức volume nào, hay thể loại nhạc nào.
Sẵn sàng cùng bạn đến bất cứ nơi đâu với kết nối Bluetooth qua các thiết bị nghe nhạc hay Smartphone, Tablet.
Vỏ làm bằng nhôm nguyên khối mang lại vẻ chắc chắn và sang trọng trong từng đường nét."
		]);
		Product::create([
			"name"		=>"BOSE Companion 2",
			"stock"		=>"18",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/companion.jpg",
			"weight"	=>"1800",
			"color"		=>"Black",
			"price"		=>"99.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Nếu bạn là người sử dụng máy vi tính như một công cụ giải trí chính trong phòng làm việc có kích thước tương đối thì việc trang bị một bộ loa ví tính là điều rất cần thiết. Với nhiều nhãn hiệu và mẫu mã của loa vi tính trên thị trường hiện nay thì người dùng có thể tùy ý lựa chọn cho mình những bộ loa phù hợp. Thế nhưng, trong số đám đông đó lại có rất ít những cá thể có thể tạo nên đẳng cấp. Chiếc loa vi tính Bose Companion 2-series III là một trong số ít cá thể có thể tạo nên đẳng cấp khác biệt đó. Không cần những thiết bị phô trương, không cần những thiết kế hoa mỹ, Bose Companion 2-series III khẳng định sự vượt trội của mình bằng sự giản dị, tinh tế, sự tiện dụng và một chất lượng âm thanh trung thực, hoàn hảo"
		]);
		$categories = Category::where("brand", "=","Philips")->first();
		Product::create([
			"name"		=>"Phillips Fidelio",
			"stock"		=>"7",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/fidelio.jpg",
			"weight"	=>"166",
			"color"		=>"Black",
			"price"		=>"229.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe có mic Dynamic Bass Philips SHE3595 (Đen)
 - Được thiết kế nhỏ gọn với âm bass cực kì sống dộng, cùng với nút đệm tai mềm tạo nên sự thoải mái cho bạn khi sử dụng lâu. Ngoài ra tai nghe SHE3595 còn được tích hợp thêm Mic giúp bạn có thể đàm thoại mọi lúc mọi nơi thật thuận tiện.",

		]);
		Product::create([
			"name"		=>"Phillips SHE3595PP/28",
			"stock"		=>"75",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/SHE3595PP.jpg",
			"weight"	=>"10.95",
			"color"		=>"Purple",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Kiểu dáng gọn nhẹ, thích hợp cho tập thể dục. Có các tính năng:
- Xem ảnh
- Nghe nhạc
- Ghi âm
- Multi EQ mode
- Đài FM
- Xem phim"
		]);
		Product::create([
			"name"		=>"Phillips Vibe",
			"stock"		=>"45",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/vibe-mp3.jpg",
			"weight"	=>"33",
			"color"		=>"Black",
			"price"		=>"49.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>" Kích thước nhỏ gọn, có Arm Band đeo máy ở tay rất thích hợp cho thể thao vận động thể thao. Giá phù hợp cho mọi đối tượng.
Có bao đeo tay rất tiện lợi
Công nghệ Fullsoud
Thời lượng pin lên đến 15h
Công nghệ sạc 6p nghe được 1h
Kiểu dáng thời trang,cá tính."
		]);
		Product::create([
			"name"		=>"Phillips Raga",
			"stock"		=>"17",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/raga-mp3.jpg",
			"weight"	=>"33",
			"color"		=>"Blue or Black",
			"price"		=>"39.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Kiểu dáng gọn nhẹ, thích hợp cho tập thể dục. Có các tính năng:
• Ghi âm từ FM
• Lưu giữ liệu
• Multi EQ mode
• Đài FM
• Xem ảnh
• Nghe nhạc
• Xem phim
• Ghi âm"
		]);
		Product::create([
			"name"		=>"Phillips Ariaz",
			"stock"		=>"37",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/ariaz-mp3.jpg",
			"weight"	=>"65",
			"color"		=>"Black",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Ipod shuffle  2GB có thiết kế siêu nhỏ gọn, chỉ lớn hơn đồng xu một tý, có clip cài áo thuận tiện cho người hay di chuyển. Đặc biệt lớp sơn phủ aluminum ánh kim với nhiều màu sắc khác nhau biến chiếc iPod Shuffle của bạn không những sang trọng hơn hẳn mà còn trở thành một chi tiết trang trí xinh xắn và thời trang. Nhờ thiết kế thuận tiện như thế nên các bạn trẻ có thể thoải mái vận động, chơi thể thao,... mà vẫn đắm hồn trong âm nhạc."

		]);
		$categories = Category::where("brand", "=","Apple")->first();
		Product::create([
			"name"		=>"Apple iPod Shuffle",
			"stock"		=>"79",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-shuffle.jpg",
			"weight"	=>"12.5",
			"color"		=>"Multiple Colors",
			"price"		=>"49",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới các dòng máy nghe nhạc, vốn là thứ góp phần cơ bản tạo nên thành công của Apple ngày hôm nay bằng cách tích hợp vào đó thêm nhiều tính năng ưu việt, hoặc chỉ đơn giản là thay đổi về thiết kế, thổi vào thị trường máy nghe nhạc những luồng gió mới mát lành. Vẫn giữ nguyên những trang bị cao cấp của thế hệ trước đó, Apple iPod Nano 7th Gen khiến người hâm mộ mê đắm ngay từ cái nhìn đầu tiên bởi chính vẻ ngoài mảnh dẻ, tinh tế nhưng không kém phần lịch lãm. “Cao hơn” và có vẻ như sẽ khiến bạn cảm thấy “gầy” hơn, nhưng thật sự chính chiều cao được tăng lên này đã giúp cho iPod Nano 7th Gen sở hữu một màn hình đa chạm rộng hơn rất nhiều -2.5”- là cơ sở cho sự tiện dụng tối ưu khi bạn muốn xem phim, video clip, xem ảnh, chơi game hay thậm chí cầm gọn gàng trong tay khi di chuyển. Một điểm mới mà bạn dễ dàng nhận ra đó chính là logo quả táo đã được cách điệu về màu sắc; cũng chính là sự pha trộn rất hài hòa giữa hai màu trắng và đen này càng khiến cho sản phẩm trở nên độc đáo, cuốn hút và đắt giá hơn rất nhiều."
		]);
		Product::create([
			"name"		=>"Apple iPod Nano",
			"stock"		=>"53",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-nano.jpg",
			"weight"	=>"31",
			"color"		=>"Multiple Colors",
			"price"		=>"149",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới dòng máy nghe nhạc iPod Touch bằng cách cho ra mắt thế hệ mới hơn iPod Touch 5th Gen; tích hợp thêm nhiều tính năng ưu việt cũng như thay đổi về thiết kế, thổi vào đó những hương vị đầy mới lạ và không kém phần bí ẩn. Chip xử lý A5 mạnh mẽ cùng màn hình Retina rộng đến 4” cho bạn những trải nghiệm hoàn toàn mới mẻ về tốc độ xử lý đa nhiệm nhanh, nhạy và cực mượt mà. iSight camera 5MP không chỉ cho phép bạn chụp ảnh thật đẹp mà còn để bạn thử nghiệm phong cách chụp ảnh Panorama hoàn toàn mới. Cùng đó là người trợ lý thông minh Siri sẽ đồng hành cùng bạn mỗi ngày, trả lời bạn tất tần tật bất cứ gì mà bạn muốn. Cuối cùng, thêm một điều khác biệt mà bạn dàng nhận ra đó chính là logo quả táo đã được cách điệu về màu sắc; cũng chính là sự pha trộn rất hài hòa giữa hai màu trắng và đen này càng khiến cho sản phẩm trở nên độc đáo, cuốn hút và đắt giá hơn rất nhiều."
		]);
		Product::create([
			"name"		=>"Apple iPod Touch",
			"stock"		=>"99",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-touch.jpg",
			"weight"	=>"88",
			"color"		=>"Multiple Colors",
			"price"		=>"199",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới dòng máy nghe nhạc iPod Touch bằng cách cho ra mắt thế hệ mới hơn iPod Touch 5th Gen; tích hợp thêm nhiều tính năng ưu việt cũng như thay đổi về thiết kế, thổi vào đó những hương vị đầy mới lạ và không kém phần bí ẩn. Chip xử lý A5 mạnh mẽ cùng màn hình Retina rộng đến 4” cho bạn những trải nghiệm hoàn toàn mới mẻ về tốc độ xử lý đa nhiệm nhanh, nhạy và cực mượt mà. iSight camera 5MP không chỉ cho phép bạn chụp ảnh thật đẹp mà còn để bạn thử nghiệm phong cách chụp ảnh Panorama hoàn toàn mới. Cùng đó là người trợ lý thông minh Siri sẽ đồng hành cùng bạn mỗi ngày, trả lời bạn tất tần tật bất cứ gì mà bạn muốn. Cuối cùng, thêm một điều khác biệt mà bạn dàng nhận ra đó chính là logo quả táo đã được cách điệu về màu sắc; cũng chính là sự pha trộn rất hài hòa giữa hai màu trắng và đen này càng khiến cho sản phẩm trở nên độc đáo, cuốn hút và đắt giá hơn rất nhiều."

		]);
		Product::create([
			"name"		=>"Apple EarPods",
			"stock"		=>"11",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/earpods.jpg",
			"weight"	=>"10",
			"color"		=>"White",
			"price"		=>"29",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Bạn thường có thói quen thưởng thức âm nhạc một mình và muốn tận hưởng trọn vẹn âm thanh của từng bản nhạc, chiếc tai nghe nhét tai Apple EarPods sẽ là một chọn lựa hoàn hảo cho chiếc iPhone 5 của bạn. Dây phone nhét tai Apple EarPods cấu tạo hai màng loa độc đáo, cho âm thanh stereo to, rõ và thật với âm Bass, Treble sống động. Với chiếc dây phone nhét tai Apple EarPods, bạn có thể thưởng thức âm nhạc của bạn ở bất cứ nơi nào: khi tập thể dục, khi lái xe, khi ngồi học, khi ngồi làm việc...mà không sợ làm phiền hay ảnh hưởng đến những người bên cạnh. Hãy sở hữu ngay chiếc tai nghe nhét tai Apple EarPods để có những phút giây thư giãn thật tuyệt vời."
		]);
		Product::create([
			"name"		=>"Apple In-Ear",
			"stock"		=>"61",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/headphones.jpg",
			"weight"	=>"10.2",
			"color"		=>"White",
			"price"		=>"79",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"TAI NGHE APPLE IN-EAR HEADPHONES WITH REMOTE AND MIC MA850G/B
Tần số tai nghe: 5 - 21000 Hz
Công nghệ kết nối có dây
Chiều dài dây 1.065 mét
Phụ kiện Apple chính hãng
Xuất xứ Trung Quốc"
		]);
		$categories = Category::where("brand", "=","Lehman Audio")->first();
		Product::create([
			"name"		=>"LehmanAudio Linear",
			"stock"		=>"11",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/linear.jpg",
			"weight"	=>"1500",
			"color"		=>"Black",
			"price"		=>"399",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Ranh giới giữa máy tính và hệ thống âm thanh hi end ngày càng gần, khi mà trước đây 2 dòng sản phẩm có mục đích sử dụng hoàn toàn khác nhau, 1 thứ sinh ra để làm việc, 1 thứ khác sinh ra để trình diễn âm thanh ... nhưng giờ  đây khi mà nhu cầu thưởng thức chất lượng âm thanh hi end trên máy tính ngày càng cao, các hãng sản xuất thiết bị hi end dần dần theo năm tháng tung ra rất nhiều kỹ thuật, công nghệ để biến hệ thống máy tính thành công cụ có khả năng trình diễn như các hệ thống âm thanh hi end chuyển nghiệp và Lehmannaudio cũng không phải là một ngoại lệ,  model Linear USB là một minh chứng , với IC giải mã DAC của Burr Brown cho tỷ lệ lấy mẫu tín hiệu số tới 48kHz, độ phân giải 16Bit, cùng với quản lý nguồn điện riêng biệt có chất lượng cao nhất,  tín hiệu được truyền từ máy tính đến Linear USB qua cổng cắm USB."
		]);
		Product::create([
			"name"		=>"LehmanAudio Traveller",
			"stock"		=>"16",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/traveller.jpg",
			"weight"	=>"196",
			"color"		=>"Black",
			"price"		=>"599",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Traveller là sản phẩm giành được giải thưởng  Best product of the year 2014  Design  High Quality Innovation  tại   Plus X Award.
Đây là một headphone amplifier thuần Analog được thiết kế nhỏ, gọn , chắc chắn, trọng lượng chỉ có 196grams,với 2 đường vào và 2 đường ra chuẩn Jack cắm 3,5 ở cả đằng trước và sau máy. "
		
		]);
		Product::create([
			"name"		=>"LehmanAudio black cube",
			"stock"		=>"6",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/black-cube.jpg",
			"weight"	=>"400",
			"color"		=>"Black",
			"price"		=>"799",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,

		]);
		Product::create([
			"name"		=>"Lehman Audio Rhinelander",
			"stock"		=>"3",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/rhinelander.jpg",
			"weight"	=>"400",
			"color"		=>"Silver",
			"price"		=>"529",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Loa nhỏ rõ ràng là một xu hướng mới, thường được dùng để trong phòng nghe thứ hai hay đơn giản để trên bàn, đỡ tốn diện tích. Chất lượng loa nhỏ cũng ngày càng tiến bộ dần lên, chất tiếng của nó không khác gì những loa lớn ngoài thị trường. Nhưng “phối, ghép” những loa nhỏ với ampli lớn thì trông thật 'kệch kỡm' và nhiều khi không cần thiết. Khi Black Cube Stamp xuất hiện, mọi việc trở nên đơn giản. Black Cube Stamp để vừa trong ngăn bàn, trong hộc tủ hay thậm chí nhẹ đến nỗi người dùng có thể treo trên tường, sử dụng giá đỡ của hãng."
		]);
		Product::create([
			"name"		=>"Lehman Audio linear-se",
			"stock"		=>"11",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/linear-se.png",
			"weight"	=>"2200",
			"color"		=>"Silver",
			"price"		=>"799",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Linear SE USB là một headphone amplifier có hỗ trợ cả kết nối digital qua cổng cắm USB từ máy tính và cả kết nối analog qua cổng cắm RCA từ CD Player. 
Ranh giới giữa máy tính và hệ thống âm thanh hi end ngày càng gần, khi mà trước đây 2 dòng sản phẩm có mục đích sử dụng hoàn toàn khác nhau, 1 thứ sinh ra để làm việc, 1 thứ khác sinh ra để trình diễn âm thanh ... nhưng giờ  đây khi mà nhu cầu thưởng thức chất lượng âm thanh hi end trên máy tính ngày càng cao, các hãng sản xuất thiết bị hi end dần dần theo năm tháng tung ra rất nhiều kỹ thuật, công nghệ để biến hệ thống máy tính thành công cụ có khả năng trình diễn như các hệ thống âm thanh hi end chuyển nghiệp và Lehmannaudio cũng không phải là một ngoại lệ,  model Linear SE USB là một minh chứng , với IC giải mã DAC của Burr Brown cho tỷ lệ lấy mẫu tín hiệu số tới 48kHz, độ phân giải 16Bit, cùng với quản lý nguồn điện riêng biệt có chất lượng cao nhất,  tín hiệu được truyền từ máy tính đến Linear SE USB qua cổng cắm USB."
		
		]);
		$categories = Category::where("brand", "=","Astelln Kern")->first();
		Product::create([
			"name"		=>"AK 120",
			"stock"		=>"18",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak120.jpg",
			"weight"	=>"143",
			"color"		=>"Black",
			"price"		=>"789",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Máy nghe nhạc cao cấp thương hiệu Astell&Kern
Thiết kế cao cấp với khung được làm bằng nhôm nguyên khối
Sử dụng màn hình cảm ứng AMOLED rộng 3.31 (480 x 800 pixel)
Hỗ trợ bộ đôi khuyếch đại kỹ thuật số Cirrus Logic CS4398 (Dual DAC)
Hỗ trợ các định dạng âm thanh như WAV, FLAC, WMA, MP3, OGG, APE (Normal, High, Fast), AAC, ALAC, AIFF, DFF, DSF
Hỗ trợ các file nhạc chất lượng cao như FLAC, WAV, ALAC, AIFF: 8 kHz - 192 kHz (8/16/24 b/s); DSD Native: DSD64(1 bit 2.8 MHz), Stereo/ DSD128 (1 bit 5.6 MHz)
Bộ nhớ trong 128 GB và khe cắm thẻ nhớ mở rộng microSD lên đến 128 GB cho phép lưu trữ hàng ngàn bài hát chất lượng cao
Wi-Fi: 802.11 b/g/n băng tần 2.4GHz
Bluetooth: v4.0"
		]);
		Product::create([
			"name"		=>"AK 240",
			"stock"		=>"8",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak240.jpg",
			"weight"	=>"185",
			"color"		=>"Black",
			"price"		=>"1189",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Máy nghe nhạc cao cấp thương hiệu Astell&Kern
Thiết kế vỏ nhôm, mặt lưng vân các bon sang trọng với các đường thẳng cứng cáp.
Sở hữu màn hình AMOLED 3,31 (800 x 480 pixel)
Hỗ trợ bộ đôi khuyếch đại kỹ thuật số Cirrus Logic CS4398 (Dual DAC)
Hỗ trợ các định dạng âm thanh như WAV, FLAC, WMA, MP3, OGG, APE (Normal, High, Fast), AAC, ALAC, AIFF, DFF, DSF
Hỗ trợ các file nhạc chất lượng cao như FLAC, WAV, ALAC, AIFF: 8 kHz - 192 kHz (8/16/24 b/s); DSD Native: DSD64(1 bit 2.8 MHz), Stereo/ DSD128 (1 bit 5.6 MHz)
Bộ nhớ trong 256 GB và khe cắm thẻ nhớ mở rộng microSD lên đến 128 GB cho phép lưu trữ hàng ngàn bài hát chất lượng cao
Wi-Fi: 802.11 b/g/n băng tần 2.4GHz
Bluetooth: v4.0"
		]);
		Product::create([
			"name"		=>"AK 500N",
			"stock"		=>"20",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak500n.jpg",
			"weight"	=>"11385",
			"color"		=>"Black",
			"price"		=>"10000",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Astell&Kern AK500N mang thiết kế rất lạ mắt với tổng thể thiết kế hình hộp vuông bằng nhôm kích thước 21,4 x 24,3 x 23,8 cm (tương đương với khoảng 5 cái Mac Mini xếp chồng lên nhau). Mặt trước là bề mặt trang trí với các đường nét kiểu dáng kim cương, phía trên là một màn hình 7 inches độ phân giải 1.280 x 800 pixel có khả năng lật 90 độ. AK500N được đỡ bằng một chân kê giống phong cách của những kệ loa bookshelf."
		]);
		Product::create([
			"name"		=>"AK JR",
			"stock"		=>"38",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/akjr.jpg",
			"weight"	=>"93",
			"color"		=>"White",
			"price"		=>"894",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>"Astell&Kern vừa giới thiệu mẫu máy nghe nhạc hi-res AK Jr có giá rẻ nhất của mình ở mức 500 USD. Tuy nhiên điểm nhấn lại nằm ở thiết kế mỏng 8,9mm và nặng chỉ 93 g khiến sản phẩm tạo ra tính di động cao, trong khi nó vẫn có khả năng phát nhạc hi-res chất lượng 24-bit/192kHz cùng khả năng giải mã single-rate DSD. AK Jr được Astell&Kern dựa trên phần cứng của chiếc AK100 với chip DAC Wolfson WM8740.
Astell&Kern AK Jr có kích thước 117 x 52.9 mm, nó ngắn hơn 6mm, hẹp hơn 5.7mm và nhẹ hơn 5g so với chiếc iPod Touch gen5. Nếu so sánh với AK100II (170 g) thì AK Jr nhẹ hơn đến gần một nửa, độ dày giảm đến 6mm. Như vậy chiếc máy khá phù hợp để bỏ túi áo với thiết kế gọn gàng, trọng lượng nhẹ.
Máy có thiết kế vỏ nhôm và kiểu dáng vát cạnh theo phong cách của dòng AK240 cao cấp nhất. Máy sở hữu màn hình cảm ứng 3,1 inch độ phân giải QVGA, thiết kế phím điều khiển nhạc ở bên cạnh trái và vòng xoay điều chỉnh âm lượng rất phong cách. Máy hỗ trợ bộ nhớ trong 64GB và mở rộng qua khe cắm thẻ nhớ ngoài microSD dung lượng tương đương.
Với khả năng xử lý âm thanh hi-res 24-bit/192kHz, AK Jr có thể đọc được nhiều định dạng âm thanh lossless phổ biến. Ngoài ra Astell&Kern cũng ưu ái khả năng giải mã DSD 2.8 MHz bằng cách chuyển đổi qua định dạng PCM rồi đưa tới DAC. Một tính năng cộng thêm của sản phẩm này là khả năng sử dụng làm USB DAC với nguồn tín hiệu từ PC/MAC nhằm xuất tín hiệu âm thanh tốt hơn so với soundcard trên máy tính. Máy không hỗ trợ kết nối Wi-Fi nhưng vẫn tích hợp Bluetooth 4.0. Kết nối tai nghe 3,5mm ở dạng unbalanced với trở kháng đầu ra 2 ohm.
Như vậy so với AK100 II, AK Jr không hỗ trợ DSD 5.6, Wi-Fi và xuất âm thanh balanced. Bù lại với giá 500 USD thì Astell&Kern mang đến một lựa chọn hi-res khởi đầu cho những người mê âm thanh chất lượng cao dễ dàng hơn."
		]);
		Product::create([
			"name"		=>"AK 100 II",
			"stock"		=>"13",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak100.jpg",
			"weight"	=>"122",
			"color"		=>"Black",
			"price"		=>"699",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>2,
			"description"=>'Máy nghe nhạc cao cấp thương hiệu Astell&Kern
Thiết kế cao cấp với khung được làm bằng nhôm nguyên khối
Sử dụng màn hình cảm ứng AMOLED rộng 3.31" (480 x 800 pixel)
Hỗ trợ bộ khếch đại kỹ thuật số Cirrus Logic CS4398 (Single DAC)
Hỗ trợ các định dạng âm thanh như WAV, FLAC, WMA, MP3, OGG, APE (Normal, High, Fast), AAC, ALAC, AIFF, DFF, DSF
Hỗ trợ các file nhạc chất lượng cao như FLAC, WAV, ALAC, AIFF: 8 kHz - 192 kHz (8/16/24 b/s); DSD Native: DSD64(1 bit 2.8 MHz), Stereo/ DSD128 (1 bit 5.6 MHz)
Bộ nhớ trong 64 GB và khe cắm thẻ nhớ mở rộng microSD lên đến 128 GB cho phép lưu trữ hàng ngàn bài hát chất lượng cao
Wi-Fi: 802.11 b/g/n băng tần 2.4GHz
Bluetooth: v4.0'
		]);
		$categories = Category::where("brand", "=","Braven")->first();
		Product::create([
			"name"		=>"Braven BRV HD",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/brv-hd.png",
			"weight"	=>"1820",
			"color"		=>"Black",
			"price"		=>"299.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Braven BRV-X là chiếc loa di động có khả năng hoạt động ngoài trời tốt nhất thế giới
Thiết kế hầm hố, mạnh mẽ với chuẩn chống sốc và chống nước cao cấp chuẩn IPX7. Ngoài ra, loa còn có khả năng chống chọi tốt với môi trường khắc nghiệt, ẩm ướt, thích hợp cho các dã ngoại biển.
Tùy chỉnh trải nghiệm nghe nhạc của bạn cho bất cứ môi trường bằng cách chọn chế độ trong nhà hoặc ngoài trời.
Công nghệ True Wireless cho phép kết nối 2 loa Braven thông qua bluetooth V2.1 + EDR (tầm hoạt động 10m) và phát âm thanh chất lượng cao với chất lượng stereo.
Hỗ trợ các chuẩn âm thanh (IOPT/HFP 1.5, A2DP1.0, AVRCP1.4, GAVDP1.0, HSP1.2)
Công nghệ loại bỏ tiếng ồn trên micro giúp đàm thoại rãnh tay tốt hơn
Nguồn pin 5200 mAh có thể dùng để sạc nhanh cho các thiết bị di động
Thời gian chơi nhạc 12 giờ liên tục"
		]);
		Product::create([
			"name"		=>"Braven 805",
			"stock"		=>"12",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/805.png",
			"weight"	=>"1270",
			"color"		=>"Multiple Colors",
			"price"		=>"199.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Braven 805 thiết kế để sử dụng ở nhà hoặc tiện lợi cho việc di chuyển. Ngoài ra Braven 805 còn được tích hợp công nghệ 'SRS WOW HD bass-enhanced music setting' để tăng cường dải trầm, cho âm thanh tổng thể trở nên sống động phấn khích hơn. Tích hợp bên trong pin sạc lithium-ion 4400mAh, chơi được đến tận 18 tiếng, không chỉ vậy 805 còn tích hợp chức năng như một thiết bị sạc dự phòng cho Smartphone, Tablet,..bạn dễ dàng mang đi và sạc qua cổng cắm USB out"
		]);
		Product::create([
			"name"		=>"Braven 770",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/770.png",
			"weight"	=>"907",
			"color"		=>"Black",
			"price"		=>"149.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Không phải ngày nào bạn cũng được tiếp cận những chiếc loa có khả năng chống nước, và một trong số những món “hàng hiếm” đó là Braven BRV-1 BT với tính di động cao, có thể mang đi bất cứ đâu để giải trí thông qua kết nối bluetooth."
		]);
		Product::create([
			"name"		=>"Braven 570",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/570.png",
			"weight"	=>"312",
			"color"		=>"Blue",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"BRAVEN 570 cho phép bạn kết nối với thế giới xung quanh bạn bằng cách chia sẻ âm nhạc, phim ảnh, trò chơi, và nhiều hơn nữa. Công suất 6 watt và thời lượng pin nghe liên tục 10 giờ, âm thanh di động này sẽ mang âm nhạc đến bất cứ nơi nào bạn đi ! Có cổng line-in để kết nối với máy mp3, Đặc biệt: có thể dùng loa để sạc điện thoại di động khi đi du lịch rất tiện lợi."
		]);
		Product::create([
			"name"		=>"Braven BRV Bank",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/braven-bank.png",
			"weight"	=>"278",
			"color"		=>"Black",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Không phải ngày nào bạn cũng được tiếp cận những chiếc loa có khả năng chống nước, và một trong số những món “hàng hiếm” đó là Braven BRV-1 BT với tính di động cao, có thể mang đi bất cứ đâu để giải trí thông qua kết nối bluetooth."
		]);
		$categories = Category::where("brand", "=","NuForce")->first();
		Product::create([
			"name"		=>"NuForce Primo 8",
			"stock"		=>"42",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/primo8.jpg",
			"weight"	=>"19.3",
			"color"		=>"Black and Blue",
			"price"		=>"499",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			'description'=>"Tai nghe cao cấp dành cho điện thoại di động
Thiết kế dạng in-ear với kiểu dáng độc đáo, sang trọng, trẻ trung
Sử dụng hệ thống driver BA (Balanced Armature) cho chất lượng âm thanh trong trẻo, chi tiết
4 drivers BA trong mỗi tai nghe mang lại sự mượt mà, khả năng đáp ứng mở rộng, sự bùng nổ và âm thanh không mệt mỏi
Thiết kế 3 đường tiếng với 2 driver cho tần số thấp, và mỗi chiếc khác cho tần số trung và cao
2 drivers bass hoạt động song song, mang đến trải nghiệm tinh khiết nhất, tự nhiên nhất cho người nghe đối với âm trầm
Được trang bị mạch phân tần Butterworth độc quyền, khiến cho 4 drivers hoạt động như một
4 drivers của Primo 8 được thiết kế đặt so le thành một khối, tạo ra sự liền mạch trong các dải tần âm nhạc
Dây cáp của Primo 8 được thiết kế độc quyền với 2 lớp (Lụa Kevlar, bạc và đồng OFC), với công nghệ đột phá giúp tái tạo âm thanh cực kỳ chính xác
Dây bên trái và bên phải được cách ly, giảm nhiễu và tối ưu hóa tín hiệu cho mỗi bên
Dây cáp được thiết kế linh hoạt có thể tháo rời"
		]);
		Product::create([
			"name"		=>"NuForce NE750M",
			"stock"		=>"23",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/NE750M.jpg",
			"weight"	=>"14",
			"color"		=>"Black and Red",
			"price"		=>"99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe cao cấp dành cho điện thoại di động
Thiết kế in-ear với chất lượng âm thanh Stereo, âm bass mạnh mẽ
Sử dụng công nghệ tiên tiến với trình điều khiển lớn
Nút điều khiển nhạc và mircophone được tích hợp ngay trên dây cáp
Dây cáp được thiết kế dẹp chống rối
Nút tai nghe bằng silicon mềm cho cảm giác thoải mái khi đeo
Tương thích với tất cả các dòng điện thoại di động sử dụng jack cắm tai nghe 3.5mm"
		
		]);
		Product::create([
			"name"		=>"NuForce NE800M",
			"stock"		=>"72",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/NE800M.jpg",
			"weight"	=>"18",
			"color"		=>"Black and Gold",
			"price"		=>"169",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe dành cho điện thoại di động
Thiết kế dạng in-ear cho chất lượng âm thanh tuyệt vời
Màng loa được phủ Titanium cho chất âm trong trẻo, Bass rộng, sâu
Thiết kế trong khung nhôm nhằm giảm thiểu tối đa sự rung động và sự dội tiếng
Tích hợp microphone với nút ấn trả lời cuộc gọi hoặc sử dụng để điều khiển bài hát
Nút tai nghe bằng silicon mềm cho cảm giác thoải mái khi đeo
Tương thích với tất cả các dòng điện thoại di động sử dụng jack cắm tai nghe 3.5mm
Tương thích với tất cả các dòng sản phẩm của Apple"

		]);
		Product::create([
			"name"		=>"NuForce uDAC3",
			"stock"		=>"53",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/uDAC3.jpg",
			"weight"	=>"250",
			"color"		=>"Red",
			"price"		=>"129",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"24bit/96kHz USB Digital Audio Converter (DAC) cho phép bạn kết nối nhạc số từ máy tính của bạn đến tai nghe, hệ thống âm thanh, Loa,...qua uDAC3 với những công 
nghệ mới nhất asynchronous USB, giải mã Direct-Stream Digital (DSD), giảm nhiễu jitter . Cho âm thanh ấm áp, giàu âm sắc chi tiết, rõ ràng,trong trẻo ở dải cao,
 xuống sâu và mạnh mẽ ở dải trầm, mid có body hơn."
		]);
		Product::create([
			"name"		=>"NuForce HA-200",
			"stock"		=>"9",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/ha-200.jpg",
			"weight"	=>"2200",
			"color"		=>"Black",
			"price"		=>"349",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>1,
			"description"=>"Thiết kế hình lập phương nhỏ gọn với vỏ ngoài sử dụng chất liệu kim loại
Sử dụng màng loa cao cấp, Cube cho chất lượng âm thanh chi tiết, có chiều sâu trong không gian rộng
Sử dụng jack cắm tai nghe 3.5mm sử dụng cho tất cả các dòng điện thoại di động, máy nghe nhạc, máy chơi game...
Tích hợp pin sạc trong loa cho thời gian nghe nhạc liên tục lên đến 8 giờ"
		]);
		$categories = Category::where("brand", "=","Shure")->first();
		Product::create([
			"name"		=>"Shure SRH940",
			"stock"		=>"19",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/srh940.jpg",
			"weight"	=>"320",
			"color"		=>"Black",
			"price"		=>"299.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Shure SE315 là tai nghe dạng earphone được thiết kế với kiểu dáng độc đáo và màu sắc cá tính
Sản phẩm được trang bị công nghệ âm thanh tiên tiến, đáp ứng dải tần rộng và có nút đệm tai êm ái giúp tái tạo âm sắc đa dạng nên phù hợp cho cả nghe nhạc lẫn xem phim
Nhờ được trang bị màng loa lớn nên tai nghe cho khả năng truyền tải âm thanh khá tốt, đặc biệt là những âm trầm"
		]);
		Product::create([
			"name"		=>"Shure SE846",
			"stock"		=>"109",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se846.jpg",
			"weight"	=>"30",
			"color"		=>"White",
			"price"		=>"999",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe của Shure nổi bật với chật lượng âm thanh tuyệt đỉnh, vượt trội so với các đối thủ trong tầm giá
Thiết kế dạng earbud nhưng SE215 là tai nghe nhét sâu trong ống tai IEM
Một điểm nổi bật nữa ở SE215 có khả năng tái tạo âm thanh và loại bỏ tạp âm từ môi trường hoàn hảo
Dây tai nghe khá dài thuận tiện cho mọi bạn hoạt động của bạn luôn thoải mái"
		]);
		Product::create([
			"name"		=>"Shure SE112",
			"stock"		=>"35",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se112.jpg",
			"weight"	=>"32",
			"color"		=>"Black",
			"price"		=>"49.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Tai nghe Shure SE112m+ thực chất là SE112 bổ sung thêm micro và các nút control để bạn có thể nhận cuộc gọi hay chỉ đơn giản là chuyển nhạc và hỗ trợ tốt cho những sản phẩm của Apple như iPhone 6 Plus, iPhone 6, iPhone 5s, iPhone 5c...
SE112 luôn mang lại âm thanh tuyệt vời với âm bass sâu và lọc âm ấn tượng, cho chất lượng âm thanh hoàn hảo phù hợp với hầu hết các thiết bị giải trí
Công nghệ Sound Isolating chặn được tiếng ồn bên ngoài và được đánh giá cao bởi các nhạc sĩ chuyên nghiệp...
Công nghệ cách ly âm thanh ngăn tiếng ồn từ bên ngoài cho dù trên sân khấu, hay bất kì nơi đâu SE112 luôn đạt được âm thanh tốt nhất."
		]);
		Product::create([
			"name"		=>"Shure SE535LTD",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se535ltd.jpg",
			"weight"	=>"48",
			"color"		=>"Red",
			"price"		=>"549.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Shure được biết đến là một hãng âm thanh chuyên nghiệp của Mỹ. Hãng cho ra đời dòng in-ear SE, được các ca sĩ chuyên nghiệp rất ưa chuộng, trong đó có mẫu SE535 vô cùng nổi tiếng trong tầm 10tr. Một vài năm trước đây Shure SE535 Special Edition được phát hành ở Châu Á, phiên bản này chỉ được bán ở Châu Á."
		]);
		Product::create([
			"name"		=>"Shure SRH750DJ",
			"stock"		=>"21",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/srh750dj.jpg",
			"weight"	=>"227",
			"color"		=>"Black",
			"price"		=>"149.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
			"type_id"		=>3,
			"description"=>"Các SRH750DJ Headphones từ Shure cung cấp đẳng cấp thế giới hiệu suất âm thanh, thoải mái, và độ bền cho đến chuyên nghiệp của DJ.
Trở kháng cao và tối ưu hóa xử lý điện năng tối ưu hóa tai nghe để sử dụng trên sản lượng cao máy trộn DJ. Thoải mái, ly tai đệm xoay 90 độ và cho phép bạn dễ dàng đặt vào một bên tai khi trộn. Cáp thay thế được và bao gồm tập hợp các miếng đệm tai thay thế đảm bảo một đời sản phẩm dài."
		
		]);
	}
}