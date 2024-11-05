<!-- our clients start -->
<section class="home_clients_section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="about_info" data-aos="fade-right" data-aos-duration="1000">
                    <div class="row justify-content-end">
                        <div class="col-md-11">
                            <ul class="client-logo-list">
                                <?php foreach ($clients as $client): ?>
                                    <li>
                                        <img src="<?= base_url('uploads/') ?>/client/<?= $client->client_logo ?>" alt="" class="img-fluid">
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <p>Our Premium</p>
                            <h4>Clients</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--our clients  end -->