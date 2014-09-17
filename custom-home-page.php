<?php
/**
 * Template Name: Custom Home Page With Bubbles
 */
?>
<?php
global $post;
get_header();
?>

<div class="main">
    <div class="wrapper">
        <img src="wp-content/themes/oneengine-child/logo_1x.png" class="logo-img" id="logo-home" alt="Genesis Media Logo">
        <img src="wp-content/themes/oneengine-child/logo_2x.png" class="logo-img" id="logo-home_retina" alt="Genesis Media Logo">
        <h1 id="harness">HARNESS THE POWER OF <span class="pink">ATTENTION</span></h1>
        <div class="learn-more"><a href="press">Learn More</a></div>
    </div>
</div>


<div id="bg">
    <div class="point" id="1">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Male 18-24</h2>
                <p>G·A·P Analysis</p>
                <ul>
                    <li>Watches 3 online videos daily</li>
                    <li>Heavy online activity around noon</li>
                    <li>Directed to sites from Facebook</li>
                    <li>visits 5 different websites per session</li>
                    <li>Shares Videos socially</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="2">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Health Guru</h2>
                <p>G·A·P Analysis</p>
                <ul>
                    <li>Spends 20 minutes per site reading content</li>
                    <li>Reads articles in NYC DMA</li>
                    <li>Only shares health related articles</li>
                    <li>Watches only 1 online video per month</li>
                    <li>Blogs about health trends</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="3">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Female 34+</h2>
                <p>G·A·P Analysis</p>
                <ul>
                    <li>Heavy online consumption on weekends</li>
                    <li>Interested in celebrity gossip</li>
                    <li>Bounces from website to website</li>
                    <li>Only visits websites from home computer</li>
                    <li>Tweets articles every day</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="4">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Working Woman</h2>
                <p>G·A·P Analysis</p>
                <ul>
                    <li>Only reads business related articles</li>
                    <li>does not watch videos during the work day</li>
                    <li>Browses the internet from three different states</li>
                    <li>Spends majority of time on mobile device</li>
                    <li>spends 2 minutes reading each article</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
    <div class="point" id="5">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Male 34+</h2>
                <p>G·A·P Analysis</p>
                    <li>Only watches videos</li>
                    <li>Visits outdoor related websites</li>
                    <li>Spends 1 hour a day online</li>
                    <li>Watches camping videos</li>
                    <li>Online occasionally</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
    <div class="point" id="6">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Businessman</h2>
                <p>G·A·P Analysis</p>
                <ul>
                    <li>Reads most of his day online</li>
                    <li>Scans headlines of multiple sites</li>
                    <li>Shares articles with colleagues</li>
                    <li>Heavy online activity during lunch</li>
                    <li>Buys everything online</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script src="wp-content/themes/oneengine-child/js/jquery.fittext.js"></script>

<script>
        jQuery(function() {
            var $ = jQuery,
                BG_HEIGHT = 742,
                BG_WIDTH = 1200,
                BG_ASPECT_RATIO = BG_HEIGHT / BG_WIDTH,
                popUpFlag = false,
                points = [
                    {
                        x: 230,
                        y: 623
                    },
                    {
                        x: 324,
                        y: 605
                    },
                    {
                        x:471,
                        y:599
                    },
                    {
                        x:616,
                        y:592
                    },
                    {
                        x:874,
                        y:587
                    },
                    {
                        x:1103,
                        y:603
                    }
                ];

            function initZones() {
                points.forEach(function(point) {
                    point.Xper = point.x / BG_WIDTH;
                    point.Yper = point.y / BG_HEIGHT;
                });

                setZones();
            }

            function setZones() {
                var currWidth = window.innerWidth,
                    currHeight = window.innerHeight,
                    currAspectRatio = currHeight / currWidth,
                    Xpoint, Ypoint, tempWidth, tempHeight;

                points.forEach(function(point, index) {
                    if (currAspectRatio > BG_ASPECT_RATIO) {
                        // console.log('vertical');

                        tempWidth = BG_WIDTH * (currHeight / BG_HEIGHT);
                        Xpoint = (tempWidth * point.Xper) - (0.5 * (tempWidth - currWidth));
                        Ypoint = currHeight * (1 - point.Yper);

                        $('#' + (index+1) + ' .hover').css('width', (100 * (currHeight / BG_HEIGHT)) + 'px')
                        $('#' + (index+1) + ' .hover').css('height', (150 * (currHeight / BG_HEIGHT )) + 'px');
                        $('#' + (index+1) + ' .hover').css('left', -((100 * (currHeight / BG_HEIGHT)) / 2) + 'px')
                    }

                    if (currAspectRatio < BG_ASPECT_RATIO) {
                        // console.log('horizontal');

                        tempHeight = BG_HEIGHT * (currWidth / BG_WIDTH );
                        Ypoint = tempHeight * (1 - point.Yper);
                        Xpoint = currWidth * point.Xper;

                        $('#' + (index+1) + ' .hover').css('width', (100 * (currWidth / BG_WIDTH)) + 'px')
                        $('#' + (index+1) + ' .hover').css('height', (150 * (currWidth / BG_WIDTH )) + 'px');
                        $('#' + (index+1) + ' .hover').css('left', -((100 * (currWidth / BG_WIDTH)) / 2) + 'px')
                    }

                    $('#' + (index+1) ).css('bottom', Ypoint);
                    $('#' + (index+1) ).css('left', Xpoint);

                });
            }

            function calulateWidthWithBubble(bubble) {
                var rect = bubble[0].getBoundingClientRect(),
                    bubbleRectangle = $(bubble).find('.bubble');

                return rect.left +
                    bubbleRectangle.width() +
                    parseInt(bubbleRectangle.css('padding-right').match(/(\d+)/)[0]) +
                    parseInt(bubbleRectangle.css('padding-left').match(/(\d+)/)[0]);
            }

            function setBubblePosition(bubble) {
                var bubbleRectangle = $(bubble).find('.bubble'),
                    bubbleTriangle = $(bubble).find('.triangle'),
                    rect = bubble[0].getBoundingClientRect(),
                    pointRect = bubble[0].parentElement.getBoundingClientRect(),
                    h = window.innerHeight,
                    w = window.innerWidth;

                var widthWithBubble = calulateWidthWithBubble(bubble);

                console.log(rect);

                if (rect.top < 0) {
                    console.log('HELLO FUCKER');
                    // need to resize to fit height
                    bubbleRectangle.css('width', 300);
                    widthWithBubble = calulateWidthWithBubble(bubble);
                }

                if (rect.left >= 0 && widthWithBubble <= w) {
                    // use defaults
                    bubbleRectangle.css('left',0);
                }

                if (rect.width > w) {
                    // width bigger than viewport
                    bubble.css('width', w + 'px');
                    bubble.css('left', 0);
                }

                // move the triangle
                if (pointRect.left > 20 && pointRect.right < w - 20) {
                    bubbleTriangle.css('left', 75);
                }

                if (pointRect.left < 20) {
                    console.log('less than 20 to left');
                    bubbleTriangle.css('left', 100 - pointRect.left);
                }
                if (pointRect.right > w - 20) {
                    console.log('less than 20 to right');
                    bubbleTriangle.css('left', 70 + w - pointRect.right);
                }

                // move the bubble
                if (rect.left < 0) {
                    bubbleRectangle.css('left',-(rect.left));
                }
                if (widthWithBubble > w) {
                    bubbleRectangle.css('left',  w - widthWithBubble);
                }
            }

            function isBubble(el) {
                return el.className.indexOf('bubble-container') > -1;
            }

            function getBubbleId(el) {
                return el.parentElement.id;
            }

            function doPopUp() {
                var isBub = isBubble(this),
                    thisBubble = isBub ? this : $(this).next('.bubble-container'),
                    id = getBubbleId(this);

                popUpFlag = true;

                if (!isBub) {
                    thisBubble.fadeIn(500);
                    setBubblePosition(thisBubble);
                }

                $('.bubble-container').each(function() {
                    if (getBubbleId(this) !== id) {
                        $(this).fadeOut(500);
                    }
                })
            }

            function hidePopUp() {
                var isBub = isBubble(this),
                    self = this;

                popUpFlag = false;

                setTimeout(function() {
                    if (!popUpFlag) {
                        if (isBub) {
                            $(self).fadeOut(300);
                        } else {
                            $(self).next('.bubble-container').fadeOut(300);
                        }
                    }
                }, 500);
            }

            // kick things off!
            initZones();

            // set zones when window resizes or orientation changes
            $(window).resize(setZones);
            $(window).on('orientationchange', setZones);

            // set zone hover handler
            $('.hover').hover(doPopUp, hidePopUp);
            $('.bubble-container').hover(doPopUp, hidePopUp);

            // set zone click handler
            $('.hover').click(function() {
                $(this).next('.bubble-container').fadeToggle(500);
            });
            $('.bubble-container').click(function() {
                $(this).fadeOut(300);
            });

            // init headline fit text
            jQuery("#harness").fitText(1.0, { minFontSize: '20px', maxFontSize: '60px' });

        });
    </script>
</body>
</html>