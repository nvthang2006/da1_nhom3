<section style="max-width:420px;margin:40px auto;background:#fff;padding:20px;border-radius:12px;box-shadow:0 6px 20px rgba(15,23,42,.08)">
    <h1 style="margin-top:0;margin-bottom:12px">Đăng ký tài khoản</h1>
    <p style="margin-top:0;color:#6b7280">Tạo tài khoản mới để sử dụng hệ thống.</p>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <form action="<?= $base ?>/register" method="POST">
        <div style="margin-bottom:10px">
            <label for="full_name">Họ và tên</label><br>
            <input type="text" id="full_name" name="full_name" required
                   style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:8px">
        </div>

        <div style="margin-bottom:10px">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required
                   style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:8px">
        </div>

        <div style="margin-bottom:10px">
            <label for="phone">Số điện thoại</label><br>
            <input type="text" id="phone" name="phone"
                   style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:8px">
        </div>

        <div style="margin-bottom:10px">
            <label for="password">Mật khẩu</label><br>
            <input type="password" id="password" name="password" required
                   style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:8px">
        </div>

        <div style="margin-bottom:10px">
            <label for="password_confirmation">Nhập lại mật khẩu</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:8px">
        </div>

        <button type="submit"
                style="width:100%;padding:10px;border:0;border-radius:8px;background:#0f766e;color:#fff;font-weight:700">
            Đăng ký
        </button>
    </form>

    <p style="margin-top:12px;text-align:center;color:#6b7280">
        Đã có tài khoản?
        <a href="<?= $base ?>/login">Đăng nhập</a>
    </p>
</section>
