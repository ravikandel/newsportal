<?php

function getPostsByTitle($title = '', $offset = 0, $no_of_records_per_page = 8)
{
  global $con;

  $sql = 'select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,
    tblsubcategory.SubCategoryName as subcategory,tblposts.CreatedDate as createdDate
    from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId 
    left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
    where tblposts.PostTitle like \'%' . $title . '%\' and tblposts.IsActive=1 and tblcategory.IsActive=1 and tblsubcategory.IsActive=1 
    order by tblposts.id desc LIMIT ' . $no_of_records_per_page . ' OFFSET ' . $offset;

  $results = $con->query($sql);

  if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
      echo '<div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3">
            <a href="news-details.php?id=' . htmlentities($row['pid']) . '">
              <div class="it img_wrap5">
              <span class="lbl">' . htmlentities($row['category']) . ' | ' . htmlentities($row['subcategory']) . '</span>
                <img src="admin/postimages/' . htmlentities($row['PostImage']) . '" alt="' . $row['posttitle'] . '" class="img-fluid small-img" title="' . $row['posttitle'] . '">
              </div>
            </a>
            <div class="my-3">
              <h5><a href="news-details.php?id=' . htmlentities($row['pid']) . '">' . $row['posttitle'] . '</a></h5>
              <div class="cl-gray"><i class="ri-time-line"></i> Posted on ' . htmlentities(date('d M, Y', strtotime($row['createdDate']))) . '</div>
            </div>
          </div>';
    }
  } else {
    echo '<div class="col-md-12"><p class="text-center">No News Posted Yet.</p></div>';
  }
  unset($results);
}


function getPostsByCategory($CatId = 0, $offset = 0, $no_of_records_per_page = 9)
{
  global $con;

  $sql = 'select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,
    tblsubcategory.SubCategoryName as subcategory,tblposts.CreatedDate as createdDate
    from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId 
    left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
    where tblposts.CategoryId=' . $CatId . ' and tblposts.IsActive=1 and tblcategory.IsActive=1 and tblsubcategory.IsActive=1 
    order by tblposts.id desc LIMIT ' . $no_of_records_per_page . ' OFFSET ' . $offset;

  $results = $con->query($sql);

  if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
      echo '<div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3">
            <a href="news-details.php?id=' . htmlentities($row['pid']) . '">
              <div class="it img_wrap5">
              <span class="lbl">' . htmlentities($row['category']) . ' | ' . htmlentities($row['subcategory']) . '</span>
                <img src="admin/postimages/' . htmlentities($row['PostImage']) . '" alt="' . $row['posttitle'] . '" class="img-fluid small-img" title="' . $row['posttitle'] . '">
              </div>
            </a>
            <div class="my-3">
              <h5><a href="news-details.php?id=' . htmlentities($row['pid']) . '">' . $row['posttitle'] . '</a></h5>
              <div class="cl-gray"><i class="ri-time-line"></i> Posted on ' . htmlentities(date('d M, Y', strtotime($row['createdDate']))) . '</div>
            </div>
          </div>';
    }
  } else {
    echo '<div class="col-md-12"><p class="text-center">No News Posted Yet.</p></div>';
  }
  unset($results);
}

function getPostsBySubCategory($CatId = 0, $SubCatId = 0, $offset = 0, $no_of_records_per_page = 9)
{
  global $con;

  $sql = 'select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,
    tblsubcategory.SubCategoryName as subcategory,tblposts.CreatedDate as createdDate
    from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId 
    left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
    where tblposts.CategoryId=' . $CatId . ' and tblposts.SubCategoryId=' . $SubCatId . ' and tblposts.IsActive=1 and tblcategory.IsActive=1 and tblsubcategory.IsActive=1 
    order by tblposts.id desc LIMIT ' . $no_of_records_per_page . ' OFFSET ' . $offset;

  $results = $con->query($sql);

  if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
      echo '<div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3">
            <a href="news-details.php?id=' . htmlentities($row['pid']) . '">
              <div class="it img_wrap5">
              <span class="lbl">' . htmlentities($row['category']) . ' | ' . htmlentities($row['subcategory']) . '</span>
                <img src="admin/postimages/' . htmlentities($row['PostImage']) . '" alt="' . $row['posttitle'] . '" class="img-fluid small-img" title="' . $row['posttitle'] . '">
              </div>
            </a>
            <div class="my-3">
              <h5><a href="news-details.php?id=' . htmlentities($row['pid']) . '">' . $row['posttitle'] . '</a></h5>
              <div class="cl-gray"><i class="ri-time-line"></i> Posted on ' . htmlentities(date('d M, Y', strtotime($row['createdDate']))) . '</div>
            </div>
          </div>';
    }
  } else {
    echo '<div class="col-md-12"><p class="text-center">No News Posted Yet.</p></div>';
  }
  unset($results);
}


function getCategoryInfo($CatId = 0)
{
  global $con;

  $sql =  "SELECT Id,CategoryName FROM tblcategory where IsActive=1 and Id=" . $CatId;
  $result = $con->query($sql)->fetch();
  return $result;
}

function getSubCategoryInfo($SubCatId = 0)
{
  global $con;

  $sql =  "SELECT tblsubcategory.SubCategoryId,tblsubcategory.SubCategoryName FROM tblcategory INNER JOIN tblsubcategory ON tblcategory.Id=tblsubcategory.categoryId
   where tblcategory.IsActive=1 AND tblsubcategory.IsActive=1 and tblsubcategory.SubcategoryId=" . $SubCatId;
  $result = $con->query($sql)->fetch();

  return $result;
}


function getNewsInfo($Id = 0)
{
  global $con;

  $sql = "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.SubcategoryName as subcategory,tblposts.PostDetails as postdetails,tblposts.CreatedDate as postingdate,tblposts.PostUrl as url,tblposts.ViewCounter from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id=$Id";
  $result = $con->query($sql)->fetch();

  return $result;
}

function getMostPopularNews($Id = 0)
{
  global $con;

  if ($Id == 0) {
    $sql = 'select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,
    tblsubcategory.SubCategoryName as subcategory,tblposts.CreatedDate as createdDate
    from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId 
    left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
    where tblposts.IsActive=1 and tblcategory.IsActive=1 and tblsubcategory.IsActive=1 
    order by tblposts.ViewCounter desc LIMIT 8';
  } else {
    $sql = 'select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,
    tblsubcategory.SubCategoryName as subcategory,tblposts.CreatedDate as createdDate
    from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId 
    left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
    where tblposts.CategoryId=' . $Id . ' and tblposts.IsActive=1 and tblcategory.IsActive=1 and tblsubcategory.IsActive=1 
    order by tblposts.ViewCounter desc LIMIT 8';
  }
  $results = $con->query($sql);

  if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
      echo '<div class="col-xs-6 col-sm-4 mb-3">
            <a href="news-details.php?id=' . htmlentities($row['pid']) . '">
              <div class="img_wrap1">
              <span class="lbl1">' . htmlentities($row['category']) . '</span>
                <img src="admin/postimages/' . htmlentities($row['PostImage']) . '" alt="' . $row['posttitle'] . '" class="img-fluid small-img" title="' . $row['posttitle'] . '">
              </div>
            </a>
          </div>
            <div class="col-xs-6 col-sm-8">
              <h5><a href="news-details.php?id=' . htmlentities($row['pid']) . '">' . $row['posttitle'] . '</a></h5>
              <div class="cl-gray"><i class="ri-time-line"></i> Posted on ' . htmlentities(date('d M, Y', strtotime($row['createdDate']))) . '</div>
            </div>';
    }
  } else {
    echo '<div class="col-md-12"><p class="text-center">No News Posted Yet.</p></div>';
  }
  unset($results);
}


function getMostRecentNews($Id = 0)
{
  global $con;


    $sql = "SELECT * FROM tblposts WHERE IsActive=1 AND CategoryId='$Id'  ORDER BY Id DESC LIMIT 5";
    $results = $con->query($sql)->fetchAll();
  
  return $results;

}



function displayComments($Id = 0)
{
  global $con;

  $sql = 'SELECT name,comment,createdDate FROM  tblcomments WHERE postId=' . $Id . ' and status=1';
  $results = $con->query($sql);

  if ($results->rowCount() > 0) {
    echo '<div class="card"><div class="card-header"><h5 class="card-title">Recent Comments</h5></div>';
    while ($row = $results->fetch()) {
      echo '<div class="card-body">
          <h5 class="card-title">' . htmlentities($row['name']) . '</h5>
          <p class="card-text">' . htmlentities($row['comment']) . '</p>
          <div class="cl-gray"><i class="ri-time-line"></i> Posted on ' . htmlentities(date('d M, Y', strtotime($row['createdDate']))) . '</div>
        </div>';
    }
    echo '</div>';
  }
  unset($results);
}


function getPageContent($Id = 0)
{
  global $con;

  $sql =  "select PageTitle,Description from tblpages where id=" . $Id;
  $result = $con->query($sql)->fetch();

  return $result;
}

function getRecentNewsBySubCategory($Id){
    global $con;
    
    $recentsql = "SELECT * FROM tblposts WHERE IsActive=1 AND SubCategoryId='$Id'  ORDER BY Id DESC LIMIT 7";
    $recentNewsList = $con->query($recentsql)->fetchAll();
    
    return $recentNewsList;
}

