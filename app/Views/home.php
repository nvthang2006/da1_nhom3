<section class="hero">
    <div class="hero-left">
        <h1>Du lịch thông minh — chọn tour phù hợp với bạn</h1>
        <p>Gợi ý tour, lịch trình linh hoạt, giá hợp lý. Tìm chuyến đi tiếp theo của bạn ngay bây giờ.</p>

        <div class="search-card" role="search">
            <!-- Search -> route: /index.php/tours with GET params (q, date) -->
            <form class="search-row" action="<?= $base ?>/tours" method="GET">
                <input type="search" name="q" placeholder="Tìm điểm đến, tour, hoạt động" aria-label="Tìm kiếm" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                <select name="date">
                    <option value="">Ngày khởi hành</option>
                    <option value="this_month">Tháng này</option>
                    <option value="next_month">Tháng sau</option>
                </select>
                <button type="submit">Tìm</button>
            </form>
        </div>

        <!-- if admin show quick create tour -->
        <?php if ($user && $user['role'] === 'admin'): ?>
            <div style="margin-top:12px">
                <a href="<?= $base ?>/admin/tours/create" class="btn-sm">+ Tạo tour mới</a>
            </div>
        <?php endif; ?>

    </div>

    <div class="hero-right" aria-hidden="true"></div>
</section>

<section style="margin-top:16px">
    <h2 style="margin:0 0 12px">Tour nổi bật</h2>

    <div class="row g-4">

        <?php if (!empty($tours) && is_array($tours)): ?>
            <?php foreach ($tours as $t): 
                $id = $t['tour_id'] ?? ($t['id'] ?? null);
                $name = htmlspecialchars($t['tour_name'] ?? ($t['name'] ?? 'Untitled'));
                $price = isset($t['price']) ? number_format($t['price']) : 'Liên hệ';
                $days = $t['duration_days'] ?? '-';
                $img = $t['image'] ?? 'https://images.unsplash.com/photo-1506973035872-a4ec16b8e6a8?auto=format&fit=crop&w=800&q=60';
            ?>
                <div class="col-md-4">
                    <article class="card h-100">
                        <img src="<?= $img ?>" alt="<?= $name ?>" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title fw-bold"><?= $name ?></div>
                            <div class="text-muted mb-2">
                                Thời gian: <?= $days ?> ngày · Khởi hành: Theo lịch
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-success fw-bold">₫<?= $price ?></div>
                                <div>
                                    <a class="btn btn-dark btn-sm" href="<?= $base ?>/tours/show?id=<?= $id ?>">Xem</a>

                                    <?php if ($user && $user['role'] === 'admin'): ?>
                                        <a class="btn btn-success btn-sm ms-2" href="<?= $base ?>/admin/tours/edit?id=<?= $id ?>">Sửa</a>

                                    <?php elseif ($user && $user['role'] === 'hdv'): ?>
                                        <a class="btn btn-info btn-sm ms-2" href="<?= $base ?>/hdv/checkin?assign_id=<?= $id ?>">Check-in</a>

                                    <?php else: ?>
                                        <form action="<?= $base ?>/admin/bookings/store" method="POST" style="display:inline-block;margin-left:8px">
                                            <input type="hidden" name="tour_id" value="<?= $id ?>">
                                            <input type="hidden" name="total_people" value="1">
                                            <button class="btn btn-dark btn-sm" type="submit">Đặt</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <!-- Nếu không có dữ liệu thì hiển thị demo -->
            <div class="col-md-4">
                <article class="card h-100">
                    <img src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e6a8?auto=format&fit=crop&w=800&q=60" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title fw-bold">Hội An - 3 ngày</div>
                        <div class="text-muted mb-2">Thời gian: 3 ngày · Khởi hành: Hàng tuần</div>
                        <button class="btn btn-dark btn-sm">Xem</button>
                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card h-100">
                    <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c0?auto=format&fit=crop&w=800&q=60" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title fw-bold">Hạ Long - Du thuyền 2N</div>
                        <div class="text-muted mb-2">Thời gian: 2 ngày · Bao gồm ăn</div>
                        <button class="btn btn-dark btn-sm">Đặt</button>
                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card h-100">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=800&q=60" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title fw-bold">Sapa - Trekking bản</div>
                        <div class="text-muted mb-2">Thời gian: 3 ngày · Hướng dẫn viên tiếng Việt</div>
                        <button class="btn btn-dark btn-sm">Xem</button>
                    </div>
                </article>
            </div>
        <?php endif; ?>

    </div>
</section>

<section class="testimonials" aria-label="Đánh giá">
    <div class="testimonial">
        <strong>Lan (Hà Nội)</strong>
        <p style="margin:8px 0 0;color:var(--muted)">Tour tổ chức tốt, hướng dẫn nhiệt tình. Giá phù hợp.</p>
    </div>
    <div class="testimonial">
        <strong>Minh (TP.HCM)</strong>
        <p style="margin:8px 0 0;color:var(--muted)">Dịch vụ du thuyền rất chất lượng và chuyên nghiệp.</p>
    </div>
</section>
<footer id="contact" class="site-footer">
    <div class="container footer-inner">
        <div style="flex:1;min-width:220px">
            <h3 style="margin:0 0 8px">TourManager</h3>
            <p style="margin:0;color:#c7d2fe">Địa chỉ công ty — email@domain.com — +84 123 456 789</p>
        </div>
        <div style="display:flex;gap:18px;flex-wrap:wrap">
            <div>
                <h4 style="margin:0 0 8px">Khám phá</h4>
                <a href="<?= $base ?>/tours?type=domestic">Tour trong nước</a><br>
                <a href="<?= $base ?>/tours?type=international">Tour quốc tế</a>
            </div>
            <div>
                <h4 style="margin:0 0 8px">Hỗ trợ</h4>
                <a href="<?= $base ?>/terms">Điều khoản</a><br>
                <a href="<?= $base ?>/policy">Chính sách hoàn tiền</a>
            </div>
        </div>
    </div>
</footer>