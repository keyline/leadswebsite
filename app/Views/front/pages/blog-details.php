  <!-- mission section start -->
  <section class="blogdetails_item">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-12">
                  <div id="sticky-sidebar-demo" class="sidebar fixed-sidebar">
                      <h5 class="nav-title">Table of contents</h5>

                      <?php if (count($contents)):
                            foreach ($contents as $content): ?>
                              <a class="anchor_links_nav_health_guides" href="#h-<?= strtolower($content->table_of_content_slug) ?>"> <?= ucfirst($content->table_of_content) ?> </a>
                      <?php
                            endforeach;
                        endif; ?>



                  </div>
              </div>
              <div class="col-lg-7 col-md-12">
                  <div class="blogdetials_innerpart">
                      <h1><?= $blog->title ?></h3>
                          <ul class="blogitem_cat">
                              <li> <?= $blog->category_name ?> </li>
                              <li>English</li>
                          </ul>

                          <ul class="blog_meta">
                              <li><i class="fa-solid fa-user"></i> <?= $blog->post_by ?></li>
                              <li><i class="fa-regular fa-calendar-days"></i><?= (new DateTime($blog->created_at))->format('F jS, Y') ?></li>
                              <li><i class="fa-regular fa-clock"></i><?= (new DateTime($blog->created_at))->format('h.m A') ?></li>

                          </ul>

                          <div class="blogdetails_fullimage">
                              <img src="<?= base_url('uploads/') ?>/blogs/<?= $blog->image ?>" alt="banner">
                          </div>

                          <div id="links-box" class="blogdetial_infomation">
                              <?= $blog->description ?>
                              <!-- ++++++++++++++++++++++++++++++++++ -->
                              <?php if (count($contents)):
                                    foreach ($contents as $content):
                                        $summary_text = !empty(trim($content->summary)) ?
                                            '<div class="medical-disclaimer disclaimer-copy">
                                                            <h4>Summary</h4>
                                                            <p>' . $content->summary . '</p>
                                                         </div>' : '';

                                ?>
                                      <h2 id="h-<?= strtolower($content->table_of_content_slug) ?>"><strong><?= ucwords($content->table_of_content) ?></strong></h2>
                                      <?= ucfirst($content->content) ?>
                                      <?= $summary_text ?>

                              <?php
                                    endforeach;
                                endif; ?>

                              <!-- ++++++++++++++++++++++++++++++ -->

                          </div>

                          <div class="blogdetails_share">
                              <ul>
                                  <li><a href="#" class="blogshare" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                  <li><a href="#" class="blogshare" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                  <li><a href="#" class="blogshare" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a></li>
                              </ul>
                          </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-12">
                  <div id="sticky-sidebar-cateogy" class="categroy_relate">
                      <h5 class="nav-title">Recent Post</h5>
                      <ul>



                          <?php if (count($recentBlog)):
                                foreach ($recentBlog as $recentPost):
                            ?>
                                  <li><a href="<?php echo base_url('blog-details/' . $recentPost->slug); ?>"><?= $recentPost->title ?></a></li>
                          <?php
                                endforeach;
                            endif ?>


                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- mission section end -->



  <section class="blog_listing">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="blog_resent_title">Related articles</div>
              </div>

              <div class="col-md-12">
                  <div id="blogdetails-recent" class="owl-carousel owl-theme">

                      <?php if (count($relatedBlogs)):
                            foreach ($relatedBlogs as $relatedBlog):
                        ?>

                              <div class="item">
                                  <div class="blog_list_item">
                                      <a href="<?= base_url('blog-details/' . $relatedBlog->slug) ?>">
                                          <div class="blogitem_img">
                                              <img src="<?= base_url('uploads/') ?>/blogs/<?= $relatedBlog->image ?>" alt="banner">
                                          </div>
                                          <div class="blogitem_detials">

                                              <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                                  <span class="ps-2"><?= (new DateTime($relatedBlog->created_at))->format('M j, Y') ?></span> | <span class="pe-2"><?= $relatedBlog->category_name  ?></span> | <span class="ps-2"><?= $relatedBlog->post_by ?></span>
                                              </p>
                                              <h3><?= $relatedBlog->title ?></h3>
                                              <p class="shortdes"> <?= truncateText($relatedBlog->description); ?> <span class="u-text-primary">read more</span></p>
                                          </div>
                                      </a>
                                  </div>
                              </div>


                      <?php
                            endforeach;
                        endif; ?>


                      <!-- <div class="item">
                          <div class="blog_list_item">
                              <a href="#">
                                  <div class="blogitem_img">
                                      <img src="<?= base_url('public/') ?>/assets/img/blog_img.jpg" alt="banner">
                                  </div>
                                  <div class="blogitem_detials">

                                      <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                          <span class="ps-2">Aug 02</span> | <span class="pe-2">7 min read</span> | <span class="ps-2">Kamila Tokarska</span>
                                      </p>
                                      <h3>What Are the Benefits of HR Chatbots?</h3>
                                      <p class="shortdes">Reviewing hundreds of resumes, handling administrative tasks, and creating relationships with candidates sounds like a big challenge that demands lots of work and... <span class="u-text-primary">read more</span></p>
                                  </div>
                              </a>
                          </div>
                      </div>
                      <div class="item">
                          <div class="blog_list_item">
                              <a href="#">
                                  <div class="blogitem_img">
                                      <img src="<?= base_url('public/') ?>/assets/img/blog_img.jpg" alt="banner">
                                  </div>
                                  <div class="blogitem_detials">

                                      <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                          <span class="ps-2">Aug 02</span> | <span class="pe-2">7 min read</span> | <span class="ps-2">Kamila Tokarska</span>
                                      </p>
                                      <h3>What Are the Benefits of HR Chatbots?</h3>
                                      <p class="shortdes">Reviewing hundreds of resumes, handling administrative tasks, and creating relationships with candidates sounds like a big challenge that demands lots of work and... <span class="u-text-primary">read more</span></p>
                                  </div>
                              </a>
                          </div>
                      </div> -->

                  </div>
              </div>




          </div>
      </div>
  </section>



  <?= $this->section('scripts') ?>
  <script>
      $(document).ready(function() {
         

          var a = new StickySidebar('#sticky-sidebar-demo', {
              topSpacing: 25,
              containerSelector: '.blogdetails_item',
              innerWrapperSelector: '.sidebar__inner'
          });

          var a = new StickySidebar('#sticky-sidebar-cateogy', {
              topSpacing: 25,
              containerSelector: '.blogdetails_item',
              innerWrapperSelector: '.sidebar__inner'
          });



          // Count the number of items
          var itemCount = $("#blogdetails-recent .item").length;
          $("#blogdetails-recent").owlCarousel({
              loop: itemCount > 4,
              margin: 20,
              dots: false,
              nav: false,
              autoplay: false,
              autoplayTimeout: 4000,
              autoplayHoverPause: true,
              animateIn: 'fadeIn',
              animateOut: 'fadeOut',
              navText: ["<i class='zmdi zmdi-arrow-left'></i>", "<i class='zmdi zmdi-arrow-right'></i>"],
              responsive: {
                  0: {
                      items: 1,
                  },
                  600: {
                      items: 2,
                  },
                  750: {
                      items: 2,
                  },
                  1000: {
                      items: 3,
                  },
                  1200: {
                      items: 4,
                  }
              }
          });
      });
  </script>
  <?= $this->endSection() ?>