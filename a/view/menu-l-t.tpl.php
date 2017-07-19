<div class="header">
    <div class="site-name sm-switch">
        <div class="burger">
            <div class="burger-bricks sm-out">
                <i class="brick b-1"></i>
                <i class="brick b-2"></i>
                <i class="brick b-3"></i>
            </div>
        </div>
        <span class="first-part">Snow</span><span class="last-part">Cake</span>
    </div>
    <div class="user">
        <div class="user-name">Bonjour, <?php echo $_SESSION['user']['name']; ?></div>
    </div>
</div>
<div id="menu" class="slide-menu sm-close">
    <div class="menu-header">
        <div class="menu-logo"></div>
    </div>
    <div class="menu-items">
        <a href="/blog" class="menu-item">Blog</a>
        <a href="/write" class="menu-item">Write</a>
        <a href="/logout" class="menu-item">Logout</a>
    </div>
</div>