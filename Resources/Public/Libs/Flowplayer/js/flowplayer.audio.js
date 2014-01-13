var test = "typo3conf/ext/me_media/Resources/Public/Libs/Flowplayer/swf/flowplayer.audio-3.2.11.swf";

$("me-media-player-audio", test, {

    // fullscreen button not needed here
    plugins: {
        controls: {
            fullscreen: false,
            height: 30,
            autoHide: false
        }
    },

    clip: {
        autoPlay: false,
        // optional: when playback starts close the first audio playback
        onBeforeBegin: function() {
            $f("player").close();
        }

    }

});