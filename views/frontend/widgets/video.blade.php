<div class="row">
  <div class="col-12 p-4">
    <h4 class="text-{{ $widget['alignment'] }}  pb-4">{{ $widget['title'] }}</h4>
    <video
      id="vid1"
      class="video-js vjs-default-skin vjs-16-9 vjs-big-play-centered"
      controls
      preload="auto"
      data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{"type": "video/youtube", "src": "{{ $widget['metadata'] }}"}] }' >
    </video>
  </div>
</div>
{{-- Right. If we are actually gonna use this video widget.. these external resources needs to be inside webpack. --}}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.5.0/video-js.min.css" />
<style>
.vjs-default-skin.vjs-has-started .vjs-control-bar {
  visibility: hidden;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.5.0/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.4.1/Youtube.min.js"></script>
