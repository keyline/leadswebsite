if (currentPath == "promos") {
  let select_type = $(".select_type");

  select_type.click(function (e) {
    let category_id = $(this).data("id");

    apiCall({
      method: "POST",
      url: "promoPackages",
      data: { category_id: category_id },
      success: function (response) {
        if (!response.isError) {
          let promos_html = "";
          response.packages.forEach(function (package) {
            promos_html += `<div class="tab-content-box">
            <div class="row">
                <div class="col-md-5">
                    <div class="tab-img" >
                        <img src="${package.feature_img}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="tab-content-text">
                        <h3>Japan</h3>
                        <ul class="d-flex amazing-deal-bottom">
                            <li><i class="fas fa-clock"></i> ${package.feature_img}</li>
                            <li><i class="fas fa-users"></i> pax: 4</li>
                        </ul>
                        <div class="highlight-box">
                            <h5>Highlights</h5>
                            <ul>
                                <li>Halong Bay Cruise</li>
                                <li>Hanoi City tour</li>
                                <li>Cuchi Tunnels, Mekong Delta tour</li>
                                <li>Hochiminh City Tour</li>
                                <li>Danang -Bana Hill tour with Golden Bridge</li>
                            </ul>
                        </div>
                        <div class="inclusions-box">
                            <h5>Inclusions</h5>
                            <ul>
                                <li>Accommodation at 4 * with breakfast</li>
                                <li>English-speaking tour guide</li>
                                <li>Both ways airport transfers by</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="price-box">
                        <h4><span>₹</span> 178,095</h4>
                        <p>/per person</p>
                    </div>
                    <div class="btn-box">
                        <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>
                        <a href="#" class="btn primary-btn">View more</a>
                    </div>
                </div>
            </div>
        </div>`;
          });
         
          $(`.show_promos${category_id}`).html(promos_html);
        } else {
        }
      },
    });
  });
}
;