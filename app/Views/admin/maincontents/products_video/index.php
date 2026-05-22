<?php
if ($rows) {

    $content_type1                     = $rows->content_type1;
    $video_path1                      = $rows->video_path1;
    $youtube_url1                    = $rows->youtube_url1;
    $content_type2                     = $rows->content_type2;
    $video_path2                      = $rows->video_path2;
    $youtube_url2                    = $rows->youtube_url2;
} else {
    $content_type1                     = '';
    $video_path1                      = '';
    $youtube_url1                    = '';
    $content_type2                     = '';
    $video_path2                      = '';
    $youtube_url2                    = '';
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
        <?php if (($content_type1 != '') && ($content_type2 != '')): ?>
        <div class="card shadow-sm mb-4 w-75 m-auto">
            <div class="card-header bg-dark text-white">
                <h6 class="mb-0" style="color:white;">Product section Video Setting</h6>
            </div>

            <div class="card-body p-0">
                <table class="table table-bordered table-striped text-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Content Type 1</th>
                            <th>Video 1</th>
                            <th>Youtube 1</th>
                            <th>Content Type 2</th>
                            <th>Video 2</th>
                            <th>Youtube 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Content Type 1 -->
                            <td><?= ucfirst(str_replace('_',' ', $content_type1)) ?></td>

                            <!-- Video 1 -->
                            <td>
                                <?php if ($content_type1 === 'video' && !empty($video_path1)): ?>
                                <div class="popup-preview"
                                            data-type="video"
                                            data-src="<?= base_url('uploads/products_video/'.$video_path1) ?>">
                                    <video width="160" controls muted>
                                        <source src="<?= base_url('uploads/products_video/'.$video_path1) ?>">
                                    </video>
                                </div>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Youtube 1 -->
                            <td>
                                <?php if ($content_type1 === 'youtube_url' && !empty($youtube_url1)): ?>
                                    <?php $videoId1 = getYoutubeId($youtube_url1); ?>
                                    <?php if ($videoId1): ?>
                                        <div class="popup-preview"
                                            data-type="youtube"
                                            data-src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId1) ?>">
                                            
                                            <img src="https://img.youtube.com/vi/<?= $videoId1 ?>/hqdefault.jpg"
                                                style="width:180px; cursor:pointer; border-radius:6px;">
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Content Type 2 -->
                            <td><?= ucfirst(str_replace('_',' ', $content_type2)) ?></td>

                            <!-- Video 2 -->
                            <td>
                                <?php if ($content_type2 === 'video' && !empty($video_path2)): ?>
                                <div class="popup-preview"
                                            data-type="video"
                                            data-src="<?= base_url('uploads/products_video/'.$video_path2) ?>">
                                    <video width="160" controls muted>
                                        <source src="<?= base_url('uploads/products_video/'.$video_path2) ?>">
                                    </video>
                                </div>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </td>

                            <!-- Youtube 2 -->
                            <td>
                                <?php if ($content_type2 === 'youtube_url' && !empty($youtube_url2)): ?>
                                    <?php $videoId2 = getYoutubeId($youtube_url2); ?>
                                    <?php if ($videoId2): ?>
                                        <div class="popup-preview"
                                            data-type="youtube"
                                            data-src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId2) ?>">
                                            
                                            <img src="https://img.youtube.com/vi/<?= $videoId2 ?>/hqdefault.jpg"
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
        <h5 class="mb-0">Update Product section video setting</h5>
    </div>

    <div class="card-body">
        <form method="post"  enctype="multipart/form-data" action="">
            <!-- Popup Type 1 -->
            <div class="form-group">
                <label>First Content Type</label>
                <select name="content_type1" id="content_type1" class="form-control">
                    <option value="">Select a type of content</option>
                    <option value="video"
                        <?=  $content_type1 == 'video' ? 'selected' : '' ?>>
                        Video
                    </option>
                    <option value="youtube_url"
                        <?= $content_type1 == 'youtube_url' ? 'selected' : '' ?>>
                        Youtube Url
                    </option>
                </select>
            </div>


            <!-- Video Field 1 -->
            <div class="form-group popup-field" id="video_field1" >
                <label><?php if($video_path1 != ''){echo "Update first product video";}else{echo "First product video";} ?><span style="color:red;">(Accept: mp4,webm,avi. Max size 10 MB.)<span></label>
                <input type="file"
                    name="video1"
                    id="video1"
                    class="form-control"
                    accept="video/mp4, video/webm, video/avfi">

                <?php if (!empty($video_path1)): ?>
                    <video width="220" controls style="margin-top:10px">
                        <source src="<?= base_url('uploads/home_page_video/'.$video_path1) ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </div>

            <!-- Youtube Url Field 1 -->
            <div class="form-group popup-field" id="youtube_url_field1">
                <label><?php if($youtube_url1 != ''){echo "Update products Youtube URL 1";}else{echo "Products youtube URL 1";} ?><span style="color:red;"> (e.g. https://youtube/example )<span></label>
                <input type="text"
                    name="youtube_url1"
                    id="youtube_url1"
                    class="form-control">
            </div>


            <!-- Popup Type 2 -->
            <div class="form-group">
                <label>Second Content Type</label>
                <select name="content_type2" id="content_type2" class="form-control">
                    <option value="">Select a type of content</option>
                    <option value="video"
                        <?=  $content_type2 == 'video' ? 'selected' : '' ?>>
                        Video
                    </option>
                    <option value="youtube_url"
                        <?= $content_type2 == 'youtube_url' ? 'selected' : '' ?>>
                        Youtube Url
                    </option>
                </select>
            </div>


            <!-- Video Field 2 -->
            <div class="form-group popup-field" id="video_field2" >
                <label><?php if($video_path2 != ''){echo "Update second product video";}else{echo "Second product video";} ?><span style="color:red;">(Accept: mp4,webm,avi. Max size 10 MB.)<span></label>
                <input type="file"
                    name="video2"
                    id="video2"
                    class="form-control"
                    accept="video/mp4, video/webm, video/avfi">

                <?php if (!empty($video_path)): ?>
                    <video width="220" controls style="margin-top:10px">
                        <source src="<?= base_url('uploads/home_page_video/'.$video_path) ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </div>

            <!-- Youtube Url Field 2 -->
            <div class="form-group popup-field" id="youtube_url_field2">
                <label><?php if($youtube_url2 != ''){echo "Update second youtube url";}else{echo "Second youtube url";} ?><span style="color:red;"> (e.g. https://youtube/example )<span></label>
                <input type="text"
                    name="youtube_url2"
                    id="youtube_url2"
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

        var videoField1 = document.getElementById('video_field1');
        var youtubeUrlField1 = document.getElementById('youtube_url_field1');
        var videoField2 = document.getElementById('video_field2');
        var youtubeUrlField2 = document.getElementById('youtube_url_field2');

        videoField1.style.display = 'none';
        youtubeUrlField1.style.display = 'none';
        videoField2.style.display = 'none';
        youtubeUrlField2.style.display = 'none';

    document.getElementById('content_type1').addEventListener('change', function(){
        var selectedType1 = this.value;
        var videoField1 = document.getElementById('video_field1');
        var youtubeUrlField1 = document.getElementById('youtube_url_field1');

        // // Hide all fields initially
        videoField1.style.display = 'none';
        youtubeUrlField1.style.display = 'none';

        // Show the relevant field based on selection
        if(selectedType1 === 'video'){
            videoField1.style.display = 'block';
            document.getElementById('youtube_url1').value = '';
        } else if(selectedType1 === 'youtube_url'){
            youtubeUrlField1.style.display = 'block';
            document.getElementById('popup_video1').value = '';
        }
    });
    document.getElementById('content_type2').addEventListener('change', function(){
        var selectedType2 = this.value;
        var videoField2 = document.getElementById('video_field2');
        var youtubeUrlField2 = document.getElementById('youtube_url_field2');

        // // Hide all fields initially
        videoField2.style.display = 'none';
        youtubeUrlField2.style.display = 'none';

        // Show the relevant field based on selection
        if(selectedType2 === 'video'){
            videoField2.style.display = 'block';
            document.getElementById('youtube_url2').value = '';
        } else if(selectedType2 === 'youtube_url'){
            youtubeUrlField2.style.display = 'block';
            document.getElementById('popup_video2').value = '';
        }
    });
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
    