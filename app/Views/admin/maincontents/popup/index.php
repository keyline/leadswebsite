<?php
if ($rows) {

    $popup_type                       = $rows->popup_type;
    $popup_image                      = $rows->image_path;
    $popup_video                      = $rows->video_path;
    $popup_youtube                    = $rows->youtube_url;
} else {
    $popup_type                       = '';
    $popup_image                      = '';
    $popup_video                      = '';
    $popup_youtube                    = '';
}
?>
<?php
function getYoutubeId($url)
{
    // youtube.com/watch?v=VIDEOID
    if (preg_match('/v=([^&]+)/', $url, $match)) {
        return $match[1];
    }

    // youtu.be/VIDEOID
    if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) {
        return $match[1];
    }

    return null;
}
?>
<div class="col-xl-12" id="flashMessage">
    <?php if(session('success_message')){?>
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show hide-message custom-alert" role="alert">
        <?=session('success_message')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <?php }?>
    <?php if(session('error_message')){?>
    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show hide-message custom-alert" role="alert">
        <?=session('error_message')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <?php }?>
</div>
<!-- </?php var_dump($rows); ?> -->
<div class="main-content pt-5">
    <div class="container  mb-4">
        <?php if ($popup_type != ''): ?>
        <div class="card shadow-sm mb-4 w-75 m-auto">
            <div class="card-header bg-dark text-white">
                <h6 class="mb-0" style="color:white;"> Pop-up Setting</h6>
            </div>

            <div class="card-body p-0">
                <table class="table table-bordered table-striped text-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Pop-up Type</th>
                            <th>Form</th>
                            <th>Image</th>
                            <th>Video</th>
                            <th>Youtube</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Popup Type -->
                            <td><?= ucfirst(str_replace('_',' ', $popup_type)) ?></td>

                            <!-- Form -->
                             <td>
                                <?php if($popup_type === 'form'): ?>
                                <div class="popup-preview" data-type="form">
                                    <span class="badge badge-success">Active</span>
                                </div>
                                <?php else: ?>
                                        --
                                <?php endif; ?>
                             </td>

                            <!-- Image -->
                            <td>
                                <?php if ($popup_type === 'image' && !empty($popup_image)): ?>
                                <div class="popup-preview"
                                            data-type="image"
                                            data-src="<?= base_url('uploads/popup/'.$popup_image) ?>">
                                    <img src="<?= base_url('uploads/popup/'.$popup_image) ?>"
                                        style="max-width:120px;border-radius:5px;">
                                </div>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Video -->
                            <td>
                                <?php if ($popup_type === 'video' && !empty($popup_video)): ?>
                                <div class="popup-preview"
                                            data-type="video"
                                            data-src="<?= base_url('uploads/popup/'.$popup_video) ?>">
                                    <video width="160" controls muted>
                                        <source src="<?= base_url('uploads/popup/'.$popup_video) ?>">
                                    </video>
                                </div>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Youtube -->
                            <td>
                                <?php if ($popup_type === 'youtube_url' && !empty($popup_youtube)): ?>
                                    <?php $videoId = getYoutubeId($popup_youtube); ?>
                                    <?php if ($videoId): ?>
                                        <div class="popup-preview"
                                            data-type="youtube"
                                            data-src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId) ?>">
                                            
                                            <img src="https://img.youtube.com/vi/<?= $videoId ?>/hqdefault.jpg"
                                                style="width:180px; cursor:pointer; border-radius:6px;">
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
    </div>
  <div class="popup-settings-wrapper card shadow-sm w-50 m-auto" style="margin-top:30px;">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Update Pop-up setting</h5>
    </div>

    <div class="card-body">
        <form method="post"  enctype="multipart/form-data" action="">
            <!-- Popup Type -->
            <div class="form-group">
                <label>Popup Type</label>
                <select name="popup_type" id="popup_type" class="form-control">
                    <option value="form"
                        <?=  $popup_type == 'form' ? 'selected' : '' ?>>
                        Form
                    </option>
                    <option value="image"
                        <?=  $popup_type == 'image' ? 'selected' : '' ?>>
                        Image
                    </option>
                    <option value="video"
                        <?=  $popup_type == 'video' ? 'selected' : '' ?>>
                        Video
                    </option>
                    <option value="youtube_url"
                        <?= $popup_type == 'youtube_url' ? 'selected' : '' ?>>
                        Youtube Url
                    </option>
                </select>
            </div>

            <!-- Image Field -->
            <div class="form-group popup-field" id="image_field">
                <label><?php if($popup_video != ''){echo "Update popup image";}else{echo "Popup Image";} ?> <span style="color:red;">(Accept: JPG,PNG,JPEG,WEBP. Max size 2 MB.)<span></label>
                <input type="file" name="popup_image" id="popup_image" class="form-control" accept="image/jpg, image/png, image/jpeg, image/webp">

                <?php if (!empty($popup_image)): ?>
                    <img src="<?= base_url('uploads/popup/'.$popup_image) ?>"
                        style="width:150px;margin-top:10px;">
                <?php endif; ?>
            </div>

            <!-- Video Field -->
            <div class="form-group popup-field" id="video_field" >
                <label><?php if($popup_video != ''){echo "Update popup video";}else{echo "Popup Video";} ?><span style="color:red;">(Accept: mp4,webm,avi. Max size 5 MB.)<span></label>
                <input type="file"
                    name="popup_video"
                    id="popup_video"
                    class="form-control"
                    accept="video/mp4, video/webm, video/avfi">

                <?php if (!empty($popup_video)): ?>
                    <video width="220" controls style="margin-top:10px">
                        <source src="<?= base_url('uploads/popup/'.$popup_video) ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </div>

            <!-- Youtube Url Field -->
            <div class="form-group popup-field" id="youtube_url_field">
                <label><?php if($popup_video != ''){echo "Update Youtube URL";}else{echo "Youtube URL";} ?><span style="color:red;"> (e.g. https://youtube/example )<span></label>
                <input type="text"
                    name="youtube_url"
                    id="youtube_url"
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Save 
            </button>

        </form>
    </div>
  </div>
</div>
<!-- POP-UP MODAL START -->
<div class="modal fade home_offer_modal" id="home_offer_modal" tabindex="-1" aria-labelledby="home_offer_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>

            <div class="modal-body" id="dynamicPopupContent">
                <!-- <div id="dynamicPopupContent"></div> -->
            </div>

        </div>
    </div>
</div>

<!-- POP-UP MODAL END -->
<script>
        var imageField = document.getElementById('image_field');
        var videoField = document.getElementById('video_field');
        var youtubeUrlField = document.getElementById('youtube_url_field');

        imageField.style.display = 'none';
        videoField.style.display = 'none';
        youtubeUrlField.style.display = 'none';

    document.getElementById('popup_type').addEventListener('change', function(){
        var selectedType = this.value;
        var imageField = document.getElementById('image_field');
        var videoField = document.getElementById('video_field');
        var youtubeUrlField = document.getElementById('youtube_url_field');

        // // Hide all fields initially
        imageField.style.display = 'none';
        videoField.style.display = 'none';
        youtubeUrlField.style.display = 'none';

        // Show the relevant field based on selection
        if(selectedType === 'image'){
            imageField.style.display = 'block';
            document.getElementById('popup_video').value = '';
            document.getElementById('youtube_url').value = '';
        } else if(selectedType === 'video'){
            videoField.style.display = 'block';
            document.getElementById('popup_image').value = '';
            document.getElementById('youtube_url').value = '';
        } else if(selectedType === 'youtube_url'){
            youtubeUrlField.style.display = 'block';
            document.getElementById('popup_image').value = '';
            document.getElementById('popup_video').value = '';
        }
    })
</script>
<script>
  window.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {

        fetch('<?= site_url('/admin/session/clear-flash') ?>', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('HTTP Status:', response.status);

            if (!response.ok) {
                throw new Error('Request failed with status ' + response.status);
            }

            return response.json(); // expecting JSON from controller
        })
        .then(data => {
            console.log('Response:', data);

            if (data.status === 'cleared') {
                const flash = document.getElementById('flashMessage');
                console.log("Yes");
                if (flash) {
                    flash.style.display = 'none';
                }
            }
        })
        .catch(error => {
            console.error('Fetch error:', error.message);
        });

    }, 4000);
  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '.popup-preview', function () {
        console.log("clicked");

        let type = $(this).data('type');
        let src  = $(this).data('src');
        let html = '';


        if(type === 'form'){
            html = `<div class="offer_popup_holder">
                    <h1 class="heading">Get Your<br><strong> 10% OFF Coupon!</strong></h1>
                    <div class="sign-up">
                        <!-- <p class="text-center">Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the discount.</p> -->
                        <form id="warranty_registration_form" method="POST" action="/offer" class="w-100">
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" placeholder="Full Name *" id="full_name" name="full_name" required>
                                </div>
                                <p class="text-danger ms-4 error" id="name-error"><?= session('errors.full_name') ?? '' ?></p>
                            </div>

                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" placeholder="Email Address *" class="form-control" id="email_address" name="email_address" required>
                                </div>
                                <p class="text-danger ms-4 error" id="email-error"><?= session('errors.email_address') ?? '' ?></p>
                            </div>
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-mobile"></i>
                                    <input type="text" class="form-control" placeholder="Phone Number *" id="phone_number" name="phone_number" required>
                                </div>
                                <p class="text-danger ms-4 error" id="phone-error"><?= session('errors.phone_number') ?? '' ?></p>
                            </div>
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-globe"></i>                                    
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address *" required>
                                </div>
                                <p class="text-danger ms-4 error" id="address-error"><?= session('errors.address') ?? '' ?></p>
                            </div>                            
                            <div class="input_holder">
                                <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                                <!-- g-recaptcha -->
                                <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Generate My Coupon</button>
                            </div>
                        </form>
                    </div>
                </div> `;
        }

        if (type === 'image') {
            html = `<img src="${src}" class="img-fluid rounded">`;
        }

        if (type === 'video') {
            html = `
                <video controls autoplay class="w-100">
                    <source src="${src}">
                </video>`;
        }

        if (type === 'youtube') {
            html = `
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="${src}?autoplay=1"
                            allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                </div>`;
        }

        $('#dynamicPopupContent').html(html);
        $('#home_offer_modal').modal('show');
    });


    // STOP video / youtube when modal closes
    $('#home_offer_modal').on('hidden.bs.modal', function () {
        $('#dynamicPopupContent').html('');
    });

});
</script>
    