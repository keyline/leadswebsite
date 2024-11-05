

<!-- Modal -->

<div class="modal fade contact-modal" id="contact-modal" tabindex="-1" aria-labelledby="contact-modalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <img src="<?= base_url('material/front/assets/img') ?>/modal-logo.webp" alt="modal-logo">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">First Name*</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Last Name*</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Phone*</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Email*</label>

                            <input type="email" class="form-control">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Preferred Destination*</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Preferred month of travel*</label>

                            <select name="" id="" class="form-control">

                                <option value="">January</option>

                                <option value="">February</option>

                                <option value="">March</option>

                                <option value="">April</option>

                                <option value="">May</option>

                                <option value="">June</option>

                                <option value="">July</option>

                                <option value="">August</option>

                                <option value="">September</option>

                                <option value="">October</option>

                                <option value="">November</option>

                                <option value="">December</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">No. of pax</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-label">Type of Holidays*</label>

                            <select name="" id="" class="form-control">

                                <option value="">Family Vacation</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="btn-box">

                            <button class="btn primary-btn">SUBMIT</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal -->



<!--book now Modal -->

<div class="modal fade contact-modal" id="book-now-modal" tabindex="-1" aria-labelledby="book-nowLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <img src="<?= base_url('material/front/assets/img') ?>/modal-logo.webp" alt="modal-logo">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form id="contact_frm" action="#" method="post">

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">First Name*</label>

                                <input type="text" required pattern="[A-Za-z]+" name="fname" class="form-control">

                            </div>



                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Last Name*</label>

                                <input type="text" required pattern="[A-Za-z]+" name="lname" class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Phone*</label>

                                <input type="tel" pattern="[0-9]{10}" required name="phone" class="form-control">

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Email*</label>

                                <input type="email" required name="email" class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Preferred Destination*</label>

                                <input type="text" required pattern="[A-Za-z]+" name="destination" class="form-control">

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Preferred month of travel*</label>

                                <select name="month" required id="month" class="form-control">

                                    <option value="1">January</option>

                                    <option value="2">February</option>

                                    <option value="3">March</option>

                                    <option value="4">April</option>

                                    <option value="5">May</option>

                                    <option value="6">June</option>

                                    <option value="7">July</option>

                                    <option value="8">August</option>

                                    <option value="9">September</option>

                                    <option value="10">October</option>

                                    <option value="11">November</option>

                                    <option value="12">December</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">No. of pax</label>

                                <input type="text" name="pax" class="form-control">

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label class="form-label">Type of Holidays*</label>

                                <select name="vacation_type" required id="vacation_type" class="form-control">

                                    <option value="1">Family Vacation</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="btn-box">

                                <button type="submit" class="btn primary-btn">SUBMIT</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!--book now Modal -->