<div class="row mt-4">

    <!-- SIDEBAR -->
    <div class="col-md-3">

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Bảng điều khiển</h5>
                <p class="text-muted small mb-3">
                    Xin chào, <?= htmlspecialchars($user['full_name'] ?? 'Admin') ?>
                </p>

                <ul class="nav flex-column nav-pills">

                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['m'] ?? '') === '' ? 'active' : '' ?>"
                            href="<?= $base ?>/admin/dashboard">
                            Tổng quan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= $base ?>/admin/tours">
                            Quản lý tour
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= $base ?>/admin/bookings">
                            Đơn đặt tour
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= $base ?>/admin/guides">
                            Hướng dẫn viên
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= $base ?>/admin/departures">
                            Lịch khởi hành
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= $base ?>/admin/reports">
                            Báo cáo
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="nav-link text-danger"
                            href="<?= $base ?>/logout">
                            Đăng xuất
                        </a>
                    </li>

                </ul>

            </div>
        </div>

    </div>


    <!-- MAIN CONTENT -->
    <section class="col-md-9">

        <!-- Tiêu đề -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="h4 mb-1">Bảng điều khiển</h2>
                <div class="text-muted small">
                    Tổng quan tình hình tour, booking và doanh thu.
                </div>
            </div>
            <div>
                <a href="<?= $base ?>/admin/tours/create" class="btn btn-success btn-sm">
                    + Tạo tour mới
                </a>
            </div>
        </div>

        <!-- Hàng thống kê nhanh -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-muted small">Tổng tour</div>
                        <div class="fs-4 fw-bold">
                            <?= $stats['tours_count'] ?? 0 ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-muted small">Booking hôm nay</div>
                        <div class="fs-4 fw-bold">
                            <?= $stats['today_bookings'] ?? 0 ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-muted small">Đoàn đang khởi hành</div>
                        <div class="fs-4 fw-bold">
                            <?= $stats['active_departures'] ?? 0 ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-muted small">Doanh thu tháng này</div>
                        <div class="fs-5 fw-bold text-success">
                            <?= isset($stats['month_revenue']) ? number_format($stats['month_revenue']) . ' ₫' : '0 ₫' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 cột chính: Booking gần đây + tour hot -->
        <div class="row g-3">
            <div class="col-md-7">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        Booking gần đây
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0 table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tour</th>
                                    <th>Khách</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($recentBookings ?? [])): ?>
                                    <?php foreach ($recentBookings as $b): ?>
                                        <tr>
                                            <td>#<?= htmlspecialchars($b['booking_id']) ?></td>
                                            <td><?= htmlspecialchars($b['tour_name']) ?></td>
                                            <td><?= htmlspecialchars($b['contact_name'] ?? '') ?></td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <?= htmlspecialchars($b['status']) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted small py-3">
                                            Chưa có booking nào gần đây.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        Tour sắp khởi hành
                    </div>
                    <div class="card-body">
                        <?php if (!empty($upcomingTours ?? [])): ?>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($upcomingTours as $t): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-semibold">
                                                <?= htmlspecialchars($t['tour_name']) ?>
                                            </div>
                                            <div class="small text-muted">
                                                Khởi hành: <?= htmlspecialchars($t['start_date']) ?>
                                            </div>
                                        </div>
                                        <a href="<?= $base ?>/admin/tours/edit?id=<?= $t['tour_id'] ?>" class="btn btn-outline-primary btn-sm">
                                            Chi tiết
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted small mb-0">
                                Chưa có lịch khởi hành nào sắp tới.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>