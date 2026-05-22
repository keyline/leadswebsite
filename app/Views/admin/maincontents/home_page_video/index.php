<?php
if ($rows) {

    $content_type                     = $rows->content_type;
    $video_path                      = $rows->video_path;
    $youtube_url                    = $rows->youtube_url;
} else {
    $content_type                     = '';
    $video_path                      = '';
    $youtube_url                    = '';
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
        <?php if ($content_type != ''): ?>
        <div class="card shadow-sm mb-4 w-75 m-auto">
            <div class="card-header bg-dark text-white">
                <h6 class="mb-0" style="color:white;">About section video Setting</h6>
            </div>

            <div class="card-body p-0">
                <table class="table table-bordered table-striped text-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Content Type</th>
                            <th>Video</th>
                            <th>Youtube</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Content Type -->
                            <td><?= ucfirst(str_replace('_',' ', $content_type)) ?></td>

                            <!-- Video -->
                            <td>
                                <?php if ($content_type === 'video' && !empty($video_path)): ?>
                                <div class="popup-preview"
                                            data-type="video"
                                            data-src="<?= base_url('uploads/home_page_video/'.$video_path) ?>">
                                    <video width="160" controls muted>
                                        <source src="<?= base_url('uploads/home_page_video/'.$video_path) ?>">
                                    </video>
                                </div>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Youtube -->
                            <td>
                                <?php if ($content_type === 'youtube_url' && !empty($youtube_url)): ?>
                                    <?php $videoId = getYoutubeId($youtube_url); ?>
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
        <h5 class="mb-0">Update About section video setting</h5>
    </div>

    <div class="card-body">
        <form method="post"  enctype="multipart/form-data" action="">
            <!-- Popup Type -->
            <div class="form-group">
                <label>Content Type</label>
                <select name="content_type" id="content_type" class="form-control">
                    <option value="">Select a type of content</option>
                    <option value="video"
                        <?=  $content_type == 'video' ? 'selected' : '' ?>>
                        Video
                    </option>
                    <option value="youtube_url"
                        <?= $content_type == 'youtube_url' ? 'selected' : '' ?>>
                        Youtube Url
                    </option>
                </select>
            </div>


            <!-- Video Field -->
            <div class="form-group popup-field" id="video_field" >
                <label><?php if($video_path != ''){echo "Update home page video";}else{echo "Home page Video";} ?><span style="color:red;">(Accept: mp4,webm,avi. Max size 10 MB.)<span></label>
                <input type="file"
                    name="video"
                    id="video"
                    class="form-control"
                    accept="video/mp4, video/webm, video/avfi">

                <?php if (!empty($video_path)): ?>
                    <video width="220" controls style="margin-top:10px">
                        <source src="<?= base_url('uploads/home_page_video/'.$video_path) ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </div>

            <!-- Youtube Url Field -->
            <div class="form-group popup-field" id="youtube_url_field">
                <label><?php if($youtube_url != ''){echo "Update Youtube URL";}else{echo "Youtube URL";} ?><span style="color:red;"> (e.g. https://youtube/example )<span></label>
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

        var videoField = document.getElementById('video_field');
        var youtubeUrlField = document.getElementById('youtube_url_field');

        videoField.style.display = 'none';
        youtubeUrlField.style.display = 'none';

    document.getElementById('content_type').addEventListener('change', function(){
        var selectedType = this.value;
        var videoField = document.getElementById('video_field');
        var youtubeUrlField = document.getElementById('youtube_url_field');

        // // Hide all fields initially
        videoField.style.display = 'none';
        youtubeUrlField.style.display = 'none';

        // Show the relevant field based on selection
        if(selectedType === 'video'){
            videoField.style.display = 'block';
            document.getElementById('youtube_url').value = '';
        } else if(selectedType === 'youtube_url'){
            youtubeUrlField.style.display = 'block';
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
    