<!-- inner page banner start -->
<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="inner_banner_info">
                    <h4> Return Policy </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->

<!-- mission section start -->
<section class="returnpolicy_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Leads Return Policy</h3>
                <p>Thank you for choosing Leads products! We are committed to delivering superior quality and exceptional service. In the rare instance that you are not entirely satisfied with your purchase, our assurance policy is designed to give you peace of mind.</p>
                <h5>Our Satisfaction Guarantee</h5>
                <p>At Leads, your satisfaction is our priority. If our product does not meet your expectations in terms of performance or quality, we are here to help.</p>
                <h5>Return Policy Highlights</h5>
                <p><strong>Eligible for Return:</strong> Products can be returned within 15 days from the date of purchase.</p>
                <p><strong>No Questions Asked:</strong> If you are unsatisfied with the product or its functionality, you may initiate a return without providing any reason.</p>
                <p><strong>Full Refund:</strong> Upon receipt of the returned product, we will issue a full refund of the purchase amount.</p>
                <p><strong>Hassle-Free Process:</strong> Our customer support team is ready to assist you with the return process.</p>
                <h5>Terms & Conditions:</h5>
                <p>The product must be returned in its original condition, including packaging and accessories.
                </p>
                <p>Refunds will be processed within 7-10 business days after receiving the returned product.</p>
                <p>This assurance is valid for products purchased directly from Leads or authorized dealers.</p>
                <p>Return shipping charges, if applicable, are non-refundable unless the product is defective.</p>
                <h5>Return Process:</h5>
                <ul>
                    <li>Contact our Customer Support at <a href="tel:1800-212-1200">1800-212-1200</a> or via email at <a href="mailto:sales@leadsindia.net">sales@leadsindia.net</a> to initiate your return.</li>
                    <li>Our team will provide detailed instructions on how to return or hand over the product.</li>
                    <li>Upon receipt and inspection of the product, we will process your refund promptly.</li>
                </ul>
                <p>We greatly value your business and remain committed to ensuring your complete satisfaction.</p>
                <p><strong>Leads Assurance Team</strong></p>
            </div>
        </div>
    </div>
</section>
<!-- mission section end -->

<!-- our clients start -->

<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->

<!-- home enquiry start -->

<!-- home enquiry end -->



<?= $this->section('scripts') ?>
<script>
    $(function() {
        $('.thumbnail').viewbox();
        $('.thumbnail-2').viewbox({
            fullscreenButton: true
        });

        (function() {
            var vb = $('.popup-link').viewbox();
            $('.popup-open-button').click(function() {
                vb.trigger('viewbox.open');
            });
            $('.close-button').click(function() {
                vb.trigger('viewbox.close');
            });
        })();

    });
</script>
<?= $this->endSection() ?>