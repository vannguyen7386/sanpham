(function($) {
    $(function() {
        /**
         * interval : time between the display of images
         * playtime : the timeout for the setInterval function
         * current  : number to control the current image
         * current_thumb : the index of the current thumbs wrapper
         * nmb_thumb_wrappers : total number	of thumbs wrappers
         * nmb_images_wrapper : the number of images inside of each wrapper
         */
        var interval = 4000;
        var playtime;
        var current = 0;
        var current_thumb = 0;
        var nmb_thumb_wrappers = $('#msg_thumbs .msg_thumb_wrapper').length;
        var nmb_images_wrapper = $('#msg_thumbs .msg_thumb_wrapper a').length;
        /**
         * start the slideshow
         */
        play();

        /**
         * show the controls when 
         * mouseover the main container
         */
        slideshowMouseEvent();
        function slideshowMouseEvent() { 
            
            $('#msg_slideshow').unbind('mouseenter')
                    .bind('mouseenter', showControls)
                    .andSelf()
                    .unbind('mouseleave')
                    .bind('mouseleave', hideControls);
        }

        /**
         * pause or play icons
         */
        $('#msg_pause_play').bind('click', function(e) {
            var $this = $(this);
            if ($this.hasClass('msg_play'))
                play();
            else
                pause();
            e.preventDefault();
        });

        /**
         * click controls next or prev,
         * pauses the slideshow, 
         * and displays the next or prevoius image
         */
        $('#msg_next').bind('click', function(e) {
            pause();
            next();
            e.preventDefault();
        });
        $('#msg_prev').bind('click', function(e) {
            pause();
            prev();
            e.preventDefault();
        });

        /**
         * show and hide controls functions
         */
        function showControls() {
            $('#msg_controls').stop().animate({'right': '15px'}, 500);
        }
        function hideControls() {
            $('#msg_controls').stop().animate({'right': '-110px'}, 500);
        }

        /**
         * start the slideshow
         */
        function play() {
            next();
            $('#msg_pause_play').addClass('msg_pause').removeClass('msg_play');
            playtime = setInterval(function(){next();}, interval);
        }

        /**
         * stops the slideshow
         */
        function pause() {
            $('#msg_pause_play').addClass('msg_play').removeClass('msg_pause');
            clearTimeout(playtime);
        }

        /**
         * show the next image
         */
        function next() {
            ++current;
            showImage('r');
        }

        /**
         * shows the previous image
         */
        function prev() {
            --current;
            showImage('l');
        }

        /**
         * shows an image
         * dir : right or left
         */
        function showImage(dir) {
            /**
             * the thumbs wrapper being shown, is always 
             * the one containing the current image
             */
            alternateThumbs();

            /**
             * the thumb that will be displayed in full mode
             */
            var $thumb = $('#msg_thumbs .msg_thumb_wrapper:nth-child(' + current_thumb + ')')
                    .find('a:nth-child(' + parseInt(current - nmb_images_wrapper * (current_thumb - 1)) + ')')
                    .find('img');
            if ($thumb.length) {
                var source = $thumb.attr('src');
                var $currentImage = $('#msg_wrapper').find('img');
                if ($currentImage.length) {
                    $currentImage.fadeOut(function() {
                        $(this).remove();
                        $('<img />').load(function() {
                            var $image = $(this);
                            resize($image);
                            $image.hide();
                            $('#msg_wrapper').empty().append($image.fadeIn());
                        }).attr('src', source);
                    });
                }
                else {
                    $('<img />').load(function() {
                        var $image = $(this);
                        resize($image);
                        $image.hide();
                        $('#msg_wrapper').empty().append($image.fadeIn());
                    }).attr('src', source);
                }

            }
            else { //this is actually not necessary since we have a circular slideshow
                if (dir == 'r')
                    --current;
                else if (dir == 'l')
                    ++current;
                alternateThumbs();
                return;
            }
        }

        /**
         * the thumbs wrapper being shown, is always 
         * the one containing the current image
         */
        function alternateThumbs() {
            $('#msg_thumbs').find('.msg_thumb_wrapper:nth-child(' + current_thumb + ')')
                    .hide();
            current_thumb = Math.ceil(current / nmb_images_wrapper);
            /**
             * if we reach the end, start from the beggining
             */
            if (current_thumb > nmb_thumb_wrappers) {
                current_thumb = 1;
                current = 1;
            }
            /**
             * if we are at the beggining, go to the end
             */
            else if (current_thumb == 0) {
                current_thumb = nmb_thumb_wrappers;
                current = current_thumb * nmb_images_wrapper;
            }

            $('#msg_thumbs').find('.msg_thumb_wrapper:nth-child(' + current_thumb + ')')
                    .show();
        }

        /**
         * resize the image to fit in the container (400 x 400)
         */
        function resize($image) {
            var theImage = new Image();
            theImage.src = $image.attr("src");
            var imgwidth = theImage.width;

            var containerwidth = $('.msg_slideshow').width();
   
            if (imgwidth > containerwidth) {
                var newwidth = containerwidth;
                theImage.width = newwidth;
            }
            
            $image.css({
                'width': theImage.width

            });
        }
    });
})(jQuery);