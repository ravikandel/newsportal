<section id="sticky" class="header__btm stick-top">
    <div class="container relative__ele">
        <div class="row align-items-center">
            <div class="col* col-md-12">
                <nav id="navigation1" class="navigation header-nav clearfix">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="menuFlex">
                        <div class="nav-menus-wrapper scroll_text clearfix">
                            <ul id="menu-main-menu" class="nav-menu">

                                <li><a href="index.php">Home</a></li>

                                <?php
                                $sql = "SELECT Id,CategoryName FROM tblcategory where IsActive=1";
                                $categoryList = $con->query($sql)->fetchAll();

                                foreach ($categoryList as $category) {

                                    $sql = "SELECT SubCategoryId,SubCategoryName FROM tblsubcategory where IsActive=1 and CategoryId=" . $category['Id'];
                                    $subcategoryList = $con->query($sql)->fetchAll();

                                    if (count($subcategoryList) > 0) {
                                        echo '<li><a href="category.php?catid=' . htmlentities($category['Id']) . '">' . htmlentities($category['CategoryName']) . '</a>';
                                        echo '<ul class="nav-dropdown">';
                                        foreach ($subcategoryList as $subcategory) {
                                            echo '<li><a href="subcategory.php?catid=' . htmlentities($category['Id']) . '&subcatid=' . htmlentities($subcategory['SubCategoryId']) . '">' . htmlentities($subcategory['SubCategoryName']) . '</a></li>';
                                        }
                                        echo "</ul></li>";
                                    } else {
                                        echo '<li><a href="category.php?catid=' . htmlentities($category['Id']) . '">' . htmlentities($category['CategoryName']) . '</a></li>';
                                    }
                                }
                                ?>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="contact-us.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="header__side">
                    <div class="outer-search-box">
                        <div class="search-toggle"><i class="ri-search-line"></i>
                        </div>
                        <ul class="search-box">
                            <li>
                                <form action="search.php" method="get">
                                    <div class="form-group">
                                        <input type="text" name="searchtitle" placeholder="Search Here" value="" required />
                                        <button type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="theme__layout">
                        <div class="color__theme">
                            <a href="javascript:void(0)" class="light__color" onclick="changeTheme('light__theme')">
                                <i class="ri-toggle-fill"></i>
                            </a>
                            <a href="javascript:void(0)" class="dark__color" onclick="changeTheme('dark__theme')">
                                <i class="ri-toggle-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>