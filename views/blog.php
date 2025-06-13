<?php require_once 'layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>
<br><br><br><br>

<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Tiêu đề -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-600 mb-3">Blog Sản Phẩm Thể Thao</h1>
            <p class="text-gray-600 text-lg">Cập nhật xu hướng, đánh giá và mẹo chọn đồ thể thao phù hợp</p>
        </header>

        <!-- Layout 2 cột -->
        <div class="flex flex-col md:flex-row gap-8">
            
    

            <!-- Bài viết -->
            <main class="md:w-3/4 w-full space-y-10">
                <?php
                $blogs = [
                    [
                        'title' => 'Top 5 đôi giày chạy bộ đáng mua năm 2025',
                        'date' => '10/04/2025',
                        'img' => 'https://cdn.runrepeat.com/storage/gallery/buying_guide_primary/42/42-best-asics-running-shoes-15275081-main.jpg',
                        'desc' => 'Bạn đang tìm một đôi giày chạy bộ vừa êm ái, vừa bền bỉ? Dưới đây là 5 lựa chọn hàng đầu được đánh giá cao về chất lượng và giá thành...',
                    ],
                    [
                        'title' => 'Hướng dẫn chọn trang phục tập gym phù hợp',
                        'date' => '05/04/2025',
                        'img' => 'https://i.ytimg.com/vi/ZJBLR3L0jMk/maxresdefault.jpg',
                        'desc' => 'Không chỉ cần đẹp, trang phục tập gym còn cần thoáng khí và co giãn tốt để bạn vận động thoải mái...',
                    ],
                    [
                        'title' => 'Phụ kiện thể thao nào không thể thiếu?',
                        'date' => '01/04/2025',
                        'img' => 'https://www.mostinside.com/wp-content/uploads/2021/06/Sports-Accessories.jpg',
                        'desc' => 'Từ bình nước, găng tay tập gym, đến smartwatch theo dõi sức khỏe – phụ kiện thể thao giúp bạn nâng cao trải nghiệm luyện tập...',
                    ]
                ];

                foreach ($blogs as $blog): ?>
                    <article class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h2 class="text-2xl font-bold text-blue-700 mb-2"><?= $blog['title'] ?></h2>
                        <p class="text-sm text-gray-500 mb-4">Ngày đăng: <?= $blog['date'] ?></p>
                        <img src="<?= $blog['img'] ?>" alt="Blog Image" class="rounded-lg mb-4 w-full h-64 object-cover">
                        <p class="text-gray-700"><?= $blog['desc'] ?></p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Đọc thêm &rarr;</a>
                    </article>
                <?php endforeach; ?>
            </main>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
